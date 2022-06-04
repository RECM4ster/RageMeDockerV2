<?php
require ('connect.php');
class querry
{
    private $querry;
    public function __construct($querry)
    {
        $this->querry = $querry;
    }

    public function executeQuerry()
    {
        $sql = new connect();
        $sqlConnect = $sql->connected();
        $sqlOutput =mysqli_query($sqlConnect, $this->querry);
        return $sqlOutput;
    }
}

