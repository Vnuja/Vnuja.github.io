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
                <a href="manage_users.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="addUser.php">
                    <i class='bx bx-user-plus'></i>
                    <span class="links_name">Add User</span>
                 </a>
            </li>
            <li>
                <a href="editUser.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Edit Users</span>
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


<!-- Manage Users -->
<div class="products">
<h3 class="i-name">Manage Users</h3>
<?php
include_once("Db.php");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="scrolldown">
        <thead class="thead">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>';
    echo '
        <form action="editUser.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value=' . $row["id"] . '>
            <button type="submit" class="btn-info" name="view" value="View">EDIT</button>
        </form>
        <form action="" method="POST" class="d-inline" onsubmit="return confirmDelete();">
            <input type="hidden" name="id" value=' . $row["id"] . '>
            <button type="submit" class="btn-secondary" name="delete" value="Delete">
                DELETE
            </button>
        </form>
    </td>
</tr>';
} ?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

        </tbody>
    </table>
<?php
} else {
    echo "<p class='text-dark p-2 fw-bolder'>User Not Found. </p>";
}

if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM users WHERE id={$_REQUEST['id']}";
    if ($conn->query($sql) === TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "Delete Failed";
    }
}
?>

            </table>
            

<br><br>
            
                
        </div>

</body>

</html>