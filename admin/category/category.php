<?php
$page_title = "Categories";
$page_name = "category";


$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once '../../config/database.php';
include_once '../../models/category.php';


$database = new Database();
$db = $database->getConnection();

$category = new Category($db);

$stmt = $category->getForRange($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once "../header.php";

echo "<div class='right-button-margin'>
    <a href='create_category.php' class='btn btn-default pull-right'>Create Category</a>
</div>";

if ($num > 0) {

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>Category</th>";
    echo "<td>Actions</td>";

    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
       
        echo "<td>";
        //  edit and delete buttons
        echo "
              <a href='update_category.php?id={$id}' class='btn btn-info left-margin'>
                <span class='glyphicon glyphicon-edit'></span> Edit
              </a>
                <a delete-id='{$id}' type='category' class='btn btn-danger delete-object'>
                <span class='glyphicon glyphicon-remove'></span> Delete
            </a>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

$page_url = "category.php?";
 
$total_rows = $category->countAll();
 
include_once '../paging.php';}

else {
    echo "<div class='alert alert-info'>No products found.</div>";
}


include_once "../footer.php";
