<?php

class Product
{

    private $conn;
    private $table_name = "products";

    private $id;
    private $name;
    private $price;
    private $description;
    private $category_id;
    private $timestamp;
    private $image;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    function create()
    {

        $query = "INSERT INTO " . $this->table_name . "
        SET name=:name, price=:price, description=:description,
        category_id=:category_id, image=:image, created=:created";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->timestamp = date('Y-m-d H:i:s');

        //Binding parameters prevent sql injections.
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);
        $stmt->bindParam(":image", $this->image);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }

    function readAll($from_record_num, $records_per_page)
    {

        $query = "SELECT
                    id, name, description, price, category_id, image
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    function read()
    {

        $query = "SELECT
                    id, name, description, price, category_id, image
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name ASC
                ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    function search($searchQ)
    {
        $query = "SELECT
                    id, name, description, price, category_id, image
                FROM
                    " . $this->table_name . "
                Where name LIKE '%$searchQ%'
                OR description LIKE '%$searchQ%'
                ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function countAll()
    {

        $query = "SELECT id FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

    public function getProduct($productId)
    {

        $query = "SELECT
                    id, name, description, price, category_id, image
                        FROM
                    " . $this->table_name . "
                    where id = $productId";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $product["id"];
        $this->name = $product["name"];
        $this->description = $product["description"];
        $this->price = $product["price"];
        $this->category_id = $product["category_id"];
        $this->image = $product["image"];

    }

    function update()
    {

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

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));


        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':image', $this->image);

        if ($stmt->execute()) {
            return true;
        }

        return false;

    }


    public function delete($id)
    {

        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id = $id";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }


    function uploadPhoto()
    {

        $result_message = "";

        if ($this->image) {

            $target_directory = "../../uploads/";
            $target_file = $target_directory . $this->image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            $file_upload_error_messages = "";

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check == false) {
                $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
            }

            $allowed_file_types = array("jpg", "jpeg", "png", "gif");
            if (!in_array($file_type, $allowed_file_types)) {
                $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            if ($_FILES['image']['size'] > (2048000)) {
                $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
            }

            if (!is_dir($target_directory)) {
                mkdir($target_directory, 0777, true);
            }

            if (empty($file_upload_error_messages)) {
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $result_message .= "<div class='alert alert-danger'>";
                    $result_message .= "<div>Unable to upload photo.</div>";
                    $result_message .= "<div>Update the record to upload photo.</div>";
                    $result_message .= "</div>";
                }
            }
            else {
                $result_message .= "<div class='alert alert-danger'>";
                $result_message .= "{$file_upload_error_messages}";
                $result_message .= "<div>Update the record to upload photo.</div>";
                $result_message .= "</div>";
            }

        return $result_message;
        }
    }
}

?>