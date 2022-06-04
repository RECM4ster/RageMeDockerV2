<?php
include('reaction.php');
$action = new reaction($_POST['postId']);
$action->buttonAction();
echo '<script>window.location.replace("http://localhost:9000")</script>';