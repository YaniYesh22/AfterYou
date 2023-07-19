<?php
session_start();
session_unset();
session_destroy();

if(isset($_GET["user_id"])){
$userId = $_GET["user_id"];

header("Location: login.php?user_id=$userId");
}
else{
    header("Location: login.php");
}