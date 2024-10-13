let cart = [];

// Функция для загрузки данных из JSON файла
async function loadProducts() {
    const response = await fetch('products.json');
    const products = await response.json();
    displayProducts(products);
}

// Функция для отображения товаров

function displayProducts(products) {
    const productList = document.getElementById('product-list');
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product');
        productDiv.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>Цена: ${product.price} ₽</p>
            <button onclick="addToCart(${product.id})">Добавить в корзину</button>
        `;
        productList.appendChild(productDiv);
    });
}

// Функция для добавления товара в корзину
function addToCart(productId) {
    const existingProduct = cart.find(p => p.id === productId);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({ id: productId, quantity: 1 });
    }
    updateCartCount();
    alert('Товар добавлен в корзину!');
}

// Функция для обновления количества товаров в корзине
function updateCartCount() {
    document.getElementById('cart-count').innerText = cart.reduce((sum, item) => sum + item.quantity, 0);
}

// Функция для отображения корзины
document.getElementById('view-cart').addEventListener('click', () => {
    const cartSection = document.getElementById('cart');
    const cartItemsDiv = document.getElementById('cart-items');
    cartItemsDiv.innerHTML = '';

    cart.forEach(item => {
        const product = products.find(p => p.id === item.id);
        const cartItemDiv = document.createElement('div');
        cartItemDiv.innerText = `${product.name} - ${item.quantity} шт.`;
        cartItemsDiv.appendChild(cartItemDiv);
    });

    cartSection.style.display = 'block';
});

// Очистка корзины
document.getElementById('clear-cart').addEventListener('click', () => {
    cart = [];
    updateCartCount();
    document.getElementById('cart-items').innerHTML = '';
});

// Загрузка продуктов при загрузке страницы
window.onload = loadProducts;
