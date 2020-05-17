<?php
if($_POST){
 
    include_once '../../config/database.php';
    include_once '../../models/product.php';
 
    $database = new Database();
    $db = $database->getConnection();
 
    $product = new Product($db);
          
    if($product->delete($_POST['object_id'])){
        echo "Object was deleted.";
    }
     
    else{
        echo "Unable to delete object.";
    }
}
?>