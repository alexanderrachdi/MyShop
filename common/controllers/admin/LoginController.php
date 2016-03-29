<?php

class LoginController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data = array();
        $adminCollection = new AdminCollection();

        $errors = array();

        if (isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 3 && strlen($_POST['password']) > 3 ) {

            $username = htmlspecialchars(trim($_POST['username']));
            $where = array('username' => $username);
            $result = $adminCollection->getAll($where);

            if($result != null && $result[0]->getPassword() == $_POST['password']){

                $_SESSION['admin'] = $result[0];
                $_SESSION['is_logged'] = 1;
                header('Location: index.php?c=dashboard');
            } else {
                $errors['login'] = 'Wrong credentials';
            }



        }

        $data['errors'] = $errors;
        $this->loadAdminView('login', $data);

    }

    public function logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['is_logged']);
        header('Location: index.php?c=login&m=login');
    }

}
