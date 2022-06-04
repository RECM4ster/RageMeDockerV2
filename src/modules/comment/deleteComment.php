<?php
include ('../DB/querry.php');
class deleteComment
{
    private $commId;
    public function __construct($id)
    {
        $this->commId = $id;
    }

    public function deleteComment()
    {
        $querry = "update comment set com_is_deleted = 1 where com_id = ".$this->commId;
        $make = new querry($querry);
        $make->executeQuerry();
    }

}