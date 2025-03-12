let products = {
    "Laptops": [
        { name: "ACER NITRO 5 AN515-57-584E GAMING LAPTOP (SHALE BLACK)", price: 35999, img: "../../Resources/Images/Products/Laptop/ACER_NITRO_5_AN515-57-584E_GAMING_LAPTOP__SHALE_BLACK_.png" },
        { name: "Acer Predator Helios 300 PH315-55-76D8", price: 39999, img: "../../Resources/Images/Products/Laptop/Acer_Predator_Helios_300_PH315-55-76D8_165HZ_Gaming_Laptop__Abyssal_Black_.png" },
        { name: "Asus ROG Strix G614JV-N4369W", price: 45999, img: "../../Resources/Images/Products/Laptop/Asus_ROG_Strix_G614JV-N4369W_Gaming_Laptop__Eclipse_Gray_.png" },
        { name: "Asus TUF Gaming F15 FX507VV-HQ275W", price: 54499, img: "../../Resources/Images/Products/Laptop/Asus_TUF_Gaming_F15_FX507VV-HQ275W_Gaming_Laptop-.png" },
        { name: "Gigabyte G5 KF5-H3PH383SH", price: 54799, img: "../../Resources/Images/Products/Laptop/Gigabyte_G5_KF5-H3PH383SH_Gaming_Laptop_.png" },
        { name: "MSI Katana A15 AI B8VE-601PH", price: 65299, img: "../../Resources/Images/Products/Laptop/MSI_Katana_A15_AI_B8VE-601PH_Gaming_Laptop__Black_.png" },
        { name: "MSI Thin 15 B13UCX-2058PH", price: 73999, img: "../../Resources/Images/Products/Laptop/MSI_Thin_15_B13UCX-2058PH_Gaming_Laptop__Cosmos_Grey_.png" }
    ],
    "Mouse": [
        { name: "Motospeed V90 Gaming Mouse Black", price: 2999, img: "../../Resources/Images/Products/Mouse/Motospeed V90 Gaming Mouse Black.png" },
        { name: "Motospeed V400 Gaming Mouse Black", price: 1999, img: "../../Resources/Images/Products/Mouse/Motospeed V400 Gaming Mouse Black.png" },
        { name: "Motospeed Darmoshark N1 Gaming Mouse", price: 2499, img: "../../Resources/Images/Products/Mouse/Motospeed Darmoshark N1 Gaming Mouse Black.png" },
        { name: "Logitech M170 Wireless Mouse Black", price: 999, img: "../../Resources/Images/Products/Mouse/Logitech M170 Wireless Mouse Black.png" },
        { name: "Logitech M171 Wireless Mouse Gray", price: 899, img: "../../Resources/Images/Products/Mouse/ogitech M171 Wireless Mouse Gray.png" },
        { name: "Prolink PMC1007 Optical Mouse", price: 799, img: "../../Resources/Images/Products/Mouse/Prolink PMC1007 Optical Mouse Wired Champagne.png" },
        { name: "Logitech M221 Silent Wireless Mouse", price: 599, img: "../../Resources/Images/Products/Mouse/Logitech M221 Silent Wireless Mouse Blue.png" },
        { name: "Prolink PMC2002 Optical Mouse", price: 599, img: "../../Resources/Images/Products/Mouse/Prolink PMC2002 Optical Mouse Wired.png" },
        { name: "Logitech B100 Optical USB Mouse", price: 299, img: "../../Resources/Images/Products/Mouse/Logitech B100 Optical USB Mouse.png" }
    ],
 "Headset": [
    { name: "Corsair HS55 Stereo Wired Gaming Headset (White)", price: 2999, img: "../../Resources/Images/Products/Headset/Corsair_HS55_Stereo_Wired_Gaming_Headset__White_.png" },
    { name: "Corsair HS80 MAX Premium Wireless RGB Gaming Headset (White)", price: 5999, img: "../../Resources/Images/Products/Headset/Corsair_HS80_MAX_Premium_Wireless_RGB_Gaming_Headset__White_.png" },
    { name: "Lenovo Lecoo HT403 USB 7.1 Surround Stereo Wired Gaming Headset (Black)", price: 2499, img: "../../Resources/Images/Products/Headset/Lenovo_Lecoo_HT403_USB_2.0_7.1_Channel_Surround_Stereo_Wired_Gaming_Headset__Black_-removebg-preview.png" },
    { name: "Onikuma K5 PRO Gaming Headset", price: 1799, img: "../../Resources/Images/Products/Headset/Onikuma_K5_PRO_Gaming_Headset-removebg-preview.png" },
    { name: "Onikuma K8 Gaming Headset with Mic & Noise Cancelling (Camouflage Green)", price: 1999, img: "../../Resources/Images/Products/Headset/Onikuma_K8_Gaming_Headset_With_Mic_And_Noise_Cancelling__Camouflage_Green_-removebg-preview.png" },
    { name: "Onikuma X10 Ox Horn RGB Wired Professional Gaming Headset (Black/Red)", price: 2399, img: "../../Resources/Images/Products/Headset/Onikuma_X10_Ox_Horn_RGB_Wired_Professional_Gaming_Headset_with_Noise_Cancellation_Microphone__Black_Red_-removebg-preview.png" },
    { name: "PS4 Gaming Headset Air High-Grade White (PS4-073)", price: 1899, img: "../../Resources/Images/Products/Headset/PS4_Gaming_Headset_Air_High_Grade_White__PS4-073_-removebg-preview.png" },
    { name: "PS4 Gear Gaming Headset 4 Owl Gear (PS4-003)", price: 2099, img: "../../Resources/Images/Products/Headset/PS4_Gear_Gaming_Headset_4_Owl_Gear__PS4-003_-removebg-preview.png" },
    { name: "PS5 Pulse Elite Wireless Headset", price: 6999, img: "../../Resources/Images/Products/Headset/PS5_Pulse_Elite_Wireless_Headset_For_PS5-removebg-preview.png" },
    { name: "Redragon Chiron RGB Wired Gaming Headset (H380-RGB)", price: 2599, img: "../../Resources/Images/Products/Headset/Redragon_Chiron_RGB_Wired_Gaming_Headset__H380-RGB_-removebg-preview.png" },
    { name: "Redragon H878 Skuld Pro Lightweight Wireless Gaming Headset (Black/Blue/White)", price: 3499, img: "../../Resources/Images/Products/Headset/Redragon_H878_Skuld_Pro_Lightweight_Wireless_Gaming_Headset__Black___Blue__White_-removebg-preview.png" },
    { name: "Redragon Hylas Gaming Headset (H260RGB)", price: 2299, img: "../../Resources/Images/Products/Headset/Redragon_Hylas_Gaming_Headset__H260RGB_-removebg-preview.png" }
]
};
let selectedCategory = "Mouse"; 
let isHighToLow = true;

