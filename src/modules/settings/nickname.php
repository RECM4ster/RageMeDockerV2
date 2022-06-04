<?php
require("../login/getEmailFromCookie.php");
require ("../DB/querry.php");
class nickname
{
    private $newNickname;

    public function __construct($newNickname)
    {
        $this->newNickname = $newNickname;
    }
    private function getUserEmail()
    {
        $email = new getEmailFromCookie();
       return $email->getEmailFromCookie();
    }

    public function changeNickname()
    {
        $querry = 'update users set us_name = "'.$this->newNickname.'"where us_email = "'.$this->getUserEmail().'"';
        $changeNickname = new querry($querry);
        $make = $changeNickname->executeQuerry();
        return $make;


    }

}