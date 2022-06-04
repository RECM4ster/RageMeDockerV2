<?php
include "modules/post/getPost.php";
include "modules/login/checkCookie.php";
include "modules/post/reaction.php";
include "modules/login/getEmailFromCookie.php";
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
    <div style="margin-top:100px;"
    <?php
        $post = new getPost($_GET['topic']);
        $data = $post->getPostData();
        while ($row = mysqli_fetch_array($data)) {
            if($row["us_picture"] == NULL || $row["us_picture"] == "")
            {
                $row["us_picture"] = "default.png";
            }
            $post_id = $row['pos_id'];
            $reaction = new reaction($row['pos_id']);
            $reactionNumber = $reaction ->getReactionNumber();
            echo '<div class="postBox col-sm-11" >';
            echo "<table><tr><td>";
            echo '<img class="userLogo" src="./upload/'.$row["us_picture"] . ' " /><br>';
            echo $row["us_name"] . "<br>";
            echo "</td><td class = 'rightSide'>";
            echo "<b>".$row["pos_topic"]."</b><br><br>";
            echo $row["pos_body"] . "<br>";
            echo "</td></tr></table>";
            echo '</div>';
        }
        ?>
        <h1 style="color: red; text-align: center; padding-bottom: 100px; padding-top: 300px;">Komentarze</h1>

        <?php
        include("./modules/comment/getCommentList.php");
        $comment = new getCommentList($_GET['topic']);
        $data = $comment -> getComment();
        while ($row = mysqli_fetch_array($data)) {
            $comment = $row['com_id'];
            if($row["us_picture"] == NULL || $row["us_picture"] == "")
            {
                $row["us_picture"] = "default.png";
            }
            echo '<div class="postBox col-sm-11" >';
            echo "<table><tr><td>";
            echo '<img class="userLogo" src="./upload/'.$row["us_picture"] . ' " /><br>';
            echo $row["us_name"] . "<br>";
            echo "</td><td class = 'rightSide'>";
            echo $row["com_body"] . "<br>";
            echo "</td></tr><tr>";
            $email = new getEmailFromCookie();
            $mail = $email->getEmailFromCookie();
            $root = $email->checkIsAdminLogged();
            if($mail === $row["us_email"] || $root === $mail)
            {
                echo '<td><form action="./modules/comment/commentAction.php?action=1" method="post">
            <input type="hidden" name="postId" value="' . $comment . '">
            <button type="submit" class="indexButton">Edytuj Post</button>
            </form></td>';
                echo '<td><form action="./modules/comment/commentAction.php?action=2" method="post">
            <input type="hidden" name="postId" value="' . $comment . '">
            <button type="submit" class="indexButton">Usuń Post </button>
            </form>';
            }
            echo "</td></tr></table>";
            echo '</div>';



        }
        ?>



    <div style="margin-bottom: 500px;"></div>
    <form id="loginForm" action="modules/comment/addComment.php" METHOD="post">
        <label class="loginLabel loginElement">Dodaj Komentarz</label></br>
        <textarea  class="loginInput loginElement" name="comment" style="height:300px"></textarea></br>
        <input type="hidden" name="postId" value="<?php echo $_GET['topic']; ?>">
        <button type="submit" class="loginButton  font24px" >Zatwierdź</button></br>
        <button type="reset" class="loginButton  font24px" >Odrzuć</button>
        </table>
    </form>




</div>
</body>
</html>