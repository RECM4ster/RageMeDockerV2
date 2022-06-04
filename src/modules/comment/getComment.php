<?php
class getComment
{
    private $comId;
    public function __construct($comId)
    {
        $this->comId = $comId;
    }

    public function getCommentData()
    {
        $querry = 'Select com_id, com_body, us_name, us_picture, us_email from comment p left join users on com_user_id  = us_id where com_id ='.$this->comId;
        $getPost = new querry($querry);
        $data = $getPost->executeQuerry();
        return $data;

    }
}