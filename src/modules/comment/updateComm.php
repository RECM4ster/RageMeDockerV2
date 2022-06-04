<?php
include  ("updateCommentUsecase.php");
$updatePost = new updateCommentUsecase($_POST['id'],  $_POST['text']);
$updatePost -> updateComment();
echo '<script>window.location.replace("http://localhost:9000")</script>';


