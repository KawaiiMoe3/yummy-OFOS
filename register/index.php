<?php
require_once('../db_setup/db.php');

if(isset($_POST['create'])){
    $username = $_POST["username"];  
    $email = $_POST["email"];  
    $phoneNumber = $_POST["phoneNumber"];  
    $address = $_POST["address"];  
    $password = $_POST["password"];  
	
	$hashedPassword = md5($password);

    // Check if user with same email or username already exists
    $check_query = "SELECT * FROM users WHERE email=? OR username=?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "ss", $email, $username);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);
    
    if(mysqli_num_rows($result) > 0) {
        //echo "Error: User with the same email or username already exists.";
		echo "
			<script>
				onload = function(){
					document.querySelector('#errorMsg').innerHTML = 'User with the same email or username already exists.'
				}
			</script>
		";
        //exit(); // Stop further execution
    } else {
        // Insert data into the database
        $insert_query = "INSERT INTO users (username, email, phoneNumber, address, password) VALUES(?,?,?,?,?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "sssss", $username, $email, $phoneNumber, $address , $hashedPassword);
        mysqli_stmt_execute($insert_stmt);
		
        mysqli_stmt_close($insert_stmt);
		
		sleep(2);
		header("Location: ../login");
		
		
		
		exit(); // Stop further execution
		
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp | YUMMY</title>
    <link rel="icon" type="image.x-icon" href="../images/index/Logo Files/For Web/Favicons/browser.png">
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <div>
		<div id="errorMsg" class="errorMsg"></div>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="signup-heading">
							<h1>Signup</h1>
						</div>
						<p>Register Today on YUMMY</p>
                        <hr class="mb">
                        <label for="username"><b>Username</b></label>
                        <input class="form" id="username" type="text" name="username" required>
                        <span class="error" id="nameErr"><?php echo isset($nameErr) ? $nameErr : ''; ?></span><br>
                        
                        <label for="email"><b>Email</b></label>
                        <input class="form" id="email" type="text" name="email" required>
                        <span class="error" id="emailErr"><?php echo isset($emailErr) ? $emailErr : ''; ?></span><br>
                        
                        <label for="phoneNumber"><b>Phone Number</b></label>
                        <input class="form" id="phoneNumber" type="text" name="phoneNumber" required>
                        <span class="error" id="phoneErr"><?php echo isset($phoneErr) ? $phoneErr : ''; ?></span><br>

						<label for="address"><b>Address</b></label>
                        <input class="form" id="address" type="text" name="address" required>
                        <span class="error" id="addressErr"><?php echo isset($addressErr) ? $addressErr : ''; ?></span><br>
                        
                        <label for="password"><b>Password</b></label>
                        <input class="form" id="password" type="password" name="password" required>
                        <span class="error" id="passwordErr"><?php echo isset($passwordErr) ? $passwordErr : ''; ?></span><br>
                        
                        <hr class="mb">
                        <div class="link">
                            <span>Already have an account? <a href="../login">Login Here.</a></span>
                        </div>
						<div class="signup-button">
							<input class="btn btn-primary" type="submit" name="create" value="Sign Up">
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
				var address = $('#address').val();
				var password = $('#password').val();
				
				// Perform client-side validation
				var nameErr = emailErr = phoneErr = addressErr = passwordErr = '';
				
				if (username.trim() === '') {
					nameErr = 'Username is required';
				}
				
				if (email.trim() === '' || !isValidEmail(email)) {
					emailErr = 'Invalid email format';
				}
				
				if (phoneNumber.trim() === '' || !isValidPhoneNumber(phoneNumber)) {
					phoneErr = 'Invalid phone number format';
				}

				if (address.trim() === '') {
					addressErr = 'Address is required';
				}
				
				if (password.trim() === '' || password.length < 8) {
					passwordErr = 'Password must be at least 8 characters long';
				}
				
				// Output errors or submit the form
				$('#nameErr').text(nameErr);
				$('#emailErr').text(emailErr);
				$('#phoneErr').text(phoneErr);
				$('#addressErr').text(addressErr);
				$('#passwordErr').text(passwordErr);
				
				if (nameErr || emailErr || phoneErr || addressErr || passwordErr) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Please enter valid value.'
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
			/*
				Types of valid Malaysian telephone numbers:
				1. +6012-3456789
				2. 012-3456789
				3. +60-12-3456789
				4. 0123456789
				5. 60123456789
				6. 012-345678901 (11 digits for U Mobile user)
			 */
			return /^(?:\+?6?0)?(?:\d{1,2}-?){1,2}\d{4,11}$/.test(phoneNumber);
		}
    </script>

    <?php // include('../includes/footer.php'); ?>
</body>
</html>