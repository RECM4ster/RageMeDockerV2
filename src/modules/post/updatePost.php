<?php
include  ("updatePostUsecase.php");
$updatePost = new updatePostUsecase($_POST['id'], $_POST['title'], $_POST['text']);
$updatePost -> updatePost();
echo '<script>window.location.replace("http://localhost:9000")</script>';


