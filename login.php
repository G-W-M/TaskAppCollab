
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