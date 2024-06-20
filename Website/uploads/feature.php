<html>
<head> 
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
<li><a href="index.php" class="active">Home</a></li>
<li class="dropdown">
    <a href="feature.php" class="dropbtn">Features</a>
    <div class="dropdown-content">
        <a href="feature1.php">Feature 1</a>
        <a href="feature2.php">Feature 2</a>
        <a href="feature3.php">Feature 3</a>
    </div>
</li>
<li><a href="about.php" >About</a></li>
<li><a href="contact.php" >Contact Us</a></li>
<li><a href="resources.php" >Resources</a></li>
</ul>

</nav>
<div class="main-part">
    <h1>Secure Academy</h1>
    <p>This site will help individuals protect themselves online</p>
    <a class= "main-btn" href="features.php">Start Now</a> 
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
                <p>Learn how you can protect yourself from Phishing.</p>
                <a href="#" class="main-btn"> Check</a> 
            </div>
        </div>
		
		<div class="feature-box">
			<div class="f-img">
				<img src="security.jpg" alt="security" style= "width: 100%; height: 100%;">
			</div>
			<div class="f-text">
				<h4>Website privacy</h4>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
				<a href="#" class="main-btn"> Check</a> 
			</div>
		</div>
        
        
    </div>
</section>
</body>
</html>
