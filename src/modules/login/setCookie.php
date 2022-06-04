<?php

class setCookie
{
    private $cookie;
    private $time;
public function __construct($cookie, $time)
{
    $this->cookie = $cookie;
    $this->time = $time;
}

public function cookieSet()
{
    setcookie("auth", $this->cookie, $this->time, "/" );
    header("Location: http://localhost:9000/login.php");
}

}