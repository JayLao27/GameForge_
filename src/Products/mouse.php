<?php
include '../Template/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Main_Pages/signIn.php");
    exit(); // Always exit after header redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/CSS/fonts.css">
</head>
<body class="bg-[#E6E6E6] min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-1/6 p-4">
            <h2 class="text-3xl font-bold mx-4 my-4">Category</h2>
            <nav class="mt-4 space-y-2">
               <a href="mouse.php"> <button class="block w-full text-left px-4 py-2 rounded-lg bg-blue-500 text-white">Mouse</button> </a>
               <a href="headset.php"><button class="block w-full text-left px-4 py-2 rounded-lg hover:bg-gray-300">Headset</button></a>
               <a href="keyboard.php"><button class="block w-full text-left px-4 py-2 rounded-lg hover:bg-gray-300">Keyboards</button></a>
            </nav>
        </aside>
        
        <main class="flex-1">
            <div class="flex justify-end mb-4 mt-4 mr-4">
                <button id="priceFilter" class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow">
                    Price range: <span id="priceOrder">High to Low</span> <span>&#9662;</span>
                </button>
            </div>

            <div id="productGrid" class="grid grid-cols-3 gap-4 mb-70"></div>
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
<?php include '../Template/footer.php'; ?>
</body>
</html>
