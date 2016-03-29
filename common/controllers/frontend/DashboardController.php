<?php

class DashboardController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $data = array();

        $categotiesCollection = new CategoryCollection();
        $categories = $categotiesCollection->getAll();

        $itemCollection = new ItemCollection();
        $randomItems = $itemCollection->getAll(array(), 4, 0, array('id', 'ASC'),array(), 1);
        $lastItems = $itemCollection->getAll(array(), 4, 0, array('id', 'DESC'));

        $data['categories'] = $categories;
        $data['randomItems'] = $randomItems;
        $data['lastItems'] = $lastItems;

        $this->loadFrontView('landingPage', $data);

    }

    public function addToDashboard()
    {

    }


}