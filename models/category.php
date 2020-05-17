<?php
class Category{
 
    private $conn;
    private $table_name = "categories";
 
    public $id;
    private $name;
    private $created;


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

    public function getCreated(){
        return $this->created;
    }

    public function setCreated($created){
         $this->id = $created;
    }
 


    public function __construct($db){
        $this->conn = $db;
    }
 
    function read(){
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }


    function getForRange($from_record_num, $records_per_page){
        $query = "SELECT
                    id, name
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

 
    function readName(){
     
        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->name = $row['name'];
    }

     function create(){
 
        $query = "INSERT INTO " . $this->table_name . "
        SET name=:name, created=:created";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));;

        $this->created = date('Y-m-d H:i:s');
 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }


    public function countAll(){
 
        $query = "SELECT id FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
    return $num;
}

    
    public function delete($id){

        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id = $id";
        

        $stmt = $this->conn->prepare( $query );   
        $stmt->execute();

    }


    public function getCategory($categoryId){

        $query = "SELECT
                    id, name
                        FROM
                    " . $this->table_name . "
                    where id = $categoryId";

             $stmt = $this->conn->prepare( $query );   
             $stmt->execute();

             $category = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->id = $category["id"];
                $this->name = $category["name"];    
    }

    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);
     
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }




}
?>