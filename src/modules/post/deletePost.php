<?php
include ('../DB/querry.php');
class deletePost
{
    private $postId;
public function __construct($id)
{
    $this->postId = $id;
}

public function deletePost()
{
    $querry = "update post set pos_is_deleted = 1 where pos_id = ".$this->postId;
    $make = new querry($querry);
    $make->executeQuerry();
}

}