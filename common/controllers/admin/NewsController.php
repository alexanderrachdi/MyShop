<?php

class NewsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $newsCollection = new NewsCollection();

        $page = isset($_GET['page'])? $_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page)? ($page - 1)* $perPage : '';
        $rows = count($newsCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/admin/index.php?c=news&m=index");

        $news = $newsCollection->getAll(array(), $offset, $perPage);

        $data['news'] = $news;
        $data['pagination'] = $pagination;
        $this->loadAdminView("news/listing", $data);


    }

    public function create()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $insertInfo = array(
            'name' => '',
            'date' => '',
            'text' => '',
            'image' => '',
        );

        if(isset($_POST['createNews'])){

            $fileUpload = new FileUpload('image');
            $file = $fileUpload->getFilename();

            $fileExtention = $fileUpload->getFileExtention();



            if($file != ''){

                $newName = sha1(time()).'.'.$fileExtention;

            } else {
                $newName = '';
            }



            $insertInfo = array(
                'name' => (isset($_POST['name']))? $_POST['name'] : '',
                'date' => date('Y-m-d H:i:s'),
                'text' => (isset($_POST['text']))? htmlspecialchars($_POST['text']) : '',
                'image' => $newName,

                );

            $newsEntity = new NewsEntity();
            $newsEntity->setName($insertInfo['name']);
            $newsEntity->setDate($insertInfo['date']);
            $newsEntity->setText($insertInfo['text']);
            $newsEntity->setImage($insertInfo['image']);



            $newsCollection = new NewsCollection();
            $newsCollection->save($newsEntity);
            $fileUpload->upload('uploads/'.$newName);

            $_SESSION['flashMessage'] = 'You aded 1 new news';
            header('Location: index.php?c=news&m=index');

        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('news/create', $data);


    }

    public function update()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=news&m=index');
        }

        $data = array();

        $newsCollection = new NewsCollection();
        $news = $newsCollection->getOne($_GET['id']);

        if($news == null) {
            header('Location: index.php?c=news&m=index');
        }

        $insertInfo = array(
            'name' => $news->getName(),
            'date' => $news->getDate(),
            'text' => $news->getText(),
            'image' => $news->getImage(),
        );

        if (isset($_POST['editNews'])) {

            $insertInfo = array(
                'name' => (isset($_POST['name'])) ? $_POST['name'] : '',
                'date' => (isset($_POST['date'])) ? $_POST['date'] : '',
                'text' => (isset($_POST['text'])) ? htmlspecialchars($_POST['text']) : '',
                'image' => (isset($_POST['image'])) ? $_POST['image'] : $news->getImage(),
            );


            $newsEntity = new NewsEntity();
            $newsEntity->setId($_GET['id']);
            $newsEntity->setName($insertInfo['name']);
            $newsEntity->setDate($insertInfo['date']);
            $newsEntity->setText($insertInfo['text']);
            $newsEntity->setImage($insertInfo['image']);

            $newsCollection->save($newsEntity);
            $_SESSION['flashMessage'] = 'You have 1 affected row';
            header('Location: index.php?c=news&m=index');
        }

        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('news/update', $data);


    }

    public function delete()
    {
        if(!$this->is_logged()){
            header('Location: index.php?c=login&m=login');

        }

        if(!isset($_GET['id'])){
            header('Location: index.php?c=news&m=index');


        }

        $newsCollection = new NewsCollection();
        $news = $newsCollection->getOne($_GET['id']);

        if ($news == null){
            header('Location: index.php?c=news&m=index');

        }

        $newsCollection->delete($news->getId());
        $_SESSION['flashMessage'] = 'You deleted 1 news';

        header('Location: index.php?c=news&m=index');

    }
}