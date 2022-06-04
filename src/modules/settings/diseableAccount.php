<?php
class diseableAccount
{
    private $password;
    private $email;
    private $passwordHash;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    private function checkIsAccountExist()
    {
        $blend = new passwordBlender();
        $this->passwordHash = $blend->encrypt($this->password);
        $checkAccountQuerry = 'select count(*) from users where us_email ="'.$this->email.'" and  us_password ="'.$this->passwordHash.'";';
        $checkAccount = new querry($checkAccountQuerry);
        $result = $checkAccount->executeQuerry();
        $result = $result->fetch_array(MYSQLI_NUM);
        if($result[0] == 0)
        {
            return false;
        }
        return true;
    }

    private function diseable()
    {
        $diseableQuerry = 'update users set us_is_active = 0 where us_email ="'.$this->email.'" and  us_password ="'.$this->passwordHash.'";';
        $querry = new querry($diseableQuerry);
        $result = $querry->executeQuerry();
        return $result;
    }

    public function diseableAccount()
    {
        if($this->checkIsAccountExist() == true)
        {
            return $this->diseable();
        }
        return false;

    }


}