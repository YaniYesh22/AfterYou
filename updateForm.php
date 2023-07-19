<?php
include 'db.php';
session_start();





if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"])){
        $userName = $_POST["username"];
        $Password = $_POST["Password"];
        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["LastName"];
        $userId = $_SESSION["user_id"];
        $query = "UPDATE tbl_215_users SET username = '$userName', password = '$Password', first_name = '$FirstName', last_name = '$LastName' WHERE user_id = $userId";
        $result = mysqli_query($connection, $query);
        header('Location: editProfile.php?changed=true');
    }

    else if (isset($_POST["safeCountry"])) {
            $safeCountry = $_POST["safeCountry"];
            $safeAddress = $_POST["safeAddress"];
            $safeDesc = $_POST["safeDesc"];
            $missionId = $_SESSION["mission_id"];
            $query = "UPDATE tbl_215_safe_spot SET country = '$safeCountry', address = '$safeAddress', description = '$safeDesc' WHERE mission_id = $missionId";
        header('Location: missionSettings.php');
            $result = mysqli_query($connection, $query);
        } else {
            $contactFname = $_POST["contName"];
            $contactlname = $_POST["contLname"];
            $contactPnum = $_POST["contNumber"];
            $missionId = $_SESSION["mission_id"];
            $query = "UPDATE tbl_215_contact SET first_name = '$contactFname', last_name = '$contactlname', phone_number = '$contactPnum' WHERE mission_id = $missionId";
        header('Location: missionSettings.php');
            $result = mysqli_query($connection, $query);
        }
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_SESSION["user_type"] == 2)
    $war_room_id = $_SESSION["user_id"];
    $missionId = $_GET["mission_id"];
    $teamId = $_GET["team_id"];
    $query = "UPDATE tbl_215_team SET war_room_user_id = '$war_room_id' WHERE team_id = $teamId";
    $result = mysqli_query($connection, $query);
    $_SESSION["mission_id"] = $missionId;
    header('Location: missionHistory.php?mission_id=' . $missionId);
}
