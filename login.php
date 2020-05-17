<?php 

session_start();
	if(isset($_SESSION['user'])){
	header('Location: admin/product/product.php');
	}

?>


<div id="login" class="tabcontent">
					<p class="formTitle">Login</p>
				    <form method="POST">
				    	<input type="email" id="email" name="email" placeholder="Email"><br>
				    	<input type="password" id="password" name="password" placeholder="Password"><br>
				    	<input type="submit" name="login" id="loginForm" value="Login">
				    </form>
				</div>


				<?php 
					if(isset($_POST['login'])){
						$email = $_POST['email'];
						$password = $_POST['password'];

						include_once "models/users.php";
						include_once "config/database.php";

    					$database = new Database();
    					$db = $database->getConnection();

						$user = new User($db);

						$founded = $user->login($email, $password);
						
						if(!$founded){
							echo "User not found";
						}else{	
							header('Location: admin/product/product.php');
						}





					}

				?>
