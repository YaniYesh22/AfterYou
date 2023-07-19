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
                <div class="bcca-breadcrumb-item"><i class="fa-solid fa-gears fa-lg"></i> Mission Settings</div>
                <a href="index.php">
                    <div class="bcca-breadcrumb-item">Home</div>
                </a>
            </div>
            <section class="missionSettings">
                <div id="profCard" class="profile-card">
                    <div class="image">
                        <img src=<?php echo '"images/' . $img . '"' ?> alt="" class="profile-pic">
                    </div>
                    <div class="data">
                        <h2>Current Mission:
                            <?php if (!isset($_SESSION["mission_id"])) {
                                echo "No Mission Assigned";
                                $flag = 0;
                            } else {
                                echo "#" . " " . $_SESSION["mission_id"];
                            } ?></h2>
                        <span><?php echo $f_name . ' ' . $l_name ?></span>
                        <span><?php echo ($_SESSION["user_type"] == 1) ? "Mission Commander" : "War Room"; ?></span>
                        <?php if ($flag == 0) {
                            echo '<a href="index.php"><div class="buttons"><div class="btn" id="editSpot">Home</div></div></a>';
                        } else {
                            echo '<div class="buttons">
                        <div class="btn" id="editSpot">Edit Safe Spot Details</div>
                        <div class="btn" id="editContact">Edit Contact Details </div>';
                        }
                        ?>
                    </div>
                </div>
        </div>
        <script src="scripts/editForms.js"></script>

        <div id="safeSpotCard" class="profile-card" style="display:none">
            <div class="data">
                <h2>Safe Spot Details</h2>
                <form action="updateForm.php" method="POST" class="form" id="frm">
                    <?php
                    $query = "SELECT * FROM tbl_215_safe_spot WHERE mission_id = " . ($_SESSION["mission_id"]);
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("DB query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $missionCountry = $row["country"];
                        $missionAddress = $row["address"];
                        $desc = $row["description"];
                    } ?>
                    <div class="step-forms step-forms-active">
                        <div class="group-inputs">
                            <label for="safeCountry">Country *</label>
                            <input type="text" name="safeCountry" id="safeCountry" value="<?php echo $missionCountry ?>" />
                        </div>
                        <div class="group-inputs">
                            <label for="safeAddress">Address *</label>
                            <input type="text" name="safeAddress" id="safeAddress" value="<?php echo $missionAddress ?>" />
                        </div>
                        <div class="group-inputs">
                            <label for="safeDesc">Description *</label>
                            <input type="text" name="safeDesc" id="safeDesc" value="<?php echo $desc ?>" />
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="Save Changes" id="submitChange" class="btn" />
                    </div>
                </form>
            </div>
        </div>
        <div id="contactCard" class="profile-card" style="display:none">
            <div class="data">
                <h2>Emergency Contact Details</h2>
                <form action="updateForm.php" method="POST" class="form" id="frm">
                    <?php
                    $query = "SELECT * FROM tbl_215_contact WHERE mission_id = " . ($_SESSION["mission_id"]);
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("DB query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $contactFname = $row["first_name"];
                        $contactlname = $row["last_name"];
                        $contactPnum = $row["phone_number"];
                    } ?>
                    <div class="step-forms step-forms-active">
                        <div class="group-inputs">
                            <label for="contName">First Name *</label>
                            <input type="text" name="contName" id="contName" value="<?php echo $contactFname ?>" />
                        </div>
                        <div class="group-inputs">
                            <label for="contLname">last Name *</label>
                            <input type="text" name="contLname" id="contLname" value="<?php echo $contactlname ?>" />
                        </div>
                        <div class="group-inputs">
                            <label for="contNumber">Phone Number *</label>
                            <input type="tel" name="contNumber" id="contNumber" placeholder="" value="<?php echo $contactPnum ?>" />
                        </div>
                        <div class="group-inputs">
                            <label for="contAddress">Address</label>
                            <input type="text" name="contAddress" id="contAddress" />
                        </div>
                        <div class="buttons">
                            <input type="submit" value="Save Changes" id="submitChange" class="btn" />
                        </div>
                </form>
            </div>
        </div>
        </section>
        </div>
    </main>
    <script src="scripts/script.js" defer></script>
</body>

</html>