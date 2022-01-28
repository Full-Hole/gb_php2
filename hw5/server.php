<?php

require_once('autoload.php');
session_start();



$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
$pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";

$pass = md5($pass.strrev(md5($login)));

$sql = "select id from users where login='$login' and pass='$pass'";

$res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));

if(mysqli_num_rows($res)){
    $_SESSION['login'] = $login;
    $_SESSION['pass'] = $_POST['pass'];
    header("Location: index.php?success=true");
}else {
    header("Location: index.php?success=false");
}