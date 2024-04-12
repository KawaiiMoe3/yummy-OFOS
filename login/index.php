<?php
// require_once('config.php');

// if(isset($_POST['create'])){
//     $username = $_POST["username"];  
//     $email = $_POST["email"];  
//     $phoneNumber = $_POST["phoneNumber"];  
//     $password = $_POST["password"];   

//     // Check if user with same email or username already exists
//     $check_query = "SELECT * FROM users WHERE email=? OR username=?";
//     $check_stmt = mysqli_prepare($conn, $check_query);
//     mysqli_stmt_bind_param($check_stmt, "ss", $email, $username);
//     mysqli_stmt_execute($check_stmt);
//     $result = mysqli_stmt_get_result($check_stmt);
    
//     if(mysqli_num_rows($result) > 0) {
//         //echo "Error: User with the same email or username already exists.";
// 		echo "<span class='error-message'>Error: User with the same email or username already exists.</span>";
//         //exit(); // Stop further execution
//     } else {
//         // Insert data into the database
//         $insert_query = "INSERT INTO users (username, email, phoneNumber, password) VALUES(?,?,?,?)";
//         $insert_stmt = mysqli_prepare($conn, $insert_query);
//         mysqli_stmt_bind_param($insert_stmt, "ssss", $username, $email, $phoneNumber, $password);
//         mysqli_stmt_execute($insert_stmt);
		
//         mysqli_stmt_close($insert_stmt);
		
// 		sleep(2);
// 		header("Location: ../index.html");
		
		
		
// 		exit(); // Stop further execution
		
//     }

//     mysqli_stmt_close($check_stmt);
//     mysqli_close($conn);
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp | YUMMY</title>
    
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <div>
        <form method="post">
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
							<input class="btn btn-primary" type="submit" name="create" value="Login">
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
				var email = $('#email').val();
				var phoneNumber = $('#phoneNumber').val();
				var password = $('#password').val();
				
				// Perform client-side validation
				var nameErr = emailErr = phoneErr = passwordErr = '';
				
				if (username.trim() === '') {
					nameErr = 'Username is required';
				}
				
				if (email.trim() === '' || !isValidEmail(email)) {
					emailErr = 'Invalid email format';
				}
				
				if (phoneNumber.trim() === '' || !isValidPhoneNumber(phoneNumber)) {
					phoneErr = 'Invalid phone number format';
				}
				
				if (password.trim() === '' || password.length < 8) {
					passwordErr = 'Password must be at least 8 characters long';
				}
				
				// Output errors or submit the form
				$('#nameErr').text(nameErr);
				$('#emailErr').text(emailErr);
				$('#phoneErr').text(phoneErr);
				$('#passwordErr').text(passwordErr);
				
				if (nameErr || emailErr || phoneErr || passwordErr) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Please fix the errors!'
					});
					event.preventDefault(); // Prevent default form submission
				} else {
					// If no errors, submit the form
					$('form').unbind('submit').submit();
					
				}
				
			});
		});

		function isValidEmail(email) {
			return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
		}

		function isValidPhoneNumber(phoneNumber) {
			return /^\d{10}$/.test(phoneNumber);
		}
    </script>

    <?php // include('../includes/footer.php'); ?>
</body>
</html>