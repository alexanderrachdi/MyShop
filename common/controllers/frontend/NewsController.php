<?php

class NewsController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();

        $newsCollection = new NewsCollection();

        $page = (isset($_GET['page']))? $_GET['page']: 1;
        $perPage = 3;
        $offset = ($page)? ($page - 1)* $perPage : 0;
        $rows = count($newsCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/index.php?c=news&m=index");

        $news = $newsCollection->getAll(array(), $offset, $perPage);

        $data['news'] = $news;
        $data['pagination'] = $pagination;
        $this->loadFrontView('news/listing', $data);


    }
}