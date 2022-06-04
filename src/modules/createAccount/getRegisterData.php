<?php
require ('validateAccountExist.php');
$login = $_POST['email'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$validateAccount = new validateAccountExist($login, $password, $nickname);
$validateAccount ->checkExistAccount();
