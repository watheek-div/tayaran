<?php
    session_start();
    require_once 'connection.php'; // Include the connection file
    //check login
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Check if the username and password are correct
        $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            header("Location: dashboard.php");
            exit();
        } else {
   
            $_SESSION['login_error'] = true;
            header("Location: log-in.php");
            exit();
        }
    }
?>