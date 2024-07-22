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
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-part">
            <p>Secure Academy site will help individuals protect themselves online.</p>
            <a class="main-btn" href="register.php">Register Now</a> 
            <p>Have an account? <a class="login-link" href="login.php">Login Here</a></p>
        </div>
    </section>
	
    <section class="features">
		<h1>The Only Platform That Truly Addresses the Human Element of Cybersecurity</h1>
        <div class="features-container">
            <div class="feature-box" data-image="training-module.png">
                <div class="f-text">
                    <h4>Comprehensive Training Modules</h4>
                    <p>Secure Academy offers engaging training modules that cover a wide array of cybersecurity topics, including phishing,
                    ransomware, malware, and other online threats. Each module is designed to educate and equip users with the knowledge needed
                    to protect themselves and their organizations from cyber attacks. </p>
                </div>
            </div>
            <div class="feature-box" data-image="notification.png">
                <div class="f-text">
                    <h4>Regular Updates and Alerts </h4>
                    <p>Stay ahead of emerging threats with regular updates and alerts. The site provides timely information on new vulnerabilities, 
					security patches, and threat intelligence, helping users to keep their defenses up to date. </p>
                </div>
            </div>
            <div class="feature-box" data-image="malware.png">
                <div class="f-text">
                    <h4>Interactive Learning Experience </h4>
                    <p>The training modules are not only informative but also interactive. Users can engage with quizzes, and real-world
					scenarios to test their understanding and apply what they've learned in a practical context</p>
                </div>
            </div>
			<div class="feature-box" data-image="malware.png">
                <div class="f-text">
                    <h4>Resources for All Levels</h4>
                    <p>Whether you're a beginner looking to understand the basics of cybersecurity or an advanced user seeking to enhance your 
					knowledge, the site provides resources tailored to all skills levels. This includes detailed guides, best practices, and up-to-date 
					information on the latest cyber threats. </p>
                </div>
            </div>
        </div>
        <div class="image-container">
			<img src="training-module.png" alt="feature" class="feature-image">
        </div>
    </section>
	
	<!-- New Section for Rectangular Box -->
<section class="info-box">
    <div class="box-content">
        <p>Over 65,000 organizations rely on KnowBe4 so employees remain vigilant of social engineering.</p>
		<p>50 million plus users everyday engage with the KnowBe4 platform to stay protected from bad actors.</p>
		<p>17 million email messages quarantined as malicious by PhishER Plus</p>
    </div>
</section>

<!-- New Section for Reviews -->
<section class="reviews">
    <div class="reviews-container">
        <h2>User Reviews</h2>
        <div class="reviews-content">
            <div id="review1" class="review-content active">
                <p>"The training modules are extremely informative and engaging. I've learned so much about cybersecurity!" - John Doe</p>
            </div>
            <div id="review2" class="review-content">
                <p>"The regular updates and alerts keep me informed about the latest threats. A must-have for any organization." - Jane Smith</p>
            </div>
            <div id="review3" class="review-content">
                <p>"I appreciate the interactive learning experience. It really helps to understand and apply the concepts in real-world scenarios." - Alex Johnson</p>
            </div>
            <!-- Add more reviews as needed -->
        </div>
        <div class="dots-container">
            <span class="dot active" onclick="currentReview(1)"></span>
            <span class="dot" onclick="currentReview(2)"></span>
            <span class="dot" onclick="currentReview(3)"></span>
            <!-- Add more dots as needed -->
        </div>
    </div>
</section>


    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Secure Academy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.feature-box').forEach(box => {
            box.addEventListener('mouseover', function() {
                const imageContainer = document.querySelector('.image-container img');
                imageContainer.src = this.getAttribute('data-image');
            });
        });
		
		let currentIndex = 1;

function showReview(index) {
    const reviews = document.querySelectorAll('.review-content');
    const dots = document.querySelectorAll('.dot');

    reviews.forEach((review, i) => {
        review.classList.remove('active');
        dots[i].classList.remove('active');
    });

    reviews[index - 1].classList.add('active');
    dots[index - 1].classList.add('active');
}

function currentReview(index) {
    showReview(index);
}

// Initialize with the first review
showReview(currentIndex);
    </script>
	
</body>
</html>
