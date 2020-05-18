<?php 

session_start();
	if(isset($_SESSION['user'])){
	header('Location: admin/product/product.php');
	}

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
								<input type="submit" name="login" id="loginForm" value="Login" class="btn btn-info btn-md">
					
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


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
