<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    if ($username === 'user' && $password === 'pass') {
        // Redirect to Admin 2.php on successful login
        header('Location: Admin 2.php');
        exit;
    } else {
        // Redirect back to the login page if login fails and display an error message
        $error = "Passwords do not match";
        echo "<script type='text/javascript'>alert('$error');</script>";
        header('Location: Admin wup.php');
        exit;
    }
}
?>
