<?php

class DashboardController extends Controller{

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

        $adminCollection = new AdminCollection();
        $admins = count($adminCollection->getAll());

        $userCollection = new UserCollection();
        $users = count($userCollection->getAll());

        $itemCollection = new ItemCollection();
        $items = count($itemCollection->getAll());

        $newsColection = new NewsCollection();
        $news = count($newsColection->getAll());

        $data['admins'] = $admins;
        $data['users'] = $users;
        $data['items'] = $items;
        $data['news'] = $news;

        $this->loadAdminView('dashboard', $data);



    }

}