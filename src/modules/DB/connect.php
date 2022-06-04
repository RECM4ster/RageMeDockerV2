<?php

class connect
{
    private $ip = '172.18.0.3';
    private $login = 'root';
    private $password = 'root';
    private $dbname = 'ragedb';
    public function connected()
    {
        $conn  = new mysqli($this->ip, $this->login, $this->password, $this->dbname);
        return $conn;
    }

}