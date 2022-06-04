<?php

class changeImg
{

    private $imgName;
    private $email;

    public function __construct($imgName, $email)
    {
        $this->imgName = $imgName;
        $this->email = $email;
    }

    private function dbAction()
    {
        $querry = 'update users set us_picture ="' . $this->imgName . '" where us_email = "' . $this->email . '"';
        $changeImg = new querry($querry);
        $changeImg->executeQuerry();
    }

    public function changeImg()
    {
        $this->dbAction();


    }
}