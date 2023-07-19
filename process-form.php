<?php
include 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST["commanderName"];
    $name_parts = explode(" ", $full_name);
    $first_name = $name_parts[0];
    $last_name = isset($name_parts[1]) ? $name_parts[1] : "";
    $query = "INSERT INTO tbl_215_team (comm_user_id) 
              SELECT user_id FROM tbl_215_users 
              WHERE first_name = '$first_name' AND last_name = '$last_name'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $team_id = mysqli_insert_id($connection);
        $query = "INSERT INTO tbl_215_mission (team_id) VALUES ('$team_id')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $mission_id = mysqli_insert_id($connection);
            $contF_name = $_POST["contName"];
            $contl_name = $_POST["contLname"];
            $contPnumber = $_POST["contNumber"];
            $contAdd = $_POST["contAddress"];
            $query = "INSERT INTO tbl_215_contact (first_name , last_name , phone_number , mission_id) VALUES ('$contF_name' , '$contl_name' , '$contPnumber' ,'$mission_id' )";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $safeCountry = $_POST["safeCountry"];
                $safeAdd = $_POST["safeAddress"];
                $safeDesc = $_POST["safeDesc"];
                $query = "INSERT INTO tbl_215_safe_spot (country , address , description , mission_id) VALUES ('$safeCountry' , '$safeAdd' , '$safeDesc' ,'$mission_id' )";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    $_SESSION["mission_id"] = $mission_id;
                    header('Location: nav.php');
                }
            } else {
                die("DB query failed.");
            }
        } else {
            die("DB query failed.");
        }
    } else {
        die("DB query failed.");
    }
    // Close the database connection
    mysqli_close($connection);
}
?>