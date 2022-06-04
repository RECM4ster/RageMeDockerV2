<?php
require('addPostUsecase.php');
$title = $_POST['title'];
$text = $_POST['text'];
$addPostUsecase = new addPostUsecase($title, $text);
$result = $addPostUsecase->addPost();

if($result == true)
{
    echo '<script>window.location.replace("http://localhost:9000/")</script>';
}

else
{
    echo '<script>window.location.replace("http://localhost:9000/addPost.php?err=1")</script>';

}