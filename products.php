<?php 

include_once "models/category.php";
include_once "models/product.php";
include_once "config/database.php";

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$stmt = null;


if(isset($_POST['search'])){
    $keyword = $_POST['search'];
    $keyword = preg_replace('#[^0-9a-z ]#i','',$keyword);

    $stmt = $product->search($keyword);
}else{
    $stmt = $product->read();
}

?>


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

<?php  include_once "header.php"?>

    <div id="container" class="clear">
       
<p>Search for products: </p>

<form action="products.php" method="post"> 
<input name="search" type="text", placeholder="Search for products...">
    <input type="submit" value="Search"/>
</form>

<div style="height: 10px"></div>

<?php 
 
    if($stmt->rowCount() == 0){
        echo "No Result";
    }else{

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = new Category($db);
    
            extract($row);
            
            ?>
    
            <section class="grid_3">
                    <h2 class="title"><?php echo $name?></h2>
                    <img class="imgl" src="uploads/<?php echo $image?>" width="130" height="130" alt="">
                    <p>Category: <?php $category->getCategory($category_id); echo $category->getName()?></p>
                    <p>Price: <?php echo $price?>$</p>
                    <p>Description: <?php echo $description?></p>
                </section>
    
    <?php
    
        }
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
