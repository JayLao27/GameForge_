// document.addEventListener("DOMContentLoaded", function () {
//     loadCart();
// });

document.addEventListener("DOMContentLoaded", function () {
    loadCart();
});

function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartItems = document.getElementById("cartItems");

    if (cartItems) {
        cartItems.innerHTML = ""; // Clear previous items

        if (cart.length === 0) {
            cartItems.innerHTML = `<tr><td colspan="5" class="text-center text-gray-500">Your cart is empty.</td></tr>`;
            updateTotal();
            return;
        }

        cart.forEach((product, index) => {
            let row = document.createElement("tr");
            row.setAttribute("data-index", index); // Store index for modification
            row.innerHTML = `
                <td><img src="${product.img}" alt="${product.name}" width="120"></td>
                <td><strong>${product.name}</strong></td>

                <td>
                    <button class="bg-gray-300 px-2 py-1 rounded decrease-btn" data-index="${index}">-</button>
                    <span class="mx-2">${product.quantity}</span>
                    <button class="bg-gray-300 px-2 py-1 rounded increase-btn" data-index="${index}">+</button>
                </td>
                <td>₱<strong> ${(product.price * product.quantity).toFixed(2)}</strong></td>
                <td><button class="bg-red-500 text-white px-2 py-1 rounded remove-btn" data-index="${index}">Remove</button></td>
            `;
            cartItems.appendChild(row);
        });

        updateTotal(); // Update total price
        attachEventListeners(); // Attach event listeners for quantity updates
    }
}

function attachEventListeners() {
    document.querySelectorAll(".increase-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            updateQuantity(index, 1);
        });
    });

    document.querySelectorAll(".decrease-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            updateQuantity(index, -1);
        });
    });

    document.querySelectorAll(".remove-btn").forEach(button => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            removeFromCart(index);
        });
    });
}

function updateQuantity(index, change) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart[index]) {
        cart[index].quantity += change;
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1); // Remove item if quantity reaches 0
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        loadCart(); // Reload cart dynamically
    }
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart(); // Reload cart dynamically
}

function clearCart() {
    localStorage.removeItem("cart"); // Clear cart from local storage
    loadCart(); // Reload cart dynamically
}

function updateTotal() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let total = cart.reduce((sum, product) => sum + product.price * product.quantity, 0);
    document.getElementById("totalPrice").textContent = `₱${total.toFixed(2)}`;
}

function checkout() {
    const cartData = localStorage.getItem("cart");
    if (!cartData || cartData.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    fetch("../../Backend/checkout.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: cartData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            const checkoutMessage = document.createElement("div");
            checkoutMessage.className = "fixed top-40 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded shadow-lg";
            checkoutMessage.textContent = "Order placed successfully!";
            document.body.appendChild(checkoutMessage);

            // Clear cart and reload page after 2 seconds
            setTimeout(() => {
                localStorage.removeItem("cart");
                window.location.reload();
            }, 2000);
        } else {
            alert("Checkout failed: " + data.message);
        }
    })
    .catch(error => console.error("Checkout error:", error));
}
