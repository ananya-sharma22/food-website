<?php
 include 'contact.php';
include 'reservation.php';
// include 'orderHandler.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee website</title>
  <!--Linking Font Awesome for Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!--Header / Navbar-->
  <header>
    <nav class="navbar section-content">
      <a href="#" class="nav-logo">
        <h2 class="logo-text">☕BALMEYONG Cafe</h2>
      </a>
      <ul class="nav-menu">
        <button id="menu-close-button" class="fas fa-times"></button>
        <li class="nav-item">
          <a href="#" class="nav-link">HOME</a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link">ABOUT</a>
        </li>
        <li class="nav-item">
          <a href="#gallery" class="nav-link">GALLERY</a>
        </li>
        <li class="nav-item">
          <a href="#menu" class="nav-link">MENU</a>
        </li>
        <li class="nav-item">
          <a href="#reservation" class="nav-link">RESERVATION</a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link">CONTACT US</a>
        </li>
      </ul>
      <button id="menu-open-button" class="fas fa-bars"></button>
    </nav>
  </header>

  <main>
    <!--Hero Section-->
    <section class="hero-section">
      <div class="section-content">
        <div class="hero-details">
          <h2 class="title"> BEST COFFEE & BROWNIE </h2>
          <h3 class="subtitle"> Make your day special with our special Coffee and Brownies.</h3>
          <p class="description"> Welcome to our coffee paradise, where every bean tells a story and every cup sparks joy.
            Feeling Downie Eat a Brownie.
          </p>

          <div class="buttons">
            <button class="button order-now" onclick="document.location='addToCart.php'">Order-Now</button>
            <button class="button contact-us" onclick="document.location='#contact'">Contact-Us</button>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
      <div class="section-content">
        <div class="about-image-wrapper">
          <img src="coffee.jpg">
        </div>
        <div class="about-details">
          <h2 class="section-title">About Us</h2>
          <p class="text"> At Coffee House in Hamirpur, Himachal Pradesh, we pride ourselves on
            being a go-to destination for Coffee and Chocolate Brownie lovers and conversation seekers a like.
            We are dedicated to providing an exceptional Coffee experience in a cozy and inviting atmosphere,
            where guests can relax, unwind, and enjoy their time in comfort.
          </p>
          <p class="text"> The Delightful Duet, a Sun-Kissed Sky and a Freshly Brewed Coffee and
            Chocolatr Brownies.
          </p>
          <div class="social-link-list">
            <a href="https://www.facebook.com/" class="social-link"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/" class="social-link"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.twitter.com/" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
      <h2 class="section-title"> Gallery </h2>
      <div class="section-content">
        <ul class="gallery-list">
          <li class="gallery-item"><img src="image1.jpg"></li>
          <li class="gallery-item"><img src="image2.jpg"></li>
          <li class="gallery-item"><img src="image3.jpg"></li>
          <li class="gallery-item"><img src="image4.jpg"></li>
          <li class="gallery-item"><img src="image5.webp"></li>
          <li class="gallery-item"><img src="image6.jpg"></li>
          <li class="gallery-item"><img src="image8.jpg"></li>
          <li class="gallery-item"><img src="image7.jpg"></li>
          <li class="gallery-item"><img src="image9.png"></li>
        </ul>
      </div>
    </section>

    <!-- Menu Section-->
    <section class="menu-section" id="menu">
      <h2 class="section-title"> Our Menu </h2>
      <header1>
        <h1><u>Beverages</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="cold coffee.webp">
          <h3>Cold Coffee</h3>
          <p>Price:120</p>
        </div>
        <div class="menu-item">
          <img src="soft drinks.jpg">
          <h3>Soft Drinks </h3>
          <p>Fruit Juice and Cold drinks.</p>
          <p>Price:100</p>
        </div>
        <div class="menu-item">
          <img src="cappuccino.webp">
          <h3>Cappuccino</h3>
          <p>Price:160</p>
        </div>
        <div class="menu-item">
          <img src="espresso.webp">
          <h3>Espresso </h3>
          <p>price:150</p>
        </div>
        <div class="menu-item">
          <img src="shakes.webp">
          <h3>Shakes</h3>
          <p>Fruit shakes & Milk shakes.</p>
          <p>Price:100</p>
        </div>
        <div class="menu-item">
          <img src="latte.jpg">
          <h3>Latte and Americano</h3>
          <p>Price:200</p>
        </div>
      </div>
      <header1>
        <h1><u>Fries & Snacks</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="fries.webp">
          <h3>French Fries</h3>
          <p>Price:100</p>
        </div>
        <div class="menu-item">
          <img src="peri fries.jpg">
          <h3>Peri-Peri Fries</h3>
          <p>Price:130</p>
        </div>
        <div class="menu-item">
          <img src="honey cauliflower.jpg">
          <h3>Honey-Chilly Cauliflower</h3>
          <p>Price:150</p>
        </div>
        <div class="menu-item">
          <img src="honeypotato.jpg">
          <h3>Honey-Chilly Potato</h3>
          <p>Price:150</p>
        </div>
        <div class="menu-item">
          <img src="paneer tikka.jpg">
          <h3>Paneer Tikka</h3>
          <p>Price:160</p>
        </div>
        <div class="menu-item">
          <img src="mashroom tikka.jpg">
          <h3>Mashroom Tikka</h3>
          <p>Price:160</p>
        </div>
      </div>
      <header1>
        <h1><u>Pizza & Pasta</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="corn pizza.webp">
          <h3>Corn Cheese Pizza</h3>
          <p>Price:100</p>
        </div>
        <div class="menu-item">
          <img src="veggie paradise.jpg">
          <h3>Veggie Paradise</h3>
          <p>Price:140</p>
        </div>
        <div class="menu-item">
          <img src="loaded farmhouse.jpg">
          <h3>Loaded Farmhouse</h3>
          <p>Price:160</p>
        </div>
        <div class="menu-item">
          <img src="red-sauce.jpg">
          <h3>Red-Sauce Pasta</h3>
          <p>Price:120</p>
        </div>
        <div class="menu-item">
          <img src="white-sauce.jpg">
          <h3>White-Sauce Pasta</h3>
          <p>price:130</p>
        </div>
        <div class="menu-item">
          <img src="spaghetti pasta.jpg">
          <h3>Spaghetti Pasta</h3>
          <p>price:150</p>
        </div>
      </div>
      <header1>
        <h1><u>Roti & Rice</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="naan.jpg">
          <h3>Butter Naan</h3>
          <p>Quantity:5</p>
          <p>Price:50</p>
        </div>
        <div class="menu-item">
          <img src="tandoori roti.jpg">
          <h3>Tandoori Roti</h3>
          <P>Quantity:5</P>
          <p>Price:60</p>
        </div>
        <div class="menu-item">
          <img src="jeera rice.jpg">
          <h3>Jeera Rice</h3>
          <p>Price:120</p>
        </div>
        <div class="menu-item">
          <img src="fried rice.jpg">
          <h3>Fried Rice</h3>
          <p>Price:150</p>
        </div>
        <div class="menu-item">
          <img src="veg biryani.jpg">
          <h3>Veg Biryani</h3>
          <p>price:180</p>
        </div>
        <div class="menu-item">
          <img src="schezwan rice.jpg">
          <h3>Schezwan Fried Rice</h3>
          <p>price:160</p>
        </div>
      </div>
      <header1>
        <h1><u>Main Course</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="mashroom masala.jpg">
          <h3>Butter Masroom Masala</h3>
          <p>Price:130</p>
        </div>
        <div class="menu-item">
          <img src="paneer masala.jpg">
          <h3>Paneer Butter Masala</h3>
          <p>Price:160</p>
        </div>
        <div class="menu-item">
          <img src="kadai paneer.jpg">
          <h3>Kadai Paneer</h3>
          <p>Price:140</p>
        </div>
        <div class="menu-item">
          <img src="shahi paneer.webp">
          <h3>Shahi Paneer</h3>
          <p>Price:150</p>
        </div>
        <div class="menu-item">
          <img src="manchurian.jpg">
          <h3>Manchurian</h3>
          <p>price:120</p>
        </div>
        <div class="menu-item">
          <img src="dal.jpg">
          <h3>Dal Tadka</h3>
          <p>price:100</p>
        </div>
      </div>
      <header1>
        <h1><u>Deserts</u></h1>
      </header1>
      <div class="menu" id="menu">
        <div class="menu-item">
          <img src="ice-creams.jpg">
          <h3>Ice-Creams</h3>
          <p>All Flavours</p>
          <p>Price:120</p>
        </div>
        <div class="menu-item">
          <img src="image9.png">
          <h3>Chocolate Brownie</h3>
          <p>Price:150</p>
        </div>
        <div class="menu-item">
          <img src="pudding.jpg">
          <h3>Puddings</h3>
          <P>All Flavours</P>
          <p>Price:140</p>
        </div>
        <div class="menu-item">
          <img src="image8.jpg">
          <h3>Brownie with Ice-cream</h3>
          <p>Price:170</p>
        </div>
        <div class="menu-item">
          <img src="pasteries.jpg">
          <h3>Pastries</h3>
          <P>All Flavour</P>
          <p>price:120</p>
        </div>
        <div class="menu-item">
          <img src="custard.jpg">
          <h3>Custards</h3>
          <p>price:150</p>
        </div>
      </div>
    </section>

    <!-- Reservation Section -->
    <section class="reservation-section" id="reservation">
      <h2 class="section-title">Cafe Reservation Form</h2>
      <div class="section-content">
        <form action="#" method="post">
          <label for="name">Full Name:</label>
          <input type="text" id="name" name="name" class="input-Form" required>

          <label for="phone">Phone Number:</label>
          <input type="text" id="phone" name="phone" class="input-Form" required>

          <label for="date">Reservation Date:</label>
          <input type="date" id="date" name="date" class="input-Form" required>

          <label for="time">Reservation Time:</label>
          <input type="time" id="time" name="time" class="input-Form" required>

          <label for="guests">Number of Guests:</label>
          <select id="guests" name="guests" required class="input-Form">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
          <button type="submit" class="input-Form" >Submit Reservation</button>
        </form>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
      <h2 class="section-title">Contact Us</h2>
      <div class="section-content">
        <ul class="contact-info-list">
          <li class="contact-info">
            <i class="fa-solid fa-location-crosshairs"></i>
            <p>Shop no. 2219, Hamirpur main market near Gandhi Chownk, (Hamirpur) Himachal Pradesh.</p>
          </li>
          <li class="contact-info">
            <i class="fa-regular fa-envelope"></i>
            <p>anniesharma22007@gmail.com</p>
          </li>
          <li class="contact-info">
            <i class="fa-solid fa-phone"></i>
            <p>+91 7814495920</p>
          </li>
          <li class="contact-info">
            <i class="fa-regular fa-clock"></i>
            <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
          </li>
          <li class="contact-info">
            <i class="fa-regular fa-clock"></i>
            <p>Saturday: 10:00 AM - 3:00 PM</p>
          </li>
          <li class="contact-info">
            <i class="fa-regular fa-clock"></i>
            <p>Sunday: Closed</p>
          </li>
        </ul>
        <form action="#" method="POST" class="contact-form">
          <input type="text" name="name" placeholder="Name" class="form-input" required>
          <input type="email" name="email" placeholder="Email" class="form-input" required>
          <textarea name="message" placeholder="Message" class="form-input" required></textarea>
          <button type="submit" class="submit-button">Submit</button>
        </form>
      </div>
</section>


    <!-- Footer section -->
    <footer class="footer-section">
      <div class="section-content">
        <p class="copyright-text">©BALMEYONG Cafe </p>
        <div class="social-link-list">
          <a href="https://www.facebook.com/" class="social-link"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/" class="social-link"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.twitter.com/" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="https://www.gmail.com/" class="social-link"><i class="fa-regular fa-envelope"></i></a>
          <a href="#" class="social-link"><i class="fa-solid fa-phone"></i></a>
        </div>
        <p class="policy-text">
          <a href="#" class="policy-link">Privacy policy</a>
          <span class="separator">•</span>
          <a href="#" class="policy-link">Refund policy</a>
        </p>
      </div>
    </footer>
  </main>
  <script src="script.js"></script>
</body>
</html>