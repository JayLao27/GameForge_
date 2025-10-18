// Wait for the DOM to fully load before executing functions
document.addEventListener("DOMContentLoaded", function () {
    loadCart(); // Load cart items from local storage
});

// Function to load cart items from local storage and display them in the table
function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || []; // Retrieve cart from local storage or initialize an empty array
    const cartItems = document.getElementById("cartItems");

    if (cartItems) {
        cartItems.innerHTML = ""; // Clear previous cart items before rendering

        if (cart.length === 0) {
            // Display a message if the cart is empty
            cartItems.innerHTML = `<tr><td colspan="5" class="text-center text-gray-500">Your cart is empty.</td></tr>`;
            updateTotal(); // Update the total price to 0
            return;
        }

        // Loop through each product in the cart and create a table row
        cart.forEach((product, index) => {
            let row = document.createElement("tr"); // Create a new table row
            row.setAttribute("data-index", index); // Store the index as a data attribute

            // Insert product details and buttons for increasing/decreasing quantity and removing items
            row.innerHTML = `
                <td><img src="${product.img}" alt="${product.name}" width="120"></td>
                <td><strong>${product.name}</strong></td>
                <td>
                    <button class="bg-gray-300 px-2 py-1 rounded decrease-btn" data-index="${index}">-</button>
                    <span class="mx-2">${product.quantity}</span>
                    <button class="bg-gray-300 px-2 py-1 rounded increase-btn" data-index="${index}">+</button>
                </td>
                <td>₱<strong>${(product.price * product.quantity).toFixed(2)}</strong></td>
                <td><button class="bg-red-500 text-white px-2 py-1 rounded remove-btn" data-index="${index}">Remove</button></td>
            `;

            cartItems.appendChild(row); // Append row to the cart table
        });

        updateTotal(); // Update the total cart price
        attachEventListeners(); // Attach event listeners to buttons
    }
}

// Function to attach event listeners for quantity increase, decrease, and remove buttons
function attachEventListeners() {
    document.querySelectorAll(".increase-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index"); // Get the product index
            updateQuantity(index, 1); // Increase quantity
        });
    });

    document.querySelectorAll(".decrease-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index"); // Get the product index
            updateQuantity(index, -1); // Decrease quantity
        });
    });

    document.querySelectorAll(".remove-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index"); // Get the product index
            removeFromCart(index); // Remove item from cart
        });
    });
}

// Function to update the quantity of a product in the cart
function updateQuantity(index, change) {
    let cart = JSON.parse(localStorage.getItem("cart")) || []; // Retrieve cart from local storage

    if (cart[index]) {
        cart[index].quantity += change; // Update quantity

        if (cart[index].quantity <= 0) {
            cart.splice(index, 1); // Remove product if quantity becomes zero or negative
        }

        localStorage.setItem("cart", JSON.stringify(cart)); // Save updated cart to local storage
        loadCart(); // Reload cart display
    }
}

// Function to remove a product from the cart
function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || []; // Retrieve cart from local storage
    cart.splice(index, 1); // Remove the selected product from the array
    localStorage.setItem("cart", JSON.stringify(cart)); // Save updated cart to local storage
    loadCart(); // Reload cart display
}

// Function to update the total price of the cart
function updateTotal() {
    let cart = JSON.parse(localStorage.getItem("cart")) || []; // Retrieve cart from local storage
    let subtotal = cart.reduce((sum, product) => sum + product.price * product.quantity, 0); // Calculate subtotal
    let deliveryFee = cart.length > 0 ? 400.00 : 0; // Set delivery fee (₱400 if cart is not empty)
    let total = subtotal + deliveryFee; // Compute final total

    // Update display values
    document.getElementById("subtotalPrice").textContent = `₱${subtotal.toFixed(2)}`;
    document.getElementById("deliveryFee").textContent = `₱${deliveryFee.toFixed(2)}`;
    document.getElementById("totalPrice").textContent = `₱${total.toFixed(2)}`;
}

// Function to clear the entire cart
function clearCart() {
    localStorage.removeItem("cart"); // Remove cart data from local storage
    loadCart(); // Reload cart display to reflect the empty cart
}

async function checkout() {
    let cart = JSON.parse(localStorage.getItem("cart")) || []; // Retrieve cart from local storage

    if (cart.length === 0) {
        displayMessage("Your cart is empty.", false); // Show alert if cart is empty
        return;
    }

    try {
        const response = await fetch('../../Backend/Cart/checkout.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ cart }) // Send cart data to backend
        });

        const data = await response.json(); // Parse response from the server

        if (data.success) {
            displayMessage(data.message, true); // Show success message
            clearCart(); // Clear the cart
        } else {
            displayMessage(data.message, false); // Show error message if checkout fails
        }
    } catch (error) {
        console.error("Checkout failed:", error); // Log actual error
        displayMessage("Checkout failed! Please try again.", false);
    }
}

// Function to display messages
function displayMessage(message, isSuccess) {
    const messageContainer = document.getElementById("messageContainer");
    const messageElement = document.createElement("div");
    messageElement.className = `absolute    px-4 py-2 rounded-lg ${isSuccess ? 'bg-green-600' : 'bg-red-600'} text-white mb-4 shadow-lg`;
    messageElement.innerHTML = message;

    messageContainer.appendChild(messageElement);

    setTimeout(() => {
        messageElement.remove();
    }, 3000); // Remove message after 3 seconds
}
