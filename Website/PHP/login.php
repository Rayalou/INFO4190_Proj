<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body class="full-background">
    <header>
        <a href="index.php" class="logo">
		<img src="Logo.png" alt="Site Logo" style="width: 200px; height: 170px;">
		</a>
		<nav class="navigation">
            <a href="home.php">Home</a>
            <a href="login_view.php">Login</a>
        </nav>
    </header>

<body>
    <div class="register-container">
        <h2>Login<h2>
         <form method="post" action="databasecon.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>