document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    
    if (searchInput) {
        searchInput.addEventListener("input", function () {
            renderProducts(selectedCategory);
        });
    }
});

function renderProducts(category) {
    selectedCategory = category; 
    const productGrid = document.getElementById("productGrid");
    const searchInput = document.getElementById("searchInput");

    if (!productGrid) return;

    productGrid.innerHTML = ""; 

    let filteredProducts = products[category] || [];

    if (searchInput && searchInput.value.trim() !== "") {
        const searchQuery = searchInput.value.toLowerCase();
        filteredProducts = filteredProducts.filter(product =>
            product.name.toLowerCase().includes(searchQuery)
        );
    }

    if (filteredProducts.length > 0) {
        filteredProducts.forEach(product => {
            productGrid.innerHTML += `
                <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer">
                    <img src="${product.img}" alt="${product.name}" class="w-full h-40 object-contain mb-2">
                    <p class="text-lg font-bold">₱ ${product.price.toFixed(1)}</p>
                    <p class="text-m font-bold text-gray-600">${highlightMatch(product.name, searchInput.value)}</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick='addToCart(${JSON.stringify(product)})'>Add to Cart</button>
                </div>
            `;
        });
    } else {
        productGrid.innerHTML = `<p class="text-center text-gray-500">No products found.</p>`;
    }
}

function highlightMatch(text, query) {
    if (!query) return text;
    const regex = new RegExp(`(${query})`, "gi");
    return text.replace(regex, `<span class="bg-yellow-200">$1</span>`);
}
