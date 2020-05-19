<?php 

class User {

    private $conn;
    private $table_name = "users";

    private $id;
    private $name;
    private $email;
    private $password;

    
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
         $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
         $this->password = $password;
    }


    function login($email, $password){

        $query = "SELECT *
    FROM
        " . $this->table_name . "
    WHERE email=:email AND password=:password
    ";

    $stmt = $this->conn->prepare( $query );

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);



    $stmt->execute();
        
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($user)){
        return false;
    }

    $this->id = $user["id"];
    $this->name = $user["name"];
    $this->email = $user["email"];
    $this->password = $user["password"];
    $_SESSION['user'] = $user;

        
        return true;
	}







}
