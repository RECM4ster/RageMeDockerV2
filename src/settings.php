<?php
require('modules/login/checkCookie.php');
$valid = new checkCookie();
$cookieresult = $valid->getCookie();
if ($cookieresult == false) {
    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
}

if(isset($_GET["true"]))
{
    echo '<script>window.alert("Zmiana powiodła się")</script>';
    echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';

}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="modules/settings/settings.js"></script>
    <script src="modules/settings/repeatValidator.js"></script>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div class="container" style="width: 100%; height: 100%;">


<table>
    <tr class=" row">
        <td id="logoSpan" class="col-sm-6"><img src="img/blackLogo.png" id="logo"/></td>
        <td class="col-sm-1"></td>
        <td id="block" class="col-sm-1" onclick='window.location.replace("http://localhost:9000/index.php")'>Strona
            Główna
        </td>
        <td id="block" class="col-sm-1" onclick='window.location.replace("http://localhost:9000/settings.php")'>
            Ustawienia
        </td>
        <td id="block" class="col-sm-1" onclick='window.location.replace("http://localhost:9000/addPost.php")'>Dodaj
            Post
        </td>
        <td id="block" class="col-sm-1" onclick="document.cookie = 'auth=';window.location.reload(true);">Wyloguj</td>
    </tr>
</table>

    <div class="row ">
<table class="col-sm-1">
    <tr>
        <td><div onclick="settings()" id="settingsBlock">Użytkownik</div>
        </td>
    </tr>
    <tr>
        <td><div onclick="security()" id="settingsBlock">Bezpieczeństwo</div>
        </td>
    </tr>
    <tr>
        <td><div onclick="deleteAccount()" id="settingsBlock">Usuń konto</div>
        </td>
    </tr>
</table>
        <div class="col-sm-1"></div>

<div class="col-sm-8">
  <span id="form"></span>
</div>



</div>

</body>
</html>





