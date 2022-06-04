<?php
if(isset($_GET['isset']))
{
    echo"<script>window.alert('Istnieje konto zarejestrowane na ten adres email. Jeżeli chcesz odzyskać konto prosimy o kontakt na rage@me.com')</script>";
    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
}
if(isset($_GET['error']))
{
    echo"<script>window.alert('Wystąpił błąd podczas rejestrowania konta. Prosimy spróbować ponownie później')</script>";

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
    <form id="loginForm" action="modules/createAccount/getRegisterData.php" method="post">
        <img src="img/redLogo.png" id="loginLogo"></br>
        <label class="loginLabel loginElement">Email</label></br>
        <input type="text" placeholder="e-mail" class="loginInput loginElement" name="email"></br>
        <label class="loginLabel loginElement">Nickname</label></br>
        <input type="text" placeholder="nickname" class="loginInput loginElement" name="nickname"></br>
        <label class="loginLabel loginElement">Haslo</label></br>
        <input type="password" placeholder="Hasło" class="loginInput loginElement" name="password"></br>
        <input type="checkbox" class="loginCheckbox loginElement font24px">
        <label class="loginLabel loginElement">Zapamiętaj mnie</label></br>
        <button type="submit" class="loginButton loginElement font24px" >Zarejestruj</button></br>
    </form>
</div>
</body>
</html>





