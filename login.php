<?php
include 'db.php';
session_start();
if (!empty($_POST["userName"])) {
    $query = "SELECT * FROM tbl_215_users WHERE username='"
        . $_POST["userName"] . "' and password = '"
        . $_POST["passWord"] . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["usr"] = $row["username"];
        $_SESSION["user_type"] = $row["type_id"];
        $_SESSION["user_id"] = $row["user_id"];
        if($_SESSION["user_type"] == 1)
        header('Location: index.php');
        else{
        header('Location: missionHistory.php');
        }
    } else {
        $message = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>After You</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="login">
    <div class="container"></div>
    <div class="center">
        <img src="images/logo.png" alt=""></a>
        <h1>Login</h1>
        <form method="post" action="#">
            <div class="txt_field">
                <input type="text" name="userName" value="<?php if(isset($_GET["user_id"])){
                $query = "SELECT * FROM tbl_215_users WHERE user_id = " . ($_GET["user_id"]);
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_array($result);
                echo $row["username"];
                }
                ?>" required />
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="passWord" required />
                <span></span>
                <label>Password</label>
            </div>
            <div class="signup_link" style="color: red;"><?php if (isset($message)) {
                                                                echo $message;
                                                            } ?></div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login" />
            <div class="signup_link">&copy; All rights reserved - After You</div>
        </form>
    </div>
</body>

</html>