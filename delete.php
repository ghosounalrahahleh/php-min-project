<?php
session_start();
echo $_POST["delete-user"];
if (isset($_POST["delete"])) {
    $id=$_POST["delete-user"];
    unset($_SESSION[$id]);
    header("location:admain.php");
    die;
}
