<?php
include ('../DB/querry.php');
class updatePostUsecase
{
    private $postId;
    private $body;
    private $topic;
 public function __construct($id, $topic, $body)
 {
    $this->postId = $id;
    $this->topic = $topic;
    $this->body = $body;
 }

 public function updatePost()
 {
    $querry  = 'update post set pos_topic = "'.$this->topic.'" , pos_body = "'.$this->body.'" where pos_id ='.$this->postId;
    $make = new querry($querry);
    $make->executeQuerry();
 }

}