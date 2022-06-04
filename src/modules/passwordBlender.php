<?php

class passwordBlender
{
    private $salt = "3Q5dXYpdMtJarVKVXWzR72XkpH8T74uEZz9C5nB4ajLUKaD2tepAjqFJbcRP3TKW";
    public function encrypt($password)
    {

        $rawBlend = $this->salt . $password;
        $blend = sha1($rawBlend);
        return $blend;

    }
}