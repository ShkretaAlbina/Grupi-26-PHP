<?php
// include database and object files
include_once '../../config/database.php';
include_once '../../models/product.php';
include_once '../../models/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$product = new Product($db);
$category = new Category($db);


// set page headers
$page_title = "Create Product";
include_once "../header.php";

echo "<div class='right-button-margin'>";
echo "<a href='product.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";

?>

<?php 
if($_POST){

    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setDescription( $_POST['description']);
    $product->setCategoryId($_POST['category_id']);

    $image=!empty($_FILES["image"]["name"])
    ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    
    $product->setImage($image);

    if($product->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";        
        echo $product->uploadPhoto();
    } 
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <?php
                $stmt = $category->read();

                echo "<select class='form-control' name='category_id'>";
                echo "<option>Select category...</option>";

                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_category);
                    echo "<option value='{$id}'>{$id}. {$name}</option>";
                }

                echo "</select>";
                ?> </td>
        </tr>

        <tr>
        <td>Photo</td>
            <td><input type="file" name="image" /></td>
        </tr>


        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

        

    </table>
    
</form>

<?php

// footer
include_once "../footer.php";
?>