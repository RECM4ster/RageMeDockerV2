<?php

class changeEmail
{
    private $oldEmail;
    private $newEmail;
    private $password;
    private $passwordHash;

    public function __construct($oldEmail, $newEmail, $password)
    {
        $this->oldEmail = $oldEmail;
        $this->newEmail = $newEmail;
        $this->password = $password;
    }

    private function blendPassword()
    {
        $blend = new passwordBlender();
        $this->passwordHash = $blend->encrypt($this->password);
    }

    private function checkIsEmailExist()
    {
        $this->blendPassword();
        $querry = 'select count(*) from users where us_email ="' . $this->oldEmail . '" and  us_password = "' . $this->passwordHash . '"';
        $checkQuerry = new querry($querry);
        $result = $checkQuerry->executeQuerry();
        $result = $result->fetch_array(MYSQLI_NUM);
        if ($result[0] == 1) {
            return true;
        }
        return false;

    }


    private function updateEmail()
    {
        $querry = 'update users set us_email = "' . $this->newEmail . '" where us_email = "' . $this->oldEmail . '" and us_password  = "' . $this->passwordHash . '"';
        $updateEmail = new querry($querry);
        $result = $updateEmail->executeQuerry();
        return $result;
    }


    public function changeEmail()
    {
        if ($this->checkIsEmailExist() == true) {
            return $this->updateEmail();
        }
    }


}