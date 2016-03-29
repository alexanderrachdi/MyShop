<?php

class Controller {

    public function __construct()
    {
        session_start();
        header('Content-Type: text/html; charset=utf-8');

    }

    public function index()
    {
        echo 'Please create index';
        die;
    }

    protected function is_logged()
    {
        if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == 1 && isset($_SESSION['admin'])) {
            return true;
        }
        return false;
    }

    protected function userLogin()
    {
        if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == 2 && isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    protected function loadFrontView($view, $data = array())
    {
        extract($data);
        require (__DIR__.'/../views/frontend/'.$view.'.php');
    }

    protected function loadAdminView($view, $data = array())
    {
        extract($data);
        require (__DIR__.'/../views/admin/'.$view.'.php');
    }
}