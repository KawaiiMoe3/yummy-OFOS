<?php $pageTitle = "My Account | YUMMY" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="icon" type="image.x-icon" href="../images/index/Logo Files/For Web/Favicons/browser.png">
    
    <link rel="stylesheet" href="../css/defaultCss.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<?php
    include "../includes/menu_includes/header.php";
?>

    <div class="container">
        <div class="profile">
		    <img src="../images/MyAccount/avatar.jpg">
            <?php
			$username = $_SESSION['login'];
            $id  =$_SESSION['user_id'];

            $sql = "SELECT username, email,address,phoneNumber FROM users WHERE username = '$username' AND id = '$id'";
            $result = mysqli_query($conn,$sql);
			
            if ($result->num_rows >0) {
                while($row = $result->fetch_assoc()) {
					
                    echo "<div class='info'>";
                    echo "<h1>" . $row['username'] . "</h1>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Phone: " . $row['phoneNumber'] . "</p>";
                    echo "<p>Address: " . $row['address'] . "</p>";
                    echo "</div>";
					break;
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
			<button class="btn btn-back" onclick="window.location.href='../menu'">Back</button>
			<button class="btn btn-edit" onclick="window.location.href='../myAccount/edit.php'">Edit Profile</button>
        </div>
    </div>

<?php include "../includes/menu_includes/footer.php" ?>