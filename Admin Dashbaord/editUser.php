<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Manage Users</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="sidebar">
        <div class="logo-details">
            <a href="index.php">
                <i class='bx bxl-unsplash'></i>
            </a>
            <span class="logo_name">Dashboard</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="editUser.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Edit Users</span>
                </a>
            </li>
            <li>
                <a href="addUser.php">
                     <i class='bx bx-user-plus'></i>
                     <span class="links_name">Add User</span>
                </a>
            </li>
            <li>
                <a href="manage_users.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Users</span>
                </a>
            </li>
           
            <li class="log_out">
                <a href="http://localhost/IWT/BestWeb/admin.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">BEST WEB</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
     <!-- Add Session here -->
           
            </div>
        </nav>


        <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        </script>


<?php
include_once('Db.php');

if (isset($_POST["add"])) {
    $uid = $_POST["uid"];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET firstname='$first_name', lastname='$last_name', email='$email', password='$password' WHERE id='$uid'";

    if ($conn->query($sql) === TRUE) {
        $msg = '<div class="success">User edited successfully</div>';
        echo "<script>setTimeout(() => { window.location.href='manage_users.php'; }, 500);</script>";
    } else {
        $msg = '<div class="alert">User edit failed: ' . $conn->error . '</div>';
    }
}
?>

        <!-- Edit User -->
        <div class="products">
            <h3 class="i-name">EDIT USER</h3>

            <?php
            if (isset($_REQUEST['view'])) {
                $sql = "SELECT * FROM users WHERE id={$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>

<form style="margin-top: 25px;" class="Add" action="" method="POST">
    <?php if (isset($msg)) {
        echo $msg;
    } ?>
    <div class="preference">
        <label for="uid">User ID:</label>
        <input placeholder="User ID" type="text" id="uid" name="uid" value="<?php if (isset($row['id'])) {
            echo $row['id'];
        } ?>" readonly>
    </div>
    <div class="preference">
        <label for="first_name">First Name:</label>
        <input placeholder="First Name" type="text" id="first_name" name="first_name" value="<?php if (isset($row['firstname'])) {
            echo $row['firstname'];
        } ?>">
    </div>
    <div class="preference">
        <label for="last_name">Last Name:</label>
        <input placeholder="Last Name" type="text" id="last_name" name="last_name" value="<?php if (isset($row['lastname'])) {
            echo $row['lastname'];
        } ?>">
    </div>
    <div class="preference">
        <label for="email">Email Address:</label>
        <input placeholder="Email Address" type="text" id="email" name="email" value="<?php if (isset($row['email'])) {
            echo $row['email'];
        } ?>">
    </div>
    <div class="preference">
        <input type="hidden" id="password" name="password" value="dummy_password">
    </div>
    <br><br>
    <div class="preference">
        <input type="submit" name="add" value="Update">
    </div>
</form>



        </div>
</body>

</html>