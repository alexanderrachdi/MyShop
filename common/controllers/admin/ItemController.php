<?php

class ItemController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        $orderBy = (isset($_GET['orderBy'])) ? (int)$_GET['orderBy'] : 0;

        switch ($orderBy) {
            case 0:
                $order = array('id', 'DESC');
                break;
            case 1:
                $order = array('id', 'ASC');
                break;
            case 2:
                $order = array('category_id', 'ASC');
                break;
            case 3:
                $order = array('category_id', 'DESC');
                break;
            default:
                $order = array('id', 'DESC');
        }

        $data = array();

        $itemsCollection = new ItemCollection();

        $page = isset($_GET['page'])? $_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page)? ($page - 1)* $perPage : 0;
        $rows = count($itemsCollection->getAll());


        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/admin/index.php?c=item&m=index&orderBy={$orderBy}");


        $items = $itemsCollection->getAll(array(), $offset, $perPage);

        $data['items'] = $items;
        $data['pagination'] = $pagination;
        $data['orderBy'] = $orderBy;
        $data['page'] = $page;

        $this->loadAdminView('items/listing', $data);


    }

    public function create()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $insertInfo = array(
            'name' => '',
            'description' => '',
            'price' => '',
            'image' => '',
            'category' => '',


        );


        if (isset($_POST['createItem'])) {

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
                'description' => (isset($_POST['description']))? $_POST['description'] : '',
                'price' => (isset($_POST['price']))? $_POST['price'] : '',
                'image' => $newName,
                'category' => (isset($_POST['category']))? $_POST['category'] : '',


            );

            $itemEntity = new ItemEntity();
            $itemEntity->setName($insertInfo['name']);
            $itemEntity->setDescription($insertInfo['description']);
            $itemEntity->setPrice($insertInfo['price']);
            $itemEntity->setImage($insertInfo['image']);
            $itemEntity->setCategory($insertInfo['category']);


            $itemsCollection = new ItemCollection();
            $itemsCollection->save($itemEntity);
            $fileUpload->upload('uploads/'.$newName);

                $_SESSION['flashMessage'] = 'You have 1 new item';
            header("Location: index.php?c=item&m=index");
        }

        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('items/create', $data);
    }

    public function update ()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=item&m=index');
        }

        $data = array();

        $itemCollection = new ItemCollection();
        $item = $itemCollection->getOne($_GET['id']);

        if ($item == null){
            header('Location: index.php?c=item&m=index');

        }
        $insertInfo = array(
            'name' => $item->getName(),
            'description' => $item->getDescription(),
            'price' => $item->getPrice(),
            'image' => $item->getImage(),
            'category' => $item->getCategory(),
        );


        if(isset($_POST['editItem'])){
            $insertInfo = array(
                'name' => (isset($_POST['name']))? $_POST['name']: '',
                'description' => (isset($_POST['description']))? $_POST['description']: '',
                'price' => (isset($_POST['price']))? $_POST['price']: '',
                'image' => (isset($_POST['image']))? $_POST['image']: $item->getImage(),
                'category' => (isset($_POST['category']))? $_POST['category']: $item->getCategory(),
            );

            $itemEntity = new ItemEntity();
            $itemEntity->setId($_GET['id']);
            $itemEntity->setName($insertInfo['name']);
            $itemEntity->setDescription($insertInfo['description']);
            $itemEntity->setPrice($insertInfo['price']);
            $itemEntity->setImage($insertInfo['image']);
            $itemEntity->setCategory($insertInfo['category']);

            $itemCollection->save($itemEntity);
            $_SESSION['flashMessage'] = 'You have 1 edited item';
            header("Location: index.php?c=item&m=index");
        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('items/update', $data);

    }

    public function delete()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=item&m=index');
        }

        $itemCollection = new ItemCollection();
        $item = $itemCollection->getOne($_GET['id']);

        if ($item == null){
            header('Location: index.php?c=item&m=index');

        }

        $itemCollection->delete($item->getId());
        $_SESSION['flashMessage'] = 'You deleted 1  item';
        header('Location: index.php?c=item&m=index');

    }

    public function itemImages()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=item&m=index');
        }

        $data = array();

        $itemCollection =new ItemCollection();
        $item = $itemCollection->getOne($_GET['id']);

        if($item == null){
            header('Location: index.php?c=item&m=index');
        }

        $itemImageCollection = new ItemImageCollection();
        $images = $itemImageCollection->getAll(array ('item_id' => $_GET['id']));


        $fileUpload = new FileUpload('image');
        $file = $fileUpload->getFilename();
        $fileExtention = $fileUpload->getFileExtention();

        if($file != '') {
            $newName = sha1(time()) . '.' . $fileExtention;
            $insertInto = array(
                'item_id' => $_GET['id'],
                'image' => $newName,
            );
        }
        if (isset($_POST['addImage'])) {

            $imageEntity = new ItemImageEntity();
            $obj = $imageEntity->init($insertInto);
            $itemImageCollection->save($obj);
            $fileUpload->upload('uploads/'.$newName);
            header('Location: index.php?c=item&m=itemImages&id=' . $_GET['id']);
        }else{
            $data['images'] = $images;
            $data['itemId'] = $_GET['id'];
            $this->loadAdminView('items/itemImages', $data);
        }


    }

    public function deleteItemImage()
    {
        if (!$this->is_logged()){
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=item&m=index');
        }

        $imageItemCollection = new ItemImageCollection();
        $image = $imageItemCollection->getOne($_GET['id']);

        if($image == null){
            header('Location: index.php?c=item&m=itemImages&id=' . $_GET['id']);

        }

        $itemId = $image->getItemId();
        unlink('uploads/'.$image->getImage());
        $imageItemCollection->delete($_GET['id']);

        header('Location: index.php?c=item&m=itemImages&id='.$itemId);
    }
}