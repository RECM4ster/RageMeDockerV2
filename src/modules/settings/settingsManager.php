<?php
require("nickname.php");
require("changeImg.php");
require("changePassword.php");
require("changeEmail.php");
require ("diseableAccount.php");
require("../login/setCookie.php");
$action = $_GET['action'];

switch ($action) {
    case "nick":
        $nickname = $_POST['nickname'];
        $do = new nickname($nickname);
        $res = $do->changeNickname();
        if ($res != true) {
            echo "<script>window.alert('zmiana się nie powiodła, spróbuj ponownie później')</script>";
        }
        echo '<script>window.location.replace("http://localhost:9000/settings.php?true=1")</script>';
        break;
    case"img":
        $type = $_FILES['userfile']['type'];
        if ($type != "image/png" && $type != "image/jpeg") {
            echo "<script>window.alert('zmiana się nie powiodła, spróbuj ponownie później')</script>";
            echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
        } else {
            $email = new getEmailFromCookie();
            $email = $email->getEmailFromCookie();
            $file_tmp = $_FILES['userfile']['tmp_name'];
            $file_name = $email . $_FILES['userfile']['name'];
            $file_destination = '../../upload/' . $file_name;
            move_uploaded_file($file_tmp, $file_destination);
            $changeImg = new changeImg($file_name, $email);
            $changeImg->changeImg();
            echo '<script>window.location.replace("http://localhost:9000/settings.php?true=1")</script>';
        }
        break;
    case "passwd":
        if ($_POST['newPasswd1'] === $_POST['newPasswd2']) {
            $changePassword = new changePassword($_POST['newPasswd1'], $_POST['newPasswd2'], $_POST['confirm']);
            $result = $changePassword->changePassword();
            if ($result == true) {
                echo "<script>window.alert('Poprawnie zmieniono hasło. Zostaniesz wylogowany')</script>";
                echo '<script>document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });</script>';
                echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
            } else {
                echo "<script>window.alert('Nie udało się zmienić hasła. Spróbuj ponownie później')</script>";
                echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
            }
        } elseif (strlen($_POST['newPasswd1']) < 8) {
            echo "<script>window.alert('Podane Hasło jest za krótkie, spróbuj jeszcze raz')</script>";
            echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
        } else {
            echo "<script>window.alert('Podane Hasła są różne, spróbój jeszcze raz')</script>";
            echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
        }
        break;
    case "email":
        if ($_POST['newEmail1'] == $_POST['newEmail2']) {
            $email = new getEmailFromCookie();
            $email = $email->getEmailFromCookie();
            if ($_POST['oldEmail'] == $email) {
                $changeEmail = new changeEmail($_POST['oldEmail'], $_POST['newEmail1'], $_POST['password']);
                $result = $changeEmail->changeEmail();
                if ($result == true) {
                    echo "<script>window.alert('Poprawnie zmieniono email. Zostaniesz wylogowany')</script>";
                    echo '<script>document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });</script>';
                    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
                } else {
                    echo "<script>window.alert('Nie udało się zmienić adresu email. Spróbuj ponownie później')</script>";
                    echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
                }
            } else {
                echo "<script>window.alert('Podane email jest niepoprawny, spróbój jeszcze raz')</script>";
                echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
            }
        } else {
            echo "<script>window.alert('Podane emaile są różne, spróbój jeszcze raz')</script>";
            echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
        }
        break;
    case "del":
        $email = new getEmailFromCookie();
        $email = $email->getEmailFromCookie();
        $diseable = new diseableAccount($email, $_POST['password']);
        $result = $diseable->diseableAccount();
        if ($result == true) {
            echo "<script>window.alert('Usunięto konto')</script>";
            echo '<script>document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });</script>';
            echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
        } else {
            echo "<script>window.alert('Nie udało się usunąć konta. Spróbuj ponownie później')</script>";
            echo '<script>window.location.replace("http://localhost:9000/settings.php")</script>';
        }

        break;

}