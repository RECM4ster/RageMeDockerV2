<?php
include ('../DB/querry.php');
class updateCommentUsecase
{
    private $comId;
    private $body;
    public function __construct($id, $body)
    {
        $this->comId = $id;
        $this->body = $body;
    }

    public function updateComment()
    {
        $querry  = 'update comment set  com = "'.$this->body.'" where com_id ='.$this->comId;
        $make = new querry($querry);
        $make->executeQuerry();
    }

}