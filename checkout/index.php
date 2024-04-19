<?php
    include "../includes/menu_includes/header.php";
?>

<div class="searchTitleWrap">
    <p class="searchTitle">Foods Cart</p>
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
                                        <input type="number" name="Quantity" class="quantityInput" value="<?php echo $value['Quantity']; ?>" min="1" max="99">
                                        <button class="quantity-btn increaseBtn"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <span class="item-price">RM <?php echo $value['food_price'] ?><input type="hidden" class="fprice" value="<?php echo $value['food_price']; ?>"></span>
                                </div>
                                <button class="removeBtn">
                                    <i class="fa-solid fa-trash"></i>
                                    Remove
                                </button>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="summary-container">
            <div class="summary">
                <div class="subtotal">Subtotal: RM <span id="subtotal">45.00</span></div>
                <div class="tax">Tax: RM <span id="tax">4.50</span></div>
                <div class="shipping">Shipping: RM <span id="shipping">5.00</span></div>
                <div class="total">Total: RM <span id="total">54.50</span></div>
            </div>
            <div class="payment-method">
                <h2>Select Payment Method</h2>
                <input type="radio" id="credit-card" name="payment" value="credit-card">
                <label for="credit-card">Credit Card</label><br>
                <input type="radio" id="paypal" name="payment" value="paypal">
                <label for="paypal">PayPal</label><br>
                <input type="radio" id="bank-transfer" name="payment" value="bank-transfer">
                <label for="bank-transfer">FPX Banking</label><br>
            </div>
            <div class="checkout-buttons">
                <button class="checkoutBtn">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    Proceed to Checkout
                </button>
                <button class="cancelBtn" onclick="window.location.href='../menu'">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/checkout.js"></script>
<?php include "../includes/menu_includes/footer.php" ?>