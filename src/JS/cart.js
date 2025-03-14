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
            row.setAttribute("data-index", index);
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
            cartItems.appendChild(row);
        });

        updateTotal();
        attachEventListeners();
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
            cart.splice(index, 1);
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        loadCart();
    }
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

function updateTotal() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let total = cart.reduce((sum, product) => sum + product.price * product.quantity, 0);
    document.getElementById("totalPrice").textContent = `₱${total.toFixed(2)}`;
}
function clearCart() {
    localStorage.removeItem("cart");
    loadCart();
   
}

async function checkout() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    if (cart.length === 0) {
        alert("Your cart is empty.");
        return;
    }

    try {
        const response = await fetch('../../Backend/Cart/checkout.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ cart })
        });

        const data = await response.json(); // Parse response

        if (data.success) {
            alert(data.message); // Show "Order successful!" message
            localStorage.removeItem('cart'); // Clear cart on success
        } else {
            alert(data.message); // Show actual error message (e.g., "Insufficient balance")
        }
    } catch (error) {
        alert("Order successful!");
    }
}
