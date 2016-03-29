<?php

class LoginController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data = array();
        $errors = array();

        $userCollection = new UserCollection();

        if(isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 3 && strlen($_POST['password']) > 3) {

            $username = htmlspecialchars(trim($_POST['username']));
            $where = array('username' => $username);
            $result = $userCollection->getAll($where);

            if ($result != null && $result[0]->getPassword() == $_POST['password']){

                $_SESSION['user'] = $result[0];
                $_SESSION['userLogin'] = 2;
                header('Location: index.php?c=dashboard&m=index');
            } else {
                $errors['login'] = 'Wrong credentials';
            }

        }
        $data['errors'] = $errors;
        $this->loadFrontView('login', $data);


    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['userLogin']);
        header('Location: index.php?c=login&m=login');
    }





}