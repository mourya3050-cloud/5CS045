<?php
session_start();

// If already logged in, redirect to protected page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index1.php");
    exit();
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hard-coded credentials
    $username = "admin";
    $password = "password123";  // Change this to a strong password!

    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];

    if ($input_user === $username && $input_pass === $password) {
        $_SESSION['loggedin'] = true;
        header("Location: index1.php"); // redirect to protected page
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
