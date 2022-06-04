<?php
include('querry.php');

class checkCookie
{
    private $cookieVal;

    public function getCookie()
    {
        if (isset($_COOKIE['auth'])) {
            $this->cookieVal = $_COOKIE['auth'];
        }
        $checkCookieQuery = 'select count(*) from session where ses_time_expire > unix_timestamp() and token = "' . $this->cookieVal . '"';
        $checkCookieQ = new querry($checkCookieQuery);
        $result1 = $checkCookieQ->executeQuerry();
        $result1 = $result1->fetch_array(MYSQLI_NUM);
        if ($result1[0] == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>

<script>
    if (document.readyState === 'complete') {
        window.location.replace("http://localhost:9000/login.php")
    }
</script>