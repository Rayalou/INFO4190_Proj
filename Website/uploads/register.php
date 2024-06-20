<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body class="full-background">
    <header>
        <a href="index.php" class="logo">
            <img src="Logo.png" alt="Site Logo" style="width: 200px; height: 170px;">
        </a>
    </header>
    <div class="login-container">
        <form method="post" action="databasecon.php">
            <h2>Defend Against Cyber Attacks: Register Now</h2>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>

            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
