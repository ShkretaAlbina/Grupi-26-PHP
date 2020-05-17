<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>App Magic</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/style.css" type="text/css">
<link rel="manifest" href="/site.manifest">
    <script src="js/scripts.js"></script>
<script src="js/geolocation.js"></script>
<script src="js/bgcolor.js"></script>
<script src="js/handling.js"></script>
</head>
<body style="text-align:center;">
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="index.html">App Magic</a></h1>
    </div>
    <form action="#" method="post">
      <fieldset>
        <legend>Search:</legend>
        <input type="text" value="Enter a search term" onFocus="this.value=(this.value=='Enter a search term')? '' : this.value ;">
        <input type="submit" id="sf_submit" value="submit">
      </fieldset>
    </form>
    <nav>
      <ul>
        <li><a href="about-us.html">About Us</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="login.php">Login</a></li>

      </ul>
    </nav>
  </header>
</div>
<div id="div1" class="wrapper row2">
  <div id="container" class="clear">
    <section id="section" class="clear">
      <figure><img src="images/iPhone6s_Family_630x300heading.jpg" alt="">
        <figcaption>
          <h2>The newest iPhone</h2>
          <p>Apple will reportedly release five new iPhones in 2020, according to a report from Ming Chi Kuo. Kuo predicts a 4.7-inch iPhone SE 2 will debut in the first half of next year, and four iPhone 12 models with 5G will launch next fall.</p>
         <p> <a href="#"><img src="images/appstore.png"></a></p>
        </figcaption>
      </figure>
    </section>
    <div id="homepage" class="last clear">
      <section class="grid_3">
        <h2 class="title">iPhone XR</h2>
        <img class="imgl radius" src="images/service-1.jpg" width="130" height="130" alt="">
        <p>Display: 6.1-inch LCD (1792 x 828) and size: 5.9 x 3.0 x 0.3 inches.</p>
      </section>
      <section class="grid_3">
        <h2 class="title">iPhone X</h2>
        <img class="imgl radius" src="images/service-2.jpg" width="130" height="130" alt="">
        <p>Size	5.8 inches, 84.4 cm2 (~82.9% screen-to-body ratio) with glass front, glass back, stainless steel frame </p>
      </section>
      <section class="grid_3 lastbox">
        <h2 class="title">More products</h2>
        <img class="imgl radius" src="images/service-3.png" width="130" height="130" alt="">
        <p>Laptop, iPad, airPods, smartwatches, waterproof speakers...</p>
      </section>
    </div>
<br><br>
    <div id="homepage" class="last clear">
      <section class="grid_2">
        <h2 class="title">From The Blog</h2>
        <article>
          <header>
            <h2 class="red">Apple online store</h2>
          </header>
          <p>Apple online store is a convenient place to purchase Apple products and accessories from Apple and other manufacturers.</p>
        </article>
        <article>
          <header>
            <h2 class="red">Apple Retail Stores</h2>
          </header>
            <p>Experience the digital lifestyle at any of the Apple Retail Stores around the country. Find store hours and contact information for all locations.</p>
        </article>
      </section>
      <section class="grid_1">
        <h2 class="title">Our Details</h2>
        <p>Apple Online Store<br>
        Prishtine, Kosove</br>
        Bregu i Diellit<br>
        PostCode, 10000</p>
        <p>Tel: <br>
        00010 4569000113</p>
        <p>Fax: <br>
        00020 1092848109</p>
        <p>E-mail: <br>
         appleonline@gmail.com</p>
      </section>
      <section class="grid_1 lastbox">
        <h2 class="title">About US</h2>
        <p>Taking a family portrait. Catching up over FaceTime. Raising the blinds to let in the morning light. We want everyone to enjoy the everyday moments that technology helps make possible, so we work to make every Apple product accessible from the very start. Because the true value of a device isn’t measured by how powerful it is, but by how much it empowers you.</p>
        <footer class="more"><a href="about-us.html">Read More &raquo;</a></footer>
      </section>
    </div>
  </div>
</div>
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <div id="result">
    </div>
    <button style="float: right" type="button" onclick="showPosition();">Show Position</button>
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
  </footer>
</div>
</body>
</html>
