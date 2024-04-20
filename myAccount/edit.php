<?php 
    include "../db_setup/db.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
	<style>
		body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }   

        .editProfile {
            text-align: left;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .edit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button{
            width: 100px;
            margin-right: 10px;
        }

        .edit:hover {
            background-color: #45a049;
        }
		
		.edit2 {
            background-color: crimson;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit2:hover {
            background-color: #C0392B;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="editProfile">
            <h1>Edit Profile</h1>
            <?php

            $currentUser = $_SESSION['login'];
            $id = $_SESSION['user_id'];
            
            $user = "SELECT * FROM users WHERE username = '$currentUser' AND id = '$id'";
            $res = mysqli_query($conn,$user);

            if ($res) {
                if (mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)){
                        ?>
                        <form action="" method="post">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" style="background-color: #D5DBDB; cursor: not-allowed" readonly><br><br>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" required><br><br>

                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo $row['phoneNumber'] ?>" required><br><br>

                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="<?php echo $row['address'] ?>" required><br><br>

                            <button type="button" class="edit2" onclick="window.location.href='../myAccount'">Cancel</button>
                            <button type="submit" class="edit" name="submit">Save</button><br><br>
                        </form>
                        <?php
                        //Form submitted
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
            
                            $sql = "UPDATE users SET username='$username', email='$email', phoneNumber='$phone', address='$address' WHERE username = '$currentUser' AND id = '$id'";
                            $queryRun = mysqli_query($conn, $sql);

                            if ($queryRun) {
                                echo "<script>alert('Profile updated successfully.')</script>";
                                //Redirect user back to myAccount page
                                echo "<script>location.href = '../myAccount'</script>";
                            }
                            else{
                                echo "<script>alert('Profile updated failure, please make sure your input is valid before saved')</script>";
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>