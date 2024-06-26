<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website</title>
<link rel="stylesheet" href="stylesheet.css">
</head> 
<body>
<section class="main">
<nav>
<a href="index.php" class="logo">
<img src="Logo.png" alt="Site Logo" style="width: 200px; height: 170px;">
</a>

<ul> 
<li class="dropdown">
    <a href="feature.php" class="dropbtn">Features</a>
    <div class="dropdown-content">
         <div class="column">
        <a href="feature1.php">Feature 1</a>
        <a href="feature2.php">Feature 2</a>
      </div>
      <div class="column">
        <a href="feature3.php">Feature 3</a>
      </div>
    </div>
</li>
<li><a href="about.php" >About</a></li>
<li><a href="contact.php" >Contact Us</a></li>
<li class="dropdown">
    <a href="resources.php" class="dropbtn">Resources</a>
    <div class="dropdown-content">
        <a href="feature1.php">Social Engineering</a>
        <a href="feature2.php">Phishing</a>
        <a href="feature3.php">Spear Phishing</a>
		<a href="feature3.php">CEO Fraud</a>
		<a href="feature3.php">Ransomware</a>
		<a href="feature3.php">Multi-Factor Authentication</a>
    </div>
</li>
</ul>

</nav>
<div class="main-part">
    <p>Secure Academy site will help individuals protect themselves online.</p>
    <a class= "main-btn" href="register.php">Register Now</a> 
	<p>Have an account? <a class="login-link" href="login.php">Login Here</a></p>
    </div>
</section>

<section class="features">
    <div class="features-container"> 
        <div class="feature-box">
            <div class="f-img">
                <img src="phishing.png" alt="phishing">
            </div>
            <div class="f-text">
                <h4>Phishing</h4>
                <p>Secure Academy provides engaging training modules that cover a wide array of topics, including phishing, 
				ransomware, malware, and other cybersecurity threats.</p>
            </div>
            </div>
			
        </div>
</section>
</body>
</html>