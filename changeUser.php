<?php
session_start();
if (!isset($_SESSION["usr"])) {
    header("Location: logout.php");
}
include 'db.php';
$query = "SELECT * FROM tbl_215_users WHERE user_id = " . intval($_SESSION["user_id"]);
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
    $f_name = $row["first_name"];
    $l_name = $row["last_name"];
    $img = $row["profile_pic"];
    $flag = 1;
    $pass = $row["password"];
    $userName = $row["username"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>After You</title>
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/347441d68e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/style.css" />
    <script src="scripts/script.js" defer></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <a href="index.php"><img src="images/logo.png" alt=""></a>
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search" />
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <img src=<?php echo '"images/' . $img . '"' ?> alt="" class="profile" />
            <div class="dropdown">
                <button class="dropdown-btn" aria-haspopup="menu">
                    <span><?php echo $f_name . ' ' . $l_name ?></span>
                    <span class="arrow"></span>
                </button>
                <ul class="dropdown-content" role="menu">
                    <li style="--delay: 1;"><a href="editProfile.php"><i class="fa-solid fa-user-pen fa-sm" style="color: #ffffff;"></i> Edit Profile</a></li>
                    <li style="--delay: 2;"><a href="changeUser.php"><i class="fa-solid fa-person-walking-arrow-loop-left fa-sm" style="color: #ffffff;"></i> Change User</a></li>
                    <li style="--delay: 3;"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket fa-sm" style="color: #ffffff;"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <?php if ($_SESSION["user_type"] == 1) {
                    echo '<li class="item"><a href="index.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </a>
                </li>';
                }
                ?>
                <li class="item">
                    <a href="missionSettings.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-grid-alt"></i>
                        </span>
                        <span class="navlink">Mission Settings</span>
                    </a>
                </li>
                <?php if ($_SESSION["user_type"] == 1) {
                    echo '<li class="item"><a href="missionHistory.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-list-ul"></i>
                        </span>
                        <span class="navlink">Mission History</span>
                    </a>
                </li>';
                } else {
                    echo '<li class="item">
                    <a href="missionHistory.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-list-ul"></i>
                        </span>
                        <span class="navlink">Active Missions</span>
                    </a>
                </li>';
                }
                ?>
                <ul class="menu_items">
                    <div class="menu_title menu_setting"></div>
                    <li class="item">
                        <a href="editProfile.php" class="nav_link">
                            <span class="navlink_icon">
                                <i class="fa-solid fa-user-pen  fa-xs"></i>
                            </span>
                            <span class="navlink">Edit Profile</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="changeUser.php" class="nav_link">
                            <span class="navlink_icon">
                                <i class="fa-solid fa-person-walking-arrow-loop-left fa-xs"></i>
                            </span>
                            <span class="navlink">Change User</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="logout.php" class="nav_link">
                            <span class="navlink_icon">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-xs"></i>
                            </span>
                            <span class="navlink">Log Out</span>
                        </a>
                    </li>
                </ul>
                <!-- Sidebar Open / Close -->
                <div class="bottom_content">

                    <div class="bottom expand_sidebar">
                        <span> Expand</span>
                        <i class='bx bx-log-in'></i>
                    </div>
                    <div class="bottom collapse_sidebar">
                        <div class="">
                            <i class="fa-solid fa-location-dot fa-xl" style="color: #34d714;"></i>
                            <i class="fa-solid fa-car-on fa-xl"></i>
                            <i class="fa-solid fa-wifi fa-xl"></i>
                            <i class="fa-solid fa-signal fa-xl"></i>
                        </div>
                        <span> Collapse</span>
                        <i class='bx bx-log-out'></i>
                    </div>
                </div>
        </div>
    </nav>
    <main>
        <div class="wrapper">
            <div class="bcca-breadcrumb">
                <div class="bcca-breadcrumb-item"><i class="fa-solid fa-person-walking-arrow-loop-left fa-lg"></i> Change User</div>
                <a href="index.php">
                    <div class="bcca-breadcrumb-item">Home</div>
                </a>
            </div>
            <section class="changeUser">
                <div id="changeUser" class="profile-card">
                    <div class="data">
                        <?php $query = "SELECT * FROM tbl_215_users";
                        $result = mysqli_query($connection, $query);
                        if (!$result) {
                            die("DB query failed.");
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="image">
                            <a href="logout.php?user_id=' . $row["user_id"] . '">
                                <img src="images/' . $row["profile_pic"] . '" alt="" class="profile-pic" style="">
                            </a>
                        <h5>Switch to - ' . $row["first_name"] . ' ' . $row["last_name"] . '</h5>
                        <h5>' . ($row["type_id"] == 1 ? 'Mission Commander' : 'War-Room Commander') . '</h5>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
                <script src="scripts/editForms.js"></script>
            </section>
        </div>
    </main>
    <script src="scripts/script.js" defer></script>
</body>

</html>