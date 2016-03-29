<?php

class CategoryController extends Controller
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

        $categoryCollection = new CategoryCollection();

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page) ? ($page - 1) * $perPage : 0;
        $rows = count($categoryCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/admin/index.php?c=category&m=index");


        $categories = $categoryCollection->getAll(array(), $offset, $perPage);

        $data['categories'] = $categories;
        $data['pagination'] = $pagination;

        $this->loadAdminView('categories/listing', $data);
    }

    public function create()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();
        $insertInfo = array(

            'name' => '',
            'description' => '',

        );

        if (isset($_POST['createCategory'])) {

            $insertInfo = array(

                'name' => (isset($_POST['name'])) ? $_POST['name'] : '',
                'description' => (isset($_POST['description'])) ? $_POST['description'] : '',

            );

            $categoryEntity = new CategoryEntity();
            $categoryEntity->setName($insertInfo['name']);
            $categoryEntity->setDescription($insertInfo['description']);

            $categoryCollection = new CategoryCollection();
            $categoryCollection->save($categoryEntity);

            $_SESSION['flashMessage'] = 'You have 1 new category';
            header('Location: index.php?c=category&m=index');
        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('categories/create', $data);
    }

    public function update()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=category&m=index');
        }
        $data = array();

        $categoryCollection = new CategoryCollection();
        $categories = $categoryCollection->getOne($_GET['id']);

        if ($categories == null) {

            header('Location: index.php?c=category&m=index');

        }
        $insertInfo = array(
            'name' => $categories->getName(),
            'description' => $categories->getDescription(),
        );


        if (isset($_POST['editCategory'])) {

            $insertInfo = array(
                'name' => (isset($_POST['name'])) ? $_POST['name'] : '',
                'description' => (isset($_POST['description'])) ? $_POST['description'] : '',
            );

            $categoryEntity = new CategoryEntity();
            $categoryEntity->setId($_GET['id']);
            $categoryEntity->setName($insertInfo['name']);
            $categoryEntity->setDescription($insertInfo['description']);

            $categoryCollection->save($categoryEntity);

            $_SESSION['flashMessage'] = 'You have 1 edited category';
            header('Location: index.php?c=category&m=index');
        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('categories/update',$data);
    }

    public function delete()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=category&m=index');
        }

        $categoryCollection = new CategoryCollection();
        $category = $categoryCollection->getOne($_GET['id']);

        if ($category == null){
            header('Location: index.php?c=category&m=index');
        }

        $categoryCollection->delete($category->getId());
        $_SESSION['flashMessage'] = 'You has removed!';
        header('Location: index.php?c=category&m=index');
    }
}