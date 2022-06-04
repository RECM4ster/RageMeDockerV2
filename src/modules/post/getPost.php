<?php
class getPost
{
    private $postId;
    public function __construct($post_id)
    {
        $this->postId = $post_id;
    }

    public function getPostData()
    {
        $querry = 'Select pos_id, pos_topic, pos_body, us_name, us_picture, us_email from post p left join users on pos_user_id  = us_id where pos_id ='.$this->postId;
        $getPost = new querry($querry);
        $data = $getPost->executeQuerry();
        return $data;

    }
}