<?php
require 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_input = $_POST['user_input'];
    $password = $_POST['password'];

    $sql  = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $user_input, $user_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['username'];
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>User Login Form</h2>
    <form method="POST" action="login.php">
        <label>Email or Username:<br>
            <input type="text" name="user_input" required>
        </label><br><br>

        <label>Password:<br>
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>