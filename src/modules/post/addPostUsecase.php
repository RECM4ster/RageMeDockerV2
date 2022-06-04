<?php

require ('../DB/querry.php');

class addPostUsecase
{
private $title;
private $text;

public function __construct($title, $text)
{
    $this->title = $title;
    $this->text = $text;
}

private function getUserEmail()
{
$cookie = $_COOKIE['auth'];
$cookie = base64_decode($cookie);
$name = substr($cookie, 10);
return $name;
}

private function getUserId($email)
{
    $querry = 'select us_id from users u where us_email ="'.$email.'"' ;
    $idQuerry = new querry($querry);
    $result1 = $idQuerry->executeQuerry();
    $result1 = $result1->fetch_array(MYSQLI_NUM);
    return $result1[0];


}

public function addPost()
{
    $getEmail = $this->getUserEmail();
    $getId = $this->getUserId($getEmail);
    $addPostQuerry = 'insert into post (pos_topic, pos_body, pos_user_id, pos_time_create) values ("'.$this->title.'","'.$this->text.'","'.$getId.'","'. time().'")';
    $addPostQ = new querry($addPostQuerry);
    return($addPostQ->executeQuerry());

}
}