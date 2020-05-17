<?php
// include database and object files
include_once '../../config/database.php';
include_once '../../models/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$category = new Category($db);


// set page headers
$page_title = "Create Category";
include_once "../header.php";

echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>View Categories</a>";
echo "</div>";

?>

<?php 
if($_POST){

    $category->setName($_POST['name']);

    if($category->create()){
        echo "<div class='alert alert-success'>Category was created.</div>";        
    } 
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
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

include_once "../footer.php";
?>