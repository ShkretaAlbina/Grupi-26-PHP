<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>App Magic</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="scripts/script.js"></script>
    <script src="js/geolocation.js"></script>
    <script>src="js/llogaritsasine_handling.js"</script>
    <link rel="manifest" href="/site.manifest">

</head>
<body>

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
                <li><a href="products.html">Products</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
</div>
<div class="wrapper row2">
    <div id="container" class="clear">
        <div id="homepage" class="last clear">
            <section class="grid_3">
                <h2 class="title">Apple iPhone 11 Pro Max</h2>
                <img class="imgl" src="images/iphone-2.jpeg" width="130" height="130" alt="">
                <p>Dimensions:158 x 77.8 x 8.1 mm (6.22 x 3.06 x 0.32 in) and weight: 226 g (7.97 oz)</p>
            </section>
<br><br><br><br><br><br><br><br><br><br>
<a href="komentet.html" class="button" target="_blank" >SHENO KOMENT</a>

<p>Sheno numrin e sasise (5 te disponueshme): </p>

<input id="demo" type="text">
<button type="button" onclick="myFunction()">Porosit</button>
<p id="p01"></p>

<script>
function myFunction() {
  var message, x;
  message = document.getElementById("p01");
  message.innerHTML = "";
  x = document.getElementById("demo").value;
  try {
//try provon rastet e mundshme
    if(x == "") throw "zbrazeti";
    if(isNaN(x)) throw "duhet te jete NUMER";
    x = Number(x);
    if(x < 5) throw "Minimum 5 porosi";
    if(x > 10) throw "Maksimum 10 porosi";
  }
//shfaq errorin
  catch(err) {
    message.innerHTML = "Inputi: " + err;
  }
}

</script>
<?php 

    include_once "models/category.php";
    include_once "models/product.php";
    include_once "config/database.php";

    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    $category = new Category($db);
    
    $stmt = $product->read();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        
        ?>

        <section class="grid_3">
                <h2 class="title"><?php echo $name?></h2>
                <img class="imgl" src="images/iphone-3.jpeg" width="130" height="130" alt="">
                <p>Type: Liquid Retina IPS LCD capacitive touchscreen, 16M colors and size:	6.1 inches, 90.3 cm2 (~79.0% screen-to-body ratio)</p>
            </section>

<?php

    }


?>


           
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
