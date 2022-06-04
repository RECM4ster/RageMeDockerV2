<?php
require ('loginUsecase.php');
$login = $_POST['email'];
$password = $_POST['password'];

$loginUsecase = new loginUsecase($login, $password);
$loginUsecase->login();