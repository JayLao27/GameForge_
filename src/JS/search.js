document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    const searchResults = document.getElementById("searchResults");

    function filterProducts(query) {
        query = query.toLowerCase().trim();
        searchResults.innerHTML = "";
        searchResults.classList.add("hidden");

        if (query.length === 0) return;

        let matchedProducts = [];

        for (const category in products) {
            products[category].forEach(product => {
                if (product.name.toLowerCase().startsWith(query)) { // Match only first letter
                    matchedProducts.push(product);
                }
            });
        }

        if (matchedProducts.length > 0) {
            searchResults.classList.remove("hidden");

            matchedProducts.slice(0, 7).forEach(product => { // Limit to 7 results
                const resultItem = document.createElement("div");
                resultItem.className = "p-2 hover:bg-gray-100 cursor-pointer flex items-center";
                resultItem.innerHTML = `
                    <img src="${product.img}" alt="${product.name}" class="h-10 w-10 mr-2">
                    <span class="text-sm">${product.name}</span>
                `;

                resultItem.addEventListener("click", function () {
                    window.location.href = `productpage.php?name=${encodeURIComponent(product.name)}`;
                });

                searchResults.appendChild(resultItem);
            });

            if (matchedProducts.length > 7) {
                searchResults.style.maxHeight = "200px"; // Set a height for scrolling
                searchResults.style.overflowY = "auto"; // Enable vertical scroll
            } else {
                searchResults.style.maxHeight = "unset"; // Reset if less than 7
                searchResults.style.overflowY = "hidden";
            }
        }
    }

    searchInput.addEventListener("input", function () {
        filterProducts(this.value);
    });

    searchButton.addEventListener("click", function () {
        filterProducts(searchInput.value);
    });

        searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevents form submission if inside a form
            const query = searchInput.value.trim();
            if (query.length > 0) {
                window.location.href = `products.php?search=${encodeURIComponent(query)}`;
            }
        }
    });

    document.addEventListener("click", function (event) {
        if (!searchResults.contains(event.target) && event.target !== searchInput) {
            searchResults.classList.add("hidden");
        }
    });
});