<?php
require('../DB/querry.php');
require ('createAccount.php');
class validateAccountExist
{
    private $email;
    private $password;
    private $nickname;
    public function __construct($email, $password, $nickname)
    {
        $this->email = strtolower($email);
        $this->password = $password;
        $this->nickname = $nickname;
    }

    public function checkExistAccount()
    {
        $querry = 'select us_email, count(*) from users where us_email ="' . $this->email . '"';
        $checkUserExist = new querry($querry);
        $result1 = $checkUserExist->executeQuerry();
        $result1 = $result1->fetch_array(MYSQLI_NUM);
        if(strtolower($result1[0]) == strtolower($this->email))
        {
            echo '<script>window.location.replace("http://localhost:9000/createAccount.php?isset=1")</script>';
        }
        else
        {
            $step2 = new createAccount($this->email, $this->password, $this->nickname);
            $step2->createAccount();
        }

    }

}