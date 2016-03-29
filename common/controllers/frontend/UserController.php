<?php

class UserController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $data = array();


        $insertInfo = array(
            'fname' => '',
            'sname' => '',
            'username' => '',
            'password' => '',
            'email' => '',
        );

        if(isset($_POST['createUser'])){

            $insertInfo = array(

                'fname' => (isset($_POST['firstName']))? $_POST['firstName'] : '',
                'sname' => (isset($_POST['secondName']))? $_POST['secondName'] : '',
                'username' => (isset($_POST['username']))? $_POST['username'] : '',
                'password' => (isset($_POST['password']))? $_POST['password'] : '',
                'email' => (isset($_POST['email']))? $_POST['email'] : '',
            );

            $userEntity = new UserEntity();
//            $userEntity->setFname($insertInfo['fname']);
//            $userEntity->setSname($insertInfo['sname']);
//            $userEntity->setUsername($insertInfo['username']);
//            $userEntity->setPassword($insertInfo['password']);
//            $userEntity->setEmail($insertInfo['email']);
            $userEntity->init($insertInfo);



                $userCollection = new UserCollection();
                $userCollection->save($userEntity);


                header('Location: index.php?c=login&m=login');



        }

        $data['insertInfo'] = $insertInfo;

        $this->loadFrontView('user/create', $data);
    }

    public function update()
    {
        $data = array();
        $insertInfo = array();

        $userCollection = new UserCollection();
        $user = $userCollection->getOne($_SESSION['user']->getId());


        if(isset($_POST['updateUser'])){

            $insertInfo = array(

                'id' => $_SESSION['user']->getId(),
                'fname' => (isset($_POST['firstName']))? $_POST['firstName'] : '',
                'sname' => (isset($_POST['secondName']))? $_POST['secondName'] : '',
                'username' => (isset($_POST['username']))? $_POST['username'] : '',
                'password' => (isset($_POST['password']))? $_POST['password'] : '',
                'email' => (isset($_POST['email']))? $_POST['email'] : '',
            );

            $userEntity = new UserEntity();
            $userEntity->init($insertInfo);

            $userCollection->save($userEntity);
            header('Location: index.php?c=user&m=update');

        }

        $data['user'] = $user;
        $this->loadFrontView('user/update', $data);


    }

}