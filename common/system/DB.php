<?php

class DB {

    private static $instance = null;
    private $connection      = null;

    const HOST_DB = '127.0.0.1';
    const USERNAME_DB = 'root';
    const PASSWORD_DB = '';
    const DATABASE_DB = 'myshop';


    private function __construct()
    {
        $connection = mysqli_connect(self::HOST_DB, self::USERNAME_DB, self::PASSWORD_DB, self::DATABASE_DB);
        $this->connection = $connection;
    }

    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function query($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    public function translate($result)
    {
        return mysqli_fetch_assoc($result);
    }

    public function lastId()
    {
        mysqli_insert_id($this->connection);
    }

    public function error()
    {
        die(mysqli_error($this->connection));
    }
}