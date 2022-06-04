<?php
require ('../passwordBlender.php');

class createAccount
{
    private $email;
    private $password;
    private  $nickname;

    public function __construct($email, $password, $nickname)
    {
        $this->password = $password;
        $this->email = strtolower($email);
        $this->nickname = $nickname;
    }



    public function createAccount()
    {
        $passwordBlender = new passwordBlender();
        $blend = $passwordBlender->encrypt($this->password);
        $querry = 'insert into users (us_name, us_email, us_password, us_is_active) values ("'.$this->nickname.'", "'.$this->email.'", "'.$blend.'", 1)';
        $createUserQUerry = new querry($querry);
        $make = $createUserQUerry->executeQuerry();

        if($make == true)
        {
            echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';

        }
        else
        {
            echo '<script>window.location.replace("http://localhost:9000/createAccount.php?error=1")</script>';
        }

    }

}