<?php
require ('checkCookie.php');
class cookieValidator
{
public function cookieValid()
{
    $valid = new checkCookie();
    $cookieresult = $valid->getCookie();
    return $cookieresult;
}
}

