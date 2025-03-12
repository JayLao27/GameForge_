document.addEventListener("DOMContentLoaded", function () {
    fetchCart();
});

function fetchCart() {
    fetch("../../Backend/fetch_cart.php")
        .then(response => response.json())
        .then(cart => {
            const cartContainer = document.getElementById("cartItems");
            cartContainer.innerHTML = "";
            let total = 0;

            if (cart.length === 0) {
                cartContainer.innerHTML = "<tr><td colspan='4' class='p-4 text-center'>Your cart is empty.</td></tr>";
            } else {
                cart.forEach(item => {
                    let itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    cartContainer.innerHTML += `
                        <tr class="border-b">
                            <td class="p-4 flex items-center">
                                <img src="${item.img}" alt="${item.product_name}" class="w-30 h-16 rounded-md mr-4">
                                ${item.product_name}
                            </td>
                            <td class="p-4 flex items-center space-x-2">
                                <button onclick="updateCart(${item.id}, ${item.quantity - 1})" class="px-3 py-1 bg-gray-200 rounded">-</button>
                                <span class="px-3 py-1 border rounded">${item.quantity}</span>
                                <button onclick="updateCart(${item.id}, ${item.quantity + 1})" class="px-3 py-1 bg-gray-200 rounded">+</button>
                            </td>
                            <td class="p-4">₱${itemTotal.toFixed(2)}</td>
                            <td class="p-4">
                              <button onclick="removeFromCart(${item.id})" class="text-red-600 font-semibold">Remove</button>

                            </td>
                        </tr>`;
                });
            }
            document.getElementById("totalPrice").textContent = `₱${total.toFixed(2)}`;
        })
        .catch(error => console.error("Error fetching cart:", error));
}

function updateCart(cartId, newQuantity) {
    if (newQuantity < 1) return; // Prevent zero or negative quantity

    fetch("../../Backend/Cart/update_cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ cart_id: cartId, quantity: newQuantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") fetchCart();
    })
    .catch(error => console.error("Error updating cart:", error));
}

function removeFromCart(cartId) {
fetch("../Backend/Cart/remove_cart.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ cart_id: cartId }) // Make sure this matches the PHP expected format
})
.then(response => response.json())
.then(data => {
    if (data.status === "success") {
        alert("Item removed from cart!");
        fetchCart(); // Refresh cart items
    } else {
        alert(data.message);
    }
})
.catch(error => console.error("Error removing item:", error));
}


function clearCart() {
    fetch("../Backend/Cart/clear_cart.php", { method: "POST" })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") fetchCart();
    })
    .catch(error => console.error("Error clearing cart:", error));
}

function checkout() {
    alert("Redirecting to checkout..."); 
}