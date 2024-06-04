<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body class="full-background">
    <header>
        <h2 class="logo">Chic & Antique Furnishings</h2>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="login_view.php">Login</a>
        </nav>
    </header>
    <div class="login-container">
        <form method="post" action="databasecon.php">
            <h2> Register now</h2>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

			<label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
			
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>

            <button type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
</body>
</html>