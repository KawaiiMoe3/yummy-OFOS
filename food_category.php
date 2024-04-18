<!DOCTYPE html>
<html>
<head>
<title>Yummy</title>
</head>

<body>

<h1>Category</h1>

<form action="" method="POST">
  <label for="category">Choose a category:</label>
  <select id="category" name="category">
    <option value="daily_discover">Daily Discover</option>
    <option value="dim_sum">Dim Sum</option>
    <option value="breakfast">Breakfast</option>
    <option value="rice">Rice</option>
	<option value="fried_rice">Fried Rice</option>
    <option value="western">Western</option>
    <option value="pizza">Pizza</option>
    <option value="burger">Burger</option>
	<option value="dessert">Dessert</option>
    <option value="drinks">Drinks</option>
  </select>
  <input type="submit" value="View">
</form>

</body>
</html>

<?php
session_start();

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'yummydb';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodCategory = $_POST['category'];

    $query = "SELECT foodName, foodDescription from foodmenu where foodCategory = '$foodCategory'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Food Name: " . $row["foodName"] . ", Description: " . $row["foodDescription"] . "<br>";
        }
    } else {
        echo "No foods found for the selected category.";
    }
}

mysqli_close($conn);
?> 