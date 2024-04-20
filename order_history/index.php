<?php 
    include "../db_setup/db.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order History | YUMMY</title>
    <link rel="stylesheet" href="../css/orderHistory.css">
</head>
<body>

    <!-- Container FoodCart Starts here -->
    <?php $orderData = []; ?>
    <div class="container">
        <h1 class="text-center">Orders History</h1>

        <?php
        $clientUsername = $_SESSION['login'];
        $query = "SELECT * FROM orders WHERE username = '$clientUsername'";
        $userResult = mysqli_query($conn, $query);
        while ($userFetch = mysqli_fetch_assoc($userResult)) {
            $orderData[] = $userFetch;
        }

        ?>
        <!-- Cart table Starts here -->
        <div id="orderDetails"></div>
    </div>

    <div class="slider">
        <div class="preview">
            <?php foreach ($orderData as $order) { ?>
                <div class="smallbox" onclick="displayOrder(<?php echo $order['orderID']; ?>)">
                    <h2><?php echo "Order ID : " . $order['orderID']; ?></h1>
                    <h3><?php echo $order['orderDate']; ?></h3>
                    <h3><?php echo "RM " . $order['totalAmount']; ?></h3>
                </div>  
            <?php } ?>
        </div> 
    </div>

    <script>
        function displayOrder(orderId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("orderDetails").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_order_details.php?orderId=" + orderId, true);
            xhttp.send();
        }
    </script>
    
</body>
</html>