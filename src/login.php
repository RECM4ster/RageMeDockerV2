<?php
require("./modules/login/cookieValidator.php");
if (isset($_COOKIE['auth']))
{
$cookieValidator = new cookieValidator();
$bool = $cookieValidator->cookieValid();
if($bool == true)
{
    echo '<script>window.location.replace("http://localhost:9000/index.php")</script>';
}
}

if(isset($_GET['inc']))
{
    echo"<script>window.alert('konto nie istnieje lub dane do logowania są niepoprawne')</script>";
    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./css/main.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div id="loginPage">
<form id="loginForm" action="modules/login/getLoginData.php" METHOD="post">
    <img src="img/redLogo.png" id="loginLogo"></br>
    <label class="loginLabel loginElement">Email</label></br>
    <input type="text" placeholder="e-mail" class="loginInput loginElement" name="email"></br>
    <label class="loginLabel loginElement">Haslo</label></br>
    <input type="password" placeholder="Hasło" class="loginInput loginElement" name="password"></br>
    <input type="checkbox" class="loginCheckbox loginElement font24px">
    <label class="loginLabel loginElement">Zapamiętaj mnie</label></br>
    <button type="submit" class="loginButton loginElement font24px" >Zaloguj</button></br>
    <button type="button" class="loginButton loginElement font24px" onclick="window.location.href='/createAccount.php'">Nie mam konta</button>
</form>
</div>
</body>
</html>





