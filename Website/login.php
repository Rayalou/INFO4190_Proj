<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

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