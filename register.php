<?php

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
