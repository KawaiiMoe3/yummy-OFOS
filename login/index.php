<?php 
	include "../db_setup/db.php"; 
	session_start();
?>

<?php
if(isset($_POST['login'])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

	$count = 0;
	//Check the username and password exists or not
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$res = mysqli_query($conn, $sql);

	//Count rows to check the user exists or not
	$count = mysqli_num_rows($res);

	if ($count == 1) {
		$row = mysqli_fetch_assoc($res);
		//User available to login and store the username and id into session
		$_SESSION['login'] = $username;
		$_SESSION['user_id'] = $row['id'];
		header('Location: ../menu');
		exit();
	}
	else{
		//User not exists
		echo "
			<script>
				onload = function(){
					document.querySelector('#errorMsg').innerHTML = 'Username or Password did not match.'
				}
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | YUMMY</title>
    <link rel="icon" type="image.x-icon" href="../images/index/Logo Files/For Web/Favicons/browser.png">
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <div>
	<div id="errorMsg" class="errorMsg"></div>
        <form action="" method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="signup-heading">
							<h1>Login</h1>
						</div>
						<p>Open Your Journey with YUMMY</p>
                        <hr class="mb">
                        <label for="username"><b>Username</b></label>
                        <input class="form" id="username" type="text" name="username" required>
                        <span class="error" id="nameErr"><?php echo isset($nameErr) ? $nameErr : ''; ?></span><br>
                        
                        <label for="password"><b>Password</b></label>
                        <input class="form" id="password" type="password" name="password" required>
                        <span class="error" id="passwordErr"><?php echo isset($passwordErr) ? $passwordErr : ''; ?></span><br>
                        
                        <hr class="mb">
                        <div class="link">
                            <span>No have an account? <a href="../register">Signup Here.</a></span>
                        </div>
						<div class="signup-button">
							<input class="btn btn-primary" type="submit" name="login" value="Login">
						</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
			$('form').submit(function(event) {
				
				
				var username = $('#username').val();
				var password = $('#password').val();
				
				// Perform client-side validation
				var nameErr = passwordErr = '';
				
				if (username.trim() === '') {
					nameErr = 'Username is required';
				}
				
				if (password.trim() === '') {
					passwordErr = 'Password is required';
				}
				
				// Output errors or submit the form
				$('#nameErr').text(nameErr);
				$('#passwordErr').text(passwordErr);
				
				if (nameErr || passwordErr) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Please try again.'
					});
					event.preventDefault(); // Prevent default form submission
				} else {
					// If no errors, submit the form
					$('form').unbind('submit').submit();
					
				}
				
			});
		});
    </script>
</body>
</html>