<?php
include "../DB/querry.php";
class InsertComment
{
    private  $comment;
    private $pos_id;
    public function __construct($comment, $pos_id)
    {
        $this->comment = $comment;
        $this->pos_id = $pos_id;
    }

    private function getUserEmail()
    {
        $cookie = $_COOKIE['auth'];
        $cookie = base64_decode($cookie);
        $email = substr($cookie, 10);
        return $email;
    }

    private function getUserId()
    {
        $email = $this->getUserEmail();
        $querry = 'select us_id from users u where us_email ="'.$email.'"' ;
        $idQuerry = new querry($querry);
        $result1 = $idQuerry->executeQuerry();
        $result1 = $result1->fetch_array(MYSQLI_NUM);
        return $result1[0];


    }

    public function addComment()
    {
        $userId = $this->getUserId();
        $querry = 'insert into comment (com_user_id, com_post, com_body) values ("'.$userId.'", "'.$this->pos_id.'", "'.$this->comment.'")';
        $make = new querry($querry);
        $make->executeQuerry();
    }


}