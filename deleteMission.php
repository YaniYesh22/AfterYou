<?php
include 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $mission_id = $_GET["mission_id"];
    $query = "DELETE FROM tbl_215_mission WHERE mission_id = $mission_id";
    $result = mysqli_query($connection, $query);
    $_SESSION["mission_id"] = null;
    header('Location: missionSettings.php');
}
