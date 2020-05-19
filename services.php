<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>App Magic</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
	<link rel="manifest" href="/site.manifest">
    <script src="scripts/script.js"></script>
    <script src="js/geolocation.js"></script>

</head>
<body>

<?php  include_once "header.php"?>

<div class="wrapper row2">
    <div id="container" class="clear">
        <section id="section" class="clear">
            <figure><img src="images/services.jpg" alt="">
                <figcaption>
                    <h2>What products do Apple sell?</h2>
                    <p>Its products and services include iPhone, iPad, Mac, iPod, Apple Watch, Apple TV, a portfolio of consumer and professional software
                        applications, iPhone OS (iOS), OS X and watchOS operating systems, iCloud, Apple Pay and a range of accessory, service and support offerings.   </figcaption>
            </figure>
        </section>
        <div id="homepage" class="last clear">
            <section class="grid_3">
                <h2 class="title">iPhone XR</h2>
                <img class="imgl" src="images/service-1.jpg" width="130" height="130" alt="">
                <p>Display: 6.1-inch LCD (1792 x 828) and size: 5.9 x 3.0 x 0.3 inches.</p>
            </section>
            <section class="grid_3">
                <h2 class="title">iPhone X</h2>
                <img class="imgl" src="images/service-2.jpg" width="130" height="130" alt="">
                <p>Size 5.8 inches, 84.4 cm2 (~82.9% screen-to-body ratio) with glass front, glass back, stainless steel frame.</p>
            </section>
            <section class="grid_3 lastbox">
                <h2 class="title">More products</h2>
                <img class="imgl" src="images/service-3.png" width="130" height="130" alt="">
                <p>Laptop, iPad, airPods, smartwatches, waterproof speakers...</p>
            </section>
        </div>
        <br><br>

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
