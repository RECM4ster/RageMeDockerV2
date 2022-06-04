<?php
require('modules/login/checkCookie.php');
$valid = new checkCookie();
$cookieresult = $valid->getCookie();
if ($cookieresult == false) {
    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
}

if(isset($_GET['err']))
{
    echo"<script>window.alert('Nie udało się dodać posta, spróbuj ponownie później lub skontaktuj się z pomocą techniczną.')</script>";
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<table>
    <tr class="container row">
        <td id="logoSpan" class="col-sm-6"><img src="img/blackLogo.png" id="logo"/></td>
        <td  class="col-sm-1"></td>
        <td id="block"  class="col-sm-1"  onclick='window.location.replace("http://localhost:9000/index.php")'>Strona Główna</td>
        <td id="block"  class="col-sm-1"  onclick='window.location.replace("http://localhost:9000/settings.php")'>Ustawienia</td>
        <td id="block"  class="col-sm-1"  onclick='window.location.replace("http://localhost:9000/addPost.php")'>Dodaj Post</td>
        <td id="block"  class="col-sm-1" onclick="document.cookie = 'auth=';window.location.reload(true);">Wyloguj</td>
    </tr>
</table>
<div style="margin-bottom: 100px;"></div>
<form id="loginForm" action="modules/post/getPostData.php" METHOD="post">
    <label class="loginLabel loginElement">Tytuł</label></br>
    <input type="text"  class="loginInput loginElement" name="title"></br>
    <label class="loginLabel loginElement">Treść</label></br>
    <textarea  class="loginInput loginElement" name="text" style="height:300px"></textarea></br>
    <button type="submit" class="loginButton  font24px" >Zatwierdź</button></br>
    <button type="button" class="loginButton  font24px" onclick="window.location.href='/index.php'">Odrzuć</button>
    </table>
</form>

</body>
</html>





