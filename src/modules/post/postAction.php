<?php
include("deletePost.php");

if ($_GET['action'] == 2) {
    $delete = new deletePost($_POST['postId']);
    $delete->deletePost();
    echo '<script>window.location.replace("http://localhost:9000")</script>';
} else {
    echo '<script>window.location.replace("http://localhost:9000/modules/post/editPost.php?postId='.$_POST['postId'].'")</script>';
}

