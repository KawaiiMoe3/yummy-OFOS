<?php
    include "../includes/menu_includes/header.php";
?>

<div class="searchTitleWrap">
    <p class="searchTitle">Food Cart</p>
</div>
<div class="container">
        <div class="checkout-container">
            <div class="items-container" id="items-container">
                <!-- Each of the foods in the cart will be dynamically added here -->
                <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $num = $key + 1;
                            ?>
                            <div class="item">
                                <span class="num"><?php echo $num; ?>.</span>
                                <img src="../images/FoodMenu/<?php echo $value['food_image'] ?>" alt="Product 1">
                                <div class="item-info">
                                    <span><?php echo $value['food_name'] ?></span>
                                    <div class="item-quantity">
                                        <button class="quantity-btn decreaseBtn"><i class="fa-solid fa-minus"></i></button>
                                        <form action="" method="POST">
                                            <input type="number" name="Quantity" onchange="this.form.submit()" class="quantityInput" value="<?php echo $value['Quantity']; ?>" min="1" max="99">
                                            <input type="hidden" name="food_name" value="<?php echo $value['food_name']; ?>">
                                        </form>
                                        <button class="quantity-btn increaseBtn"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <span class="item-price">RM <?php echo $value['food_price'] ?><input type="hidden" class="fprice" value="<?php echo $value['food_price']; ?>"></span>
                                </div>
                                <p class="totalFPrice"></p>
                                <form id="removeBtnForm" action="" method="POST">
                                    <button class="removeBtn" name="removeBtn">
                                        <i class="fa-solid fa-trash"></i>
                                        Remove
                                    </button>
                                    <input type="hidden" name="food_name" value="<?php echo $value['food_name']; ?>">
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="cartEmptyInfo">
                            <p class="cartEmptyMsg">Oh dear, it seems your food cart is feeling a bit lonely. Take a moment to browse our menu and fill it up with your favorite foods!</p>
                            <p><a class="toViewMenu" href="../menu">View Menu</a></p>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="summary-container">
            <div class="summary">
                <div class="subtotal">Subtotal: RM <span id="subtotal"></span></div>
                <div class="tax">Tax(6%): RM <span id="tax"></span></div>
                <div class="shipping">Shipping: RM <span id="shipping"></span></div>
                <div class="total">Total: RM <span id="totalAmount"></span></div>
            </div>
            <?php
            $currentUsername = $_SESSION['login'];
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE username = '$currentUsername' AND id = '$user_id'";
            $queryRun = mysqli_query($conn, $query);

            foreach ($queryRun as $row) {
                //Available to Place to Order if cart is not empty
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                        <input type="hidden" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>">
                        <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                        <input type="hidden" id="subtotalInput" name="subtotal">
                        <input type="hidden" id="taxInput" name="tax">
                        <input type="hidden" id="shippingInput" name="shippingFee">
                        <input type="hidden" id="totalAmountInput" name="totalAmount">

                        <div class="payment-method">
                            <h2>Select Payment Method</h2>
                            <input type="radio" id="credit-card" name="paymentMethod" value="credit-card" checked>
                            <label for="credit-card">Credit Card</label><br>
                            <input type="radio" id="paypal" name="paymentMethod" value="paypal">
                            <label for="paypal">PayPal</label><br>
                            <input type="radio" id="bank-transfer" name="paymentMethod" value="FPX-Banking">
                            <label for="bank-transfer">FPX Banking</label><br>
                        </div>
                        <div class="checkout-buttons">
                            <button class="checkoutBtn" name="proceedToCheckout">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                Proceed to Checkout
                            </button>
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
            <div class="checkout-buttons">
                <button class="cancelBtn" onclick="window.location.href='../menu'">Back</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/checkout.js"></script>

<?php
    //Keep the Cart Data when Refresh the browser Starts here
    if(isset($_POST['Quantity'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['food_name'] == $_POST['food_name']){
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Quantity'];
                echo "<script>
                    window.location.href = '../checkout';
                </script>";
            } 
        }
    }


    // Remove the food from the cart
    if(isset($_POST['removeBtn'])){
        //Traverse the following data
        foreach($_SESSION['cart'] as $key => $value){
            if($value['food_name'] == $_POST['food_name']){
                //Removed selected food by using $key
                unset($_SESSION['cart'][$key]);
                //Enqueue the data
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                    alert('Food has been removed');
                    window.location.href = '../checkout';
                </script>";
            } 
        }
    }


    //Proceed to checkout
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['proceedToCheckout'])) {
            //Get submitted value
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $address = $_POST['address'];
            $subtotal = $_POST['subtotal'];
            $tax = $_POST['tax'];
            $shippingFee = $_POST['shippingFee'];
            $totalAmount = $_POST['totalAmount'];
            $paymentMethod = $_POST['paymentMethod'];
            date_default_timezone_set("Asia/Kuala_Lumpur"); //Set timezone in Malaysia/Kuala Lumpur
            $orderDate = date("Y-m-d H:i:sa"); //Set time format as Year-Months-Date Hours-Minutes-Seconds
            $orderStatus = "Order Placed"; //Order Placed, On Delivery, Delivered, Cancelled

            //Insert data to orders and orderitems table
            $sql = "INSERT INTO orders (orderDate, username, email, phoneNumber, address, paymentMethod, orderStatus, subtotal, tax, shippingFee, totalAmount) 
                    VALUES ('$orderDate', '$username', '$email', '$phoneNumber', '$address', '$paymentMethod', '$orderStatus', '$subtotal', '$tax', '$shippingFee', '$totalAmount')";
            
            if(mysqli_query($conn, $sql)){
                //Get the orderId from orders table
                $orderID = mysqli_insert_id($conn);
                //Insert the ordered food which placed by user to orderitems table
                $sql2 = "INSERT INTO orderitems (orderID, foodName, foodPrice, quantity) VALUES (?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql2);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "isdi", $orderID, $food_name, $food_price, $quantity);
                    //Get the cart data
                    foreach ($_SESSION['cart'] as $key => $values){
                        $food_name = $values['food_name'];
                        $food_price = $values['food_price'];
                        $quantity = $values['Quantity'];
                        mysqli_stmt_execute($stmt);
                    }
                    //Clear the cart after checkout success
                    unset($_SESSION['cart']);
                    echo "<script>
                            alert('Order Placed, Thank You!');
                            window.location.href = '../menu';
                        </script>";
                } else{
                    echo "<script>
                            alert('SQL Query Prepare Error');
                            window.location.href = '../checkout';
                        </script>";
                }
            } else{
                echo "<script>
                    alert('SQL Error');
                    window.location.href = '../checkout';
                </script>";
            }
        }
    }

?>

<?php include "../includes/menu_includes/footer.php" ?>