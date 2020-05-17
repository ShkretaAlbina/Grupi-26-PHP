<?php
class Product{
 
    private $conn;
    private $table_name = "products";
 
    private $id;
    private $name;
    private $price;
    private $description;
    private $category_id;
    private $timestamp;
    private $image;
 
    public function __construct($db){
        $this->conn = $db;
    }
 

    public function getId(){
        return $this->id;
    }

    public function setId($id){
         $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
         $this->name = $name;
    }
    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
         $this->price = $price;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
         $this->description = $description;
    }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function setCategoryId($categoryId){
         $this->category_id = $categoryId;
    }

    
    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
         $this->category_id = $image;
    }

    function create(){
 
        $query = "INSERT INTO " . $this->table_name . "
        SET name=:name, price=:price, description=:description,
        category_id=:category_id, image=:image, created=:created";

        $stmt = $this->conn->prepare($query);
 
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->timestamp = date('Y-m-d H:i:s');
 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);
        $stmt->bindParam(":image", $this->image);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    function readAll($from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, name, description, price, category_id, image
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
    

    function read(){
 
        $query = "SELECT
                    id, name, description, price, category_id, image
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name ASC
                ";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    
    public function countAll(){
 
        $query = "SELECT id FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
    return $num;
}

    public function getProduct($productId){

        $query = "SELECT
                    id, name, description, price, category_id, image
                        FROM
                    " . $this->table_name . "
                    where id = $productId";

             $stmt = $this->conn->prepare( $query );   
             $stmt->execute();

             $product = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->id = $product["id"];
                $this->name = $product["name"];
                $this->description = $product["description"];
                $this->price = $product["price"];
                $this->category_id = $product["category_id"];
                $this->image = $product["image"];
    
    }

    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    price = :price,
                    description = :description,
                    category_id  = :category_id,
                    image = :image
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->id=htmlspecialchars(strip_tags($this->id));     


        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);     
        $stmt->bindParam(':image', $this->image);

        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    public function delete($id){

        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id = $id";
        

        $stmt = $this->conn->prepare( $query );   
        $stmt->execute();

    }


    function uploadPhoto(){
 
        $result_message="";
     
        if($this->image){
     
            // sha1_file() function is used to make a unique file name
            $target_directory = "my-apple/uploads/";
            $target_file = $target_directory . $this->image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
     
            // error message is empty
            $file_upload_error_messages="";

            $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check==false){
            $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
        }
 
        // make sure certain file types are allowed
        $allowed_file_types=array("jpg", "jpeg", "png", "gif");
        if(!in_array($file_type, $allowed_file_types)){
            $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
        }
 
        // make sure submitted file is not too large, can't be larger than 2 MB
        if($_FILES['image']['size'] > (2048000)){
            $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
        }
 
// make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_directory)){
    mkdir($target_directory, 0777, true);
}

// if $file_upload_error_messages is still empty
if(empty($file_upload_error_messages)){
    // it means there are no errors, so try to upload the file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // it means photo was uploaded
    }else{
        $result_message.="<div class='alert alert-danger'>";
            $result_message.="<div>Unable to upload photo.</div>";
            $result_message.="<div>Update the record to upload photo.</div>";
        $result_message.="</div>";
    }
}
 
// if $file_upload_error_messages is NOT empty
else{
    // it means there are some errors, so show them to user
    $result_message.="<div class='alert alert-danger'>";
        $result_message.="{$file_upload_error_messages}";
        $result_message.="<div>Update the record to upload photo.</div>";
    $result_message.="</div>";
}

     
        }
     
        return $result_message;
    }


function readOne(){
 
    $query = "SELECT name, price, description, category_id, image
        FROM " . $this->table_name . "
        WHERE id = ?
        LIMIT 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->category_id = $row['category_id'];
    $this->image = $row['image'];
}


}
?>