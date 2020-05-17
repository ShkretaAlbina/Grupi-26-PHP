<?php 
$page_title = "Update Product";
include_once "../header.php";
?>


<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
include_once '../../config/database.php';
include_once '../../models/product.php';
include_once '../../models/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
$category = new Category($db);
 
 $product->getProduct($id);
 
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
 
    if($product->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
 

    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $product->getName(); ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value='<?php echo $product->getPrice(); ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $product->getDescription(); ?></textarea></td>
        </tr>
 
        <tr>
            <td>Category</td>
            <td>
            <?php
                $stmt = $category->read();
 
            echo "<select class='form-control' name='category_id'>";
 
            echo "<option>Please select...</option>";
            while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                $category_id=$row_category['id'];
                $category_name = $row_category['name'];
 
                if($product->getCategoryId()==$category_id){
                echo "<option value='$category_id' selected>";
            }else{
                echo "<option value='$category_id'>";
             }
 
        echo "$category_name</option>";
    }
echo "</select>";
?>
            </td>
        </tr>
 
        <td>Photo</td>
            <td><input type="file" name="image" /><?php echo $product->getImage(); ?></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
        <tr>
      
 
    </table>
</form>
<?php
include_once "../footer.php";
?>