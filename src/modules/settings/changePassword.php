<?php
require ("../passwordBlender.php");
class changePassword
{
    private $password1;
    private $password2;
    private $oldPassword;
    private $email;

    public function __construct($Password1, $Password2, $oldPassword)
    {
        $this->password1 = $Password1;
        $this->password2 = $Password2;
        $this->oldPassword = $oldPassword;
    }

    private function validateData()
    {
        if($this->password1 <> $this->password2)
        {
            return false;
        }
        return true;
    }

    private function getEmailFormCookie()
    {
        $email = new getEmailFromCookie();
        $this->email = $email->getEmailFromCookie();
    }

    private function checkOldPassword()
    {
        $this->getEmailFormCookie();
        $blend = new passwordBlender();
        $password = $blend->encrypt($this->oldPassword);
        $loginQuerry = 'select count(*) from users where us_email ="'.$this->email.'" and  us_password ="'.$password.'";';
        $checkUserQ = new querry($loginQuerry);
        $result = $checkUserQ->executeQuerry();
        $result = $result->fetch_array(MYSQLI_NUM);
        if($result[0] == 0)
        {
            return false;
        }
        return true;

    }

    private function addnewPassword()
    {
        $blend = new passwordBlender();
        $password = $blend->encrypt($this->password1);
        $updatePasswordQuerry = 'update users set us_password = "'.$password.'" where us_email = "'. $this->email. '"';
        $updatePass = new querry($updatePasswordQuerry);
        $result = $updatePass->executeQuerry();
        return $result;
    }

    public function changePassword()
    {
        if($this->validateData() == true)
        {
            if($this->checkOldPassword() == true)
            {
              return $this->addnewPassword();

            }
        }
        return false;
    }
}