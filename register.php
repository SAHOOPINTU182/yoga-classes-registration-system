<?php
include 'db.php';

$success = false;

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = strtolower(trim($_POST['email']));
    $contact = trim($_POST['contact']);
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // Password hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check email (secure)
    $stmt = $con->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $error = "❌ Email already exists!";
    } else {

        // Insert data (secure)
        $stmt = $con->prepare("INSERT INTO users(name,email,contact,gender,password) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $name, $email, $contact, $gender, $hashed_password);

        if($stmt->execute()){
            $success = true;
        } else {
            $error = "❌ Registration failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h2>Register 🧘</h2>

    <!-- ERROR MESSAGE (ONLY ONCE) -->
    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
            <label>Contact</label>
            <input type="tel" name="contact" placeholder="Enter Contact" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div> 

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>
        </div>

        <button name="register">Register</button>

    </form>

    <br>

    <p>Already have account? 
        <a style="color: #3600fb;" href="login.php">Login</a>
    </p>

</div>

<!-- SUCCESS POPUP -->
<?php if($success) { ?>
<div class="popup-overlay">
    <div class="popup-box">
        <h3>✅ Registration Successful</h3>
        <p>Your account has been created!</p>
        <a href="login.php" class="popup-btn">Go to Login</a>
    </div>
</div>

<script>
setTimeout(() => {
    window.location.href = "login.php";
}, 3000);
</script>
<?php } ?>

</body>
</html>