function renderProducts(category) {
    selectedCategory = category; 
    const productGrid = document.getElementById("productGrid");
    if (!productGrid) return; 

    productGrid.innerHTML = ""; 

    if (products[category]) {
        products[category].forEach(product => {
            productGrid.innerHTML += `
                <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer">
                    <img src="${product.img}" alt="${product.name}" class="w-full h-40 object-contain mb-2">
                    <p class="text-lg font-bold">₱ ${product.price.toFixed(1)}</p>
                    <p class="text-m font-bold text-gray-600">${product.name}</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 hover:bg-[#FBFF10] transition-all duration-400 ease-in-out rounded" onclick='addToCart(${JSON.stringify(product)})'>Add to Cart</button>
                </div>
            `;
        }); 
    } else {
        productGrid.innerHTML = `<p class="text-center text-gray-500">No products available in this category.</p>`;
    }
}

function redirectToProduct(productName) {
    window.location.href = `productpage.php?name=${encodeURIComponent(productName)}`;
}

function togglePriceSort() {
    isHighToLow = !isHighToLow;
    if (products[selectedCategory]) {
        products[selectedCategory].sort((a, b) => isHighToLow ? b.price - a.price : a.price - b.price);
        document.getElementById("priceOrder").textContent = isHighToLow ? "High to Low" : "Low to High";
        renderProducts(selectedCategory);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get("category") || "Laptops"; 

    if (typeof renderProducts === "function") {
        renderProducts(selectedCategory);
    } else {
        console.error("renderProducts function not found!");
    }

    document.getElementById("priceFilter").addEventListener("click", togglePriceSort);
});

function showCartMessage(productName) {
    const cartMessage = document.getElementById("cartMessage");
    cartMessage.textContent = `${productName} added to cart!`;
    cartMessage.classList.remove("hidden");
    cartMessage.classList.add("block");

    // Hide message after 3 seconds
    setTimeout(() => {
        cartMessage.classList.add("hidden");
    }, 3000);
}

function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.push(product);
    localStorage.setItem("cart", JSON.stringify(cart));

    // Show message instead of alert
    showCartMessage(product.name);
}

