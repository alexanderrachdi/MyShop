<?php

class OtherController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function delivery()
    {
        $data = array();
        $this->loadFrontView('others/delivery', $data);
    }

    public function about()
    {
        $data = array();
        $this->loadFrontView('others/about', $data);
    }
}