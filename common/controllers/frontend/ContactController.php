<?php

class ContactController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function contact()
    {
        $data = array();
        $insertInfo = array();

        if(isset($_POST['sendMessage'])){

            $insertInfo = array(

                'userName' => (isset($_POST['userName']))? $_POST['userName'] : '',
                'userEmail' => (isset($_POST['userEmail']))? $_POST['userEmail'] : '',
                'userPhone' => (isset($_POST['userPhone']))? $_POST['userPhone'] : '',
                'userMsg' => (isset($_POST['userMsg']))? $_POST['userMsg'] : '',
            );
        }


        $this->loadFrontView('contact/listing', $data);
    }
}