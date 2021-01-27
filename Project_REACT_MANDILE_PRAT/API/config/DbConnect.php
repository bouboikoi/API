<?php


class DbConnect
{
    private $server = "mysql:host=localhost;dbname=blog";
    private $username = "root";
    private $password = "123456";

    public function connect(){
        return new PDO($this->server, $this->username, $this->password);
    }
}