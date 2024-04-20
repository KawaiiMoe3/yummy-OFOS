//Get all quantity buttons
const quantityBtns = document.querySelectorAll('.quantity-btn')

//Add eventListener to each button
quantityBtns.forEach(btn => {
    btn.addEventListener('click', function(){
        //Get the number field and its current value
        const numberField = btn.parentElement.querySelector('.quantityInput')
        let value = parseInt(numberField.value) //Change the string value to number

        //Check if the button either increaseBtn or decreaseBtn
        if (btn.classList.contains('increaseBtn')) {
            //Increase the value if it's within the max limit
            if (value < parseInt(numberField.getAttribute('max'))) {
                value++
            }
        } else if (btn.classList.contains('decreaseBtn')) {
            //Decrease the value if it's within the min limit
            if (value > parseInt(numberField.getAttribute('min'))) {
                value--
            }
        }
        //Update the numberField with the new value
        numberField.value = value;
    })
})

//Get the removeBtn to remove food from cart
const removeBtns = document.getElementsByClassName('removeBtn');

// Iterate over each element with the class name "removeBtn"
for (let i = 0; i < removeBtns.length; i++) {
    // Add click event listener to each element
    removeBtns[i].addEventListener('click', function(event) {

        // Display confirmation dialog when clicked
        const confirmed = confirm("Confirm to remove this food from your cart?");
        
        // If user confirms, allow form submission
        if (confirmed) {
            return true;
        } else {
            event.preventDefault(); // Prevent form submission if confirmation is not confirmed
            return false;
        }
    });
}

//Calculate subtotal for proceed to checkout
let totalSubtotalResult = 0
let taxAmount = 0
let total = 0
const taxRate = 0.06
const shippingAmount = 4.99

let fprice = document.getElementsByClassName('fprice')
let quantityInput = document.getElementsByClassName('quantityInput')
let totalFPrice = document.getElementsByClassName('totalFPrice')

let subtotal = document.getElementById('subtotal')
let subtotalInput = document.getElementById('subtotalInput')
let tax = document.getElementById('tax')
let taxInput = document.getElementById('taxInput')
let shipping = document.getElementById('shipping')
let shippingInput = document.getElementById('shippingInput')
let totalAmount = document.getElementById('totalAmount')
let totalAmountInput = document.getElementById('totalAmountInput')
function calSubTotal() {
    for (let i = 0; i < fprice.length; i++) {
        // Convert the value of fprice and quantityInput to numbers
        const price = parseFloat(fprice[i].value);
        const quantity = parseFloat(quantityInput[i].value);

        totalFPrice[i].innerHTML = "RM " + (price * quantity).toFixed(2)
        totalSubtotalResult += price * quantity
    }
    // Ensure totalSubtotalResult has only two decimal places
    totalSubtotalResult = totalSubtotalResult.toFixed(2);
    taxAmount = (totalSubtotalResult * taxRate).toFixed(2)

    //Show the result
    subtotal.innerHTML = totalSubtotalResult
    subtotalInput.value = totalSubtotalResult

    tax.innerHTML = taxAmount
    taxInput.value = taxAmount

    shipping.innerHTML = shippingAmount
    shippingInput.value = shippingAmount

    total = parseFloat(totalSubtotalResult) + parseFloat(taxAmount) + parseFloat(shippingAmount);
    totalAmount.innerHTML = total.toFixed(2)
    totalAmountInput.value = total.toFixed(2)
}
calSubTotal()

// // Sample data for demonstration
// const items = [
//     { name: "Product 1", image: "image1.jpg", price: 10 },
//     { name: "Product 2", image: "image2.jpg", price: 20 },
//     { name: "Product 3", image: "image3.jpg", price: 15 }
// ];

// const itemsContainer = document.getElementById("items-container");
// const subtotalElement = document.getElementById("subtotal");
// const taxElement = document.getElementById("tax");
// const shippingElement = document.getElementById("shipping");
// const totalElement = document.getElementById("total");

// // Render items
// items.forEach(item => {
//     const itemDiv = document.createElement("div");
//     itemDiv.classList.add("item");

//     const image = document.createElement("img");
//     image.src = item.image;

//     const itemInfo = document.createElement("div");
//     itemInfo.classList.add("item-info");

//     const itemName = document.createElement("span");
//     itemName.textContent = item.name;

//     const itemPrice = document.createElement("span");
//     itemPrice.textContent = "$" + item.price.toFixed(2);

//     const quantityContainer = document.createElement("div");
//     quantityContainer.classList.add("item-quantity");

//     const minusBtn = document.createElement("button");
//     minusBtn.textContent = "-";
//     minusBtn.addEventListener("click", () => updateQuantity(-1, itemPrice, item));

//     const quantity = document.createElement("span");
//     quantity.textContent = "1";

//     const plusBtn = document.createElement("button");
//     plusBtn.textContent = "+";
//     plusBtn.addEventListener("click", () => updateQuantity(1, itemPrice, item));

//     const removeBtn = document.createElement("button");
//     removeBtn.textContent = "Remove";
//     removeBtn.addEventListener("click", () => removeItem(itemDiv, item.price));

//     quantityContainer.appendChild(minusBtn);
//     quantityContainer.appendChild(quantity);
//     quantityContainer.appendChild(plusBtn);

//     itemInfo.appendChild(itemName);
//     itemInfo.appendChild(quantityContainer);
//     itemInfo.appendChild(itemPrice);

//     itemDiv.appendChild(image);
//     itemDiv.appendChild(itemInfo);
//     itemDiv.appendChild(removeBtn);

//     itemsContainer.appendChild(itemDiv);
// });

// // Function to update quantity and price
// function updateQuantity(change, priceElement, item) {
//     const quantityElement = priceElement.previousElementSibling.querySelector("span");
//     let quantity = parseInt(quantityElement.textContent);
//     quantity += change;
//     if (quantity < 1) return; // Quantity should not be less than 1
//     quantityElement.textContent = quantity;
//     const newPrice = item.price * quantity;
//     priceElement.textContent = "$" + newPrice.toFixed(2);
//     calculateTotal();
// }

// // Function to remove item
// function removeItem(itemElement, price) {
//     itemElement.remove();
//     calculateTotal(-price);
// }

// // Function to calculate total
// function calculateTotal(change = 0) {
//     let subtotal = 0;
//     itemsContainer.querySelectorAll(".item-info span:nth-child(3)").forEach(priceElement => {
//         subtotal += parseFloat(priceElement.textContent.substring(1));
//     });
//     subtotalElement.textContent = subtotal.toFixed(2);
//     const tax = subtotal * 0.1; // Assuming tax is 10%
//     taxElement.textContent = tax.toFixed(2);
//     const shipping = 5; // Example shipping fee
//     shippingElement.textContent = shipping.toFixed(2);
//     const total = subtotal + tax + shipping + change;
//     totalElement.textContent = total.toFixed(2);
// }

// // Function to proceed to checkout (dummy function)
// function proceedToCheckout() {
//     alert("Proceeding to checkout...");
// }

// // Function to cancel checkout (dummy function)
// function cancelCheckout() {
//     alert("Checkout canceled.");
// }