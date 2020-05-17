<?php
if($_POST){
 
    include_once '../../config/database.php';
    include_once '../../models/category.php';
 
    $database = new Database();
    $db = $database->getConnection();
 
    $category = new Category($db);
          
    if($category->delete($_POST['object_id'])){
        echo "Object was deleted.";
    }
     
    else{
        echo "Unable to delete object.";
    }
}
?>