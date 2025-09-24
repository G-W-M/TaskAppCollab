<?php
 require 'db_connect.php';
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=$_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password !== $confirm_password) {
        echo "Passwords don't match.";
        exit; 
 }
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);
if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
 }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>User Registration Form </h2>
    <form method="POST" action="register.php">
        <label>Username:<br>
            <input type="text" name="username" required>
        </label><br><br>

        <label>Email:<br>
            <input type="email" name="email" required>
        </label><br><br>

        <label>Password:<br>
            <input type="password" name="password" required>
        </label><br><br>

        <label>Confirm Password:<br>
            <input type="password" name="confirm_password" required>
        </label><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
