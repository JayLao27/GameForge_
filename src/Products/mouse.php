<?php include '../Template/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-5 mt-4" >
    <div class="flex min-h-screen">
        <aside class="w-1/5 p-4">
            <h2 class="text-xl font-bold underline">Category</h2>
            <nav class="mt-4 space-y-2">
                <button class="block w-full text-left px-4 py-2 rounded-lg bg-blue-500 text-white">Mouse</button>
                <button class="block w-full text-left px-4 py-2 rounded-lg hover:bg-gray-300">Devices</button>
                <button class="block w-full text-left px-4 py-2 rounded-lg hover:bg-gray-300">Keyboards</button>
            </nav>
        </aside>
        
        <main class="flex-1">
            <div class="flex justify-end mb-4">
                <button id="priceFilter" class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow">
                    Price range: <span id="priceOrder">High to Low</span> <span>&#9662;</span>
                </button>
            </div>

            <div id="productGrid" class="grid grid-cols-3 gap-4"></div>
        </main>
    </div>

    <script>
    let products = [
        { name: "Motospeed V30 Gaming Mouse Black", price: 3999, img: "../../Resources/Images/Products/Mouse/Motospeed V30 Gaming Mouse Black.png" },
        { name: "Motospeed V90 Gaming Mouse Black", price: 2999, img: "../../Resources/Images/Products/Mouse/Motospeed V90 Gaming Mouse Black.png" },
        { name: "Motospeed V400 Gaming Mouse Black", price: 2999, img: "../../Resources/Images/Products/Mouse/Motospeed V400 Gaming Mouse Black.png" },
        { name: "Motospeed Darmoshark N1 Gaming Mouse Black", price: 1999, img: "../../Resources/Images/Products/Mouse/Motospeed Darmoshark N1 Gaming Mouse Black.png" },
        { name: "Logitech M170 Wireless Mouse Black", price: 999, img: "../../Resources/Images/Products/Mouse/Logitech M170 Wireless Mouse Black.png" },
        { name: "Philips M344 Wireless Mouse Black", price: 999, img: "../../Resources/Images/Products/Philips.png" },
        { name: "ogitech M171 Wireless Mouse Gray", price: 899, img: "../../Resources/Images/Products/Mouse/ogitech M171 Wireless Mouse Gray.png" },
        { name: "Prolink PMC1007 Optical Mouse Wired Champagne", price: 799, img: "../../Resources/Images/Products/Mouse/Prolink PMC1007 Optical Mouse Wired Champagne.png" },
        { name: "Logitech M221 Silent Wireless Mouse Blue", price: 599, img: "../../Resources/Images/Products/Mouse/Logitech M221 Silent Wireless Mouse Blue.png" },
        { name: "Prolink PMC2002 Optical Mouse Wired", price: 599, img: "../../Resources/Images/Products/Mouse/Prolink PMC2002 Optical Mouse Wired.png" },
        { name: "Logitech B100 Optical USB Mousek", price: 299, img: "../../Resources/Images/Products/Mouse/Logitech B100 Optical USB Mouse.png" }
    ];

    let isHighToLow = true;

    function renderProducts() {
        const productGrid = document.getElementById("productGrid");
        productGrid.innerHTML = ""; 

        products.forEach(product => {
            productGrid.innerHTML += `
                <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer" onclick="redirectToProduct('${product.name}')">
                    <img src="${product.img}" alt="${product.name}" class="w-full h-40 object-contain mb-2">
                    <p class="text-lg font-bold">₱ ${product.price.toFixed(1)}</p>
                    <p class="text-sm text-gray-600">${product.name}</p>
                </div>
            `;
        });
    }

    function redirectToProduct(productName) {
    window.location.href = `productpage.php?name=${encodeURIComponent(productName)}`;
}

    document.getElementById("priceFilter").addEventListener("click", function() {
        isHighToLow = !isHighToLow;
        products.sort((a, b) => isHighToLow ? b.price - a.price : a.price - b.price);
        document.getElementById("priceOrder").textContent = isHighToLow ? "High to Low" : "Low to High";
        renderProducts();
    });

    renderProducts();
</script>
</body>
</html>
