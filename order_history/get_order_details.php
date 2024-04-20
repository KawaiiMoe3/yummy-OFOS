<?php 
    include "../db_setup/db.php";

    if(isset($_GET['orderId'])) {
        $orderId = $_GET['orderId'];

        $selectedQuery = "SELECT * FROM orders WHERE orderID = '$orderId'";
        $selectedResult = mysqli_query($conn, $selectedQuery);
        $selectedFetch = mysqli_fetch_assoc($selectedResult);
?>
        <div class="box">
            <table class="style-table2">
                <thead>
                    <tr>
                        <th><b>Order ID</b></th>
                        <th><b>Order Date</b></th>
                        <th><b>Delivery Address</b></th>
                        <th><b>Payment Method</b></th>
                        <th><b>SubTotal (RM)</b></th>
                        <th><b>Tax (RM)</b></th>
                        <th><b>Shipping Fee (RM)</b></th>
                        <th><b>Total (RM)</b></th>
                        <th><b>Order Status</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $selectedFetch['orderID']; ?></td>
                        <td><?php echo $selectedFetch['orderDate']; ?></td>
                        <td><?php echo $selectedFetch['address']; ?></td>
                        <td><?php echo $selectedFetch['paymentMethod']; ?></td>
                        <td><?php echo $selectedFetch['subtotal']; ?></td>
                        <td><?php echo $selectedFetch['tax']; ?></td>
                        <td><?php echo $selectedFetch['shippingFee']; ?></td>
                        <td><?php echo $selectedFetch['totalAmount']; ?></td>
                        <td><?php echo $selectedFetch['orderStatus']; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="style-table2">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Food Name</th>
                        <th>Price (RM)</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $orderQuery = "SELECT * FROM orderitems WHERE orderID = '$orderId'";
                        $orderResult = mysqli_query($conn, $orderQuery);
                        $rowNumber = 1;
                        while($orderFetch = mysqli_fetch_assoc($orderResult)){
                    ?>
                            <tr>
                                <td><?php echo $rowNumber++; ?>.</td>
                                <td><?php echo $orderFetch['foodName']; ?></td>
                                <td><?php echo $orderFetch['foodPrice']; ?></td>
                                <td><?php echo $orderFetch['quantity']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <button onclick="history.back()">Back</button>
        </div>
<?php 
    }
?>