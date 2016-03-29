<?php

class userController extends Controller {

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

        $userCollection = new UserCollection();

        $page = isset($_GET['page'])? (INT)$_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page)? ($page - 1)* $perPage : 0;

        $rows = count($userCollection->getAll());
        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/MVS%20MYSHOP/admin/index.php?c=user&m=index");

        $users = $userCollection->getAll(array(), $offset, $perPage);

        $data['users'] = $users;
        $data['pagination'] = $pagination;

        $this->loadAdminView('users/listing', $data);
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


        if (isset($_POST['createUser'])) {
            $insertInfo = array(
                'fname' => (isset($_POST['fname'])) ? $_POST['fname'] : '',
                'sname' => (isset($_POST['sname'])) ? $_POST['sname'] : '',
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => (isset($_POST['password'])) ? $_POST['password'] : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',

            );


            $userEntity = new AdminEntity();
            $userEntity->setFname($insertInfo['fname']);
            $userEntity->setSname($insertInfo['sname']);
            $userEntity->setUsername($insertInfo['username']);
            $userEntity->setPassword($insertInfo['password']);
            $userEntity->setEmail($insertInfo['email']);


            $userCollection = new UserCollection();
            $userCollection->save($userEntity);

            $_SESSION['flashMessage'] = 'You have 1 new admin ';
            header('Location: index.php?c=user&m=index');

        }

        $data['insertInfo'] = $insertInfo;

        $this->loadAdminView('users/create', $data);
    }

    public function update()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=admin&m=index');
        }

        $userCollection = new UserCollection();
        $user = $userCollection->getOne($_GET['id']);


        if ($user == null){
            header('Location: index.php?c=user&m=index');
        }

        $insertInfo = array(
            'fname'    => $user->getFname(),
            'sname'    => $user->getSname(),
            'username' => $user->getUsername(),
            'password' => '',
            'email'    => $user->getEmail(),
        );

        if (isset($_POST['editUser'])) {
            $insertInfo = array(
                'fname' => (isset($_POST['fname'])) ? $_POST['fname'] : '',
                'sname' => (isset($_POST['sname'])) ? $_POST['sname'] : '',
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => (isset($_POST['password'])) ? $_POST['password'] : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',

            );


            $entity = new UserEntity();
            $entity->setId($_GET['id']);
            $entity->setFname($insertInfo['fname']);
            $entity->setSname($insertInfo['sname']);
            $entity->setUsername($insertInfo['username']);
            $entity->setPassword($insertInfo['password']);
            $entity->setEmail($insertInfo['email']);

            $userCollection->save($entity);

            $_SESSION['flashMessage'] = 'You have 1 edited user';
            header('Location: index.php?c=user&m=index');


        }
        $data['insertInfo'] = $insertInfo;
        $this->loadAdminView('users/update', $data);

    }

    public function delete()
    {
        if (!$this->is_logged()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])){
            header('Location: index.php?c=user&m=index');
        }

        $userCollection = new UserCollection();
        $user = $userCollection->getOne($_GET['id']);

        if ($user == null){
            header('Location: index.php?c=user&m=index');
        }

        $userCollection->delete($user->getId());
        $_SESSION['flashMessage'] = 'You deleted 1  user';
        header('Location: index.php?c=user&m=index');
    }
}