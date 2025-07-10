<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public-style.css">
    <link rel="stylesheet" href="log-in.css">
    <title>تسجيل الدخول</title>
</head>
<body>
<?php
    session_start();
    require_once 'connection.php';
    //check login
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Check if the username and password are correct
        $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
        $result = mysqli_query($con, $query);
        
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
    <div class="log-in-container">
        <h1>تسجيل الدخول</h1>
        <form action="log-in.php" method="POST">
            <div class="input-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
                
            </div>
            <button type="submit">تسجيل الدخول</button>
        </form>
    </div>

    <div class="message-container" id="message-container">
        <div class="message">
            <img src="Assets\Icons\icons8_cancel_96px.png" alt="">
            <p>اسم المستخدم أو كلمة المرور غير صحيحة</p>
            <a href="log-in.php">حاول مرة أخرى</a>
        </div>
    </div>

    <script>
        <?php if(isset($_SESSION['login_error'])): ?>
            console.log("Login error: Invalid username or password.");
            <?php unset($_SESSION['login_error']);?>
        <?php endif; ?>
    </script>
</body>
</html>