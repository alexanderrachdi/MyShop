<?php

class adminController extends Controller {

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

        $page = isset($_GET['page'])? (INT)$_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page)? ($page - 1)* $perPage : 0;

        $rows = count($adminCollection->getAll());
        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/admin/index.php?c=admin&m=index");

        $admins = $adminCollection->getAll(array(), $offset, $perPage);

        $data['admins'] = $admins;
        $data['pagination'] = $pagination;

        $this->loadAdminView('admins/listing', $data);
    }

    public function create()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $insertInfo = array(
            'fname' => '',
            'sname' => '',
            'username' => '',
            'password' => '',
            'email' => '',

        );


        if (isset($_POST['createAdmin'])) {
            $insertInfo = array(
                'fname' => (isset($_POST['fname'])) ? $_POST['fname'] : '',
                'sname' => (isset($_POST['sname'])) ? $_POST['sname'] : '',
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => (isset($_POST['password'])) ? $_POST['password'] : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',

            );


            $adminEntity = new AdminEntity();
            $adminEntity->setFname($insertInfo['fname']);
            $adminEntity->setSname($insertInfo['sname']);
            $adminEntity->setUsername($insertInfo['username']);
            $adminEntity->setPassword($insertInfo['password']);
            $adminEntity->setEmail($insertInfo['email']);

            $adminCollection = new AdminCollection();
            $adminCollection->save($adminEntity);

            $_SESSION['flashMessage'] = 'You have 1 new admin ';
            header('Location: index.php?c=admin&m=index');

        }

        $data['insertInfo'] = $insertInfo;

        $this->loadAdminView('admins/create', $data);
    }

    public function update()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=admin&m=index');
        }

        $adminCollection = new AdminCollection();
        $admin = $adminCollection->getOne($_GET['id']);


        if ($admin == null){
            header('Location: index.php?c=admin&m=index');
        }

        $insertInfo = array(
            'fname'    => $admin->getFname(),
            'sname'    => $admin->getSname(),
            'username' => $admin->getUsername(),
            'password' => '',
            'email'    => $admin->getEmail(),
        );

        if (isset($_POST['editAdmin'])) {
            $insertInfo = array(
                'fname' => (isset($_POST['fname'])) ? $_POST['fname'] : '',
                'sname' => (isset($_POST['sname'])) ? $_POST['sname'] : '',
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => (isset($_POST['password'])) ? $_POST['password'] : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',

            );


            $entity = new AdminEntity();
            $entity->setId($_GET['id']);
            $entity->setFname($insertInfo['fname']);
            $entity->setSname($insertInfo['sname']);
            $entity->setUsername($insertInfo['username']);
            $entity->setPassword($insertInfo['password']);
            $entity->setEmail($insertInfo['email']);

            $adminCollection->save($entity);

            $_SESSION['flashMessage'] = 'You have 1 edited admin';
            header('Location: index.php?c=admin&m=index');


        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('admins/update', $data);

    }

    public function delete()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])){
            header('Location: index.php?c=admin&m=index');
        }

        $adminCollection = new AdminCollection();
        $admin = $adminCollection->getOne($_GET['id']);

        if ($admin == null){
            header('Location: index.php?c=admin&m=index');
        }

        $adminCollection->delete($admin->getId());
        $_SESSION['flashMessage'] = 'You deleted 1  admin';
        header('Location: index.php?c=admin&m=index');
    }
}