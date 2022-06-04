<?php
@include ("../DB/querry.php");
class getEmailFromCookie
{
public function getEmailFromCookie()
{
    $cookie = $_COOKIE['auth'];
    $cookie = base64_decode($cookie);
    $name = substr($cookie, 10);
   return $name;
}

public function checkIsAdminLogged()
{
    $mail = new getEmailFromCookie();
    $loggedEmail = $mail->getEmailFromCookie();
    $querry = 'select us_email from users 
left join adm on us_id = adm_us_id
where adm_is_active = 1 and us_email = "'.$loggedEmail.'"';
    $new = new querry($querry);
    $make = $new->executeQuerry();
    $return = false;
    if(isset(mysqli_fetch_row($make)[0]))
    {
        $return =  mysqli_fetch_row($make)[0];
    }
    return $return;
}
}
