<?php

class ItemController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();

//        $search = (isset($_GET['search']))? $_GET['search'] : '';
//        if(trim($search != '')){
//            $like = htmlspecialchars(trim($search));
//        } else {
//            $like = array();
//        }

        $itemCollection = new ItemCollection();

        $categoryId = (isset($_GET['id']))? '&id='.$_GET['id'] : '';
        $page = (isset($_GET['page']))? $_GET['page'] : 1 ;
        $perPage = 8;
        $offset = ($page)? ($page - 1)* $perPage : 0 ;
        $where = isset($_GET['id'])?array('category' => $_GET['id']) : array('1' => '1');
        $rows = count($itemCollection->getAll($where));




        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/index.php?c=item&m=index$categoryId");


        $items = $itemCollection->getAll($where, $offset, $perPage);
        $categoryCollection = new CategoryCollection();
        $category = $categoryCollection->getAll();

        $data['items'] = $items;

        $data['categories'] = $category;
        $data['pagination'] = $pagination;

        $this->loadFrontView('items/listing', $data);

    }

    public function preview()
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=item&m=index');
        }

        $data = array();
        $categoryCollection = new CategoryCollection();
        $categories = $categoryCollection->getAll();

        $itemCollection = new ItemCollection();
        $item = $itemCollection->getOne($_GET['id']);
        $randomItems = $itemCollection->getAll(array(), 4, 0, array('id', 'ASC'),array(), 1);


        $itemImageCollection = new ItemImageCollection();
        $images = $itemImageCollection->getAll(array ('item_id' => $_GET['id']));



        $data['categories'] = $categories;
        $data['item'] = $item;
        $data['randomItems'] = $randomItems;
        $data['images'] = $images;
        $this->loadFrontView('items/preview', $data);
    }
}