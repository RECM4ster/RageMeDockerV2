<?php
include 'InsertComment.php';

$insert = new InsertComment($_POST['comment'], $_POST['postId']);
$insert->addComment();
echo '<script>window.location.replace("http://localhost:9000/topic.php?topic='.$_POST['postId'].'")</script>';