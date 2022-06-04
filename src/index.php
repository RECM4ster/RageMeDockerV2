<?php
require('modules/login/checkCookie.php');
require ('modules/post/reaction.php');
include ("modules/login/getEmailFromCookie.php");
$valid = new checkCookie();
$cookieresult = $valid->getCookie();
if ($cookieresult == false) {
    echo '<script>window.location.replace("http://localhost:9000/login.php")</script>';
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
<div class="container" style="width: 100%; ">
    <table>
        <tr class="row">
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
            <td id="block" class="col-sm-1" onclick="document.cookie = 'auth=';window.location.reload(true);">Wyloguj
            </td>
        </tr>
    </table>
    <div class="postSection">
        <?php
        require("./modules/post/getPostList.php");
        $posts = new getPostList();
        $data = $posts->getAllPost();
        while ($row = mysqli_fetch_array($data)) {
            $post_id = $row['pos_id'];
            $reaction = new reaction($row['pos_id']);
            $reactionNumber = $reaction ->getReactionNumber();
            if($row["us_picture"] == NULL || $row["us_picture"] == "")
            {
                $row["us_picture"] = "default.png";
            }
            echo '<div class="postBox col-sm-5" >';
            echo "<table><tr><td>";
            echo '<img class="userLogo" src="./upload/'.$row["us_picture"] . ' " /><br>';
            echo $row["us_name"] . "<br>";
            echo "</td><td class = 'rightSide'>";
            echo "<b><a href='topic.php?topic=".$post_id."'>".$row["pos_topic"] . "</a></b><br><br>";
            echo $row["pos_body"] . "<br>";
            echo "</td></tr></table>";

            echo '<form action="./modules/post/addReaction.php" method="post">
            <input type="hidden" name="postId" value="'.$post_id.'">
            <button type="submit" class="indexButton">Raged Me! : '. $reactionNumber.'</button>
            </form>';
            $email = new getEmailFromCookie();
            $mail = $email->getEmailFromCookie();
            $root = $email->checkIsAdminLogged();
            if($mail === $row["us_email"] || $root === $mail)
            {
                echo '<form action="./modules/post/postAction.php?action=1" method="post">
            <input type="hidden" name="postId" value="'.$post_id.'">
            <button type="submit" class="indexButton">Edytuj Post</button>
            </form>';
                echo '<form action="./modules/post/postAction.php?action=2" method="post">
            <input type="hidden" name="postId" value="'.$post_id.'">
            <button type="submit" class="indexButton">Usuń Post </button>
            </form>';
            }





            echo '</div>';
        }
        ?>





</div>
    </div>

</div>


</body>
</html>





