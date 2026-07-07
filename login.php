 <?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];   
            $_SESSION['name'] = $user['name'];   
            $_SESSION['email'] = $user['email'];

            $_SESSION['loggedin'] = true;

            $success = true;

        } else {
            $error = "❌ Wrong Password!";
        }

    } else {
        $error = "❌ Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h2>Login 🔐</h2>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password" required>
    </div>

    <button name="login">Login</button>

</form><br>

<p>New user? 
        <a style="color: #3600fb;" href="register.php">Register</a>
    </p>

</div>

<?php if(isset($success) && $success) { ?>
<div class="popup-overlay">
    <div class="popup-box">
        <h3>✅ Login Successful</h3>
        <p>Welcome back!</p>
    </div>
</div>

<script>
setTimeout(() => {
    window.location.href = "dashboard.php";
}, 1000);
</script>
<?php } ?>

</body>
</html>