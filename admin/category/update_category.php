
<?php 
$page_title = "Update Category";
include_once "../header.php";
?>


<?php
    
    $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');   

include_once '../../config/database.php';
include_once '../../models/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$category = new Category($db);
  
$category->getCategory($id);
 
?>

<?php 
if($_POST){
 
    $category->setName($_POST['name']);
    
    if($category->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Category was updated.";
        echo "</div>";
    }
 
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update category.";
        echo "</div>";
    }
}

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $category->getName(); ?>' class='form-control' /></td>
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