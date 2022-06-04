<?php
require ('../DB/querry.php');
require ('setCookie.php');
require ('../passwordBlender.php');
class loginUsecase
{
    protected $email;
    protected $password;
    protected $LoginResult;

public function __construct($email, $password)
{
    $this->password = $password;
    $this->email = strtolower($email);
}

public function login()
{
    $blend = new passwordBlender();
    $this->password = $blend->encrypt($this->password);
    $loginQuerry = 'select us_email, count(*) from users where us_email ="'.$this->email.'" and us_is_active = 1 and  us_password ="'.$this->password.'"';
    $checkUserQ = new querry($loginQuerry);
    $result1 = $checkUserQ->executeQuerry();
    $result1 = $result1->fetch_array(MYSQLI_NUM);
    if(strtolower($result1[0]) == strtolower($this->email))
    {
        $this->LoginResult=true;
        $token = base64_encode(time().$this->email);
        $cookieValue = $token;
        $setCookie = new setCookie($cookieValue, time()+3600*12);
        $setCookie->cookieSet();
        $tokenInsertQuerry = 'insert into session (ses_email, ses_time_expire, token) values ("'.$this->email.'", "'.(time()+3600*12).'", "'.$token.'")';
        $tokenInsertQ = new querry($tokenInsertQuerry);
        $res = $tokenInsertQ->executeQuerry();
    }
    else
    {
        echo '<script>window.location.replace("http://localhost:9000/login.php?inc=1")</script>';
    }
}



}