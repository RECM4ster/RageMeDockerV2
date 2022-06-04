<?php
include("deleteComment.php");

if ($_GET['action'] === 2) {
    $delete = new deleteComment($_POST['postId']);
    $delete->deleteComment();
    echo '<script>window.location.replace("http://localhost:9000")</script>';
} else
{
    echo '<script>window.location.replace("http://localhost:9000/modules/comment/editComment.php?commId='.$_POST['postId'].'")</script>';
}

