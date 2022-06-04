<?php
@include("../DB/querry.php");
class getCommentList
{
    private $postId;

    public function __construct($posId)
    {
        $this->postId = $posId;
    }

    public function getComment()
    {
        $querry = ' Select com_is_deleted  ,com_id, com_body, com_reactions, us_name, us_picture, us_email 
from comment p 
left join users on com_user_id  = us_id
WHERE (com_is_deleted is NULL or com_is_deleted = 0) and com_post ='.$this->postId;
        $make = new querry($querry);
        $data = $make->executeQuerry();
        return $data;
    }
}