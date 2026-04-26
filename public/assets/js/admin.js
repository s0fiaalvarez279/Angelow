// === FUNCIÓN DE TOASTS ===
function showToast({title = "", message = "", type = "info", duration = 4000}) {
  const container = document.getElementById("toastContainer");
  const toast = document.createElement("div");
  toast.className = `toast ${type}`;

  const icons = {
    success: `<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>`,
    warning: `<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>`,
    error: `<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`,
    info: `<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>`
  };

  toast.innerHTML = `
    <div class="toast-icon">${icons[type]}</div>
    <div class="toast-content">
      ${title ? `<div class="toast-title">${title}</div>` : ""}
      <div class="toast-message">${message}</div>
    </div>
    <button class="toast-close">×</button>
  `;

  container.appendChild(toast);
  setTimeout(() => toast.classList.add("show"), 100);

  toast.querySelector(".toast-close").onclick = () => toast.remove();
  setTimeout(() => {
    toast.classList.remove("show");
    setTimeout(() => toast.remove(), 400);
  }, duration);
}

// === DATOS ===
let products = [
  {
    id: 1,
    name: "Conjunto Deportivo",
    category: "Niños",
    subcategory: "Edición Especial",
    price: 899900,
    description: "Elegancia casual en su máxima expresión. Presentamos este conjunto deportivo de dos piezas perfecto para los peques que quieren verse modernos y sentirse cómodos todo el día.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninos/Frente Conjunto Deportivo.png"],
    stock: 15,
    rating: 4.5,
    reviews: 28,
    features: ["Material: 100% Algodón", "Lavable a máquina", "Ideal para uso diario", "Diseño unisex"]
  },
  {
    id: 2,
    name: "Conjunto Size",
    category: "Niños",
    subcategory: "Popular",
    price: 899900,
    description: "Conjunto moderno y cómodo para niños con tallas variadas.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninos/Frente Conjunto Size.png"],
    stock: 8,
    rating: 4.2,
    reviews: 15,
    features: ["Material: Poliéster y algodón", "Lavable a máquina", "Secado rápido"]
  },
  {
    id: 3,
    name: "Body Niño",
    category: "Niños",
    subcategory: "Niño",
    price: 899900,
    description: "Body cómodo y práctico para bebés y niños pequeños.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninos/Frente Body Niño.png"],
    stock: 20,
    rating: 4.7,
    reviews: 42,
    features: ["100% Algodón orgánico", "Broches en la entrepierna", "Sin etiquetas irritantes"]
  },
  {
    id: 4,
    name: "Jogger Niño",
    category: "Niños",
    subcategory: "Niño",
    price: 899900,
    description: "Pantalones jogger cómodos y modernos para niños.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninos/Frente Jogger.png"],
    stock: 5,
    rating: 4.3,
    reviews: 19,
    features: ["Material: Jersey de algodón", "Cintura elástica", "Bolsillos laterales"]
  },
  {
    id: 5,
    name: "Set Bebé",
    category: "Bebés",
    subcategory: "Edición especial",
    price: 899900,
    description: "Set completo para bebés recién nacidos. Incluye body, pantalón y gorrito.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/bebes/Frente Set Bebe.png"],
    stock: 0,
    rating: 4.8,
    reviews: 36,
    features: ["Material hipoalergénico", "Set de 3 piezas", "Ideal para recién nacidos"]
  },
  {
    id: 6,
    name: "Conjunto Infantil",
    category: "Niñas",
    subcategory: "Niña",
    price: 899900,
    description: "Conjunto elegante y divertido para niñas.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninas/Frente Conjunto Infantil.png"],
    stock: 12,
    rating: 4.6,
    reviews: 31,
    features: ["Estampado exclusivo", "Material: Algodón y elastano", "Comodidad máxima"]
  },
  {
    id: 7,
    name: "Body Negro",
    category: "Niños",
    subcategory: "Popular",
    price: 899900,
    description: "Body negro básico para niños.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninas/Frente Body Negro.png"],
    stock: 3,
    rating: 4.4,
    reviews: 23,
    features: ["Color negro clásico", "100% Algodón", "Broches de metal"]
  },
  {
    id: 8,
    name: "Set Falda",
    category: "Niñas",
    subcategory: "Popular",
    price: 899900,
    description: "Set con falda para niñas. Incluye falda y top a juego.",
    sizes: ["2", "4", "6", "8"],
    imgs: ["../assets/imagenes/ninas/Frente Set Falda.png"],
    stock: 7,
    rating: 4.9,
    reviews: 47,
    features: ["Falda con vuelo", "Top a juego", "Material ligero"]
  }
];

// Categorías (se sincronizan con el cliente)
let categories = JSON.parse(localStorage.getItem('angelow_client_categories')) || ["Todos","Bebés","Niños","Niñas","Popular","Edición especial","Oferta"];

let cart = JSON.parse(localStorage.getItem("angelow_cart")) || [];
let favorites = JSON.parse(localStorage.getItem("angelow_favorites")) || [];
let activeCategory = "Todos";
let selectedSizes = {};
let selectedColors = {};
let searchQuery = "";

const availableSizes = ["2","4","6","8","10","12"];

let editingProductId = null;
let newProductImages = [];

// === FUNCIÓN PARA ACTUALIZAR CATEGORÍAS ===
function updateClientCategories() {
  // Esta función debería ser llamada cuando se modifiquen las categorías desde el admin
  // Por ahora, mantenemos las categorías estáticas
  localStorage.setItem('angelow_client_categories', JSON.stringify(categories));
}

// === FUNCIONES DE PERSISTENCIA ===
function saveCart() { localStorage.setItem("angelow_cart", JSON.stringify(cart)); }
function saveFavorites() { localStorage.setItem("angelow_favorites", JSON.stringify(favorites)); }

// === MENÚ DESPLEGABLE ===
const profileBtn = document.getElementById("profileBtn");
const dropdownMenu = document.getElementById("dropdownMenu");
profileBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  dropdownMenu.classList.toggle("show");
});
document.addEventListener("click", () => dropdownMenu.classList.remove("show"));

// === BÚSQUEDA ===
document.getElementById("searchInput").addEventListener("input", (e) => {
  searchQuery = e.target.value.toLowerCase().trim();
  document.getElementById("clearSearch").style.display = searchQuery ? "block" : "none";
  renderProducts();
});
document.getElementById("clearSearch").addEventListener("click", () => {
  document.getElementById("searchInput").value = "";
  searchQuery = "";
  document.getElementById("clearSearch").style.display = "none";
  document.getElementById("searchInput").focus();
  renderProducts();
});

// === FILTROS Y RENDER ===
function getFilteredProducts() {
  let filtered = products;
  if (activeCategory !== "Todos") {
    if (["Popular", "Edición especial", "Oferta"].includes(activeCategory)) {
      filtered = filtered.filter(p => p.subcategory === activeCategory);
    } else {
      filtered = filtered.filter(p => p.category === activeCategory);
    }
  }
  if (searchQuery) {
    filtered = filtered.filter(p => 
      p.name.toLowerCase().includes(searchQuery) ||
      p.category.toLowerCase().includes(searchQuery) ||
      p.subcategory.toLowerCase().includes(searchQuery)
    );
  }
  return filtered;
}

function renderCategories() {
  document.getElementById("categoriesList").innerHTML = [...categories, ...categories, ...categories]
    .map(cat => `<span class="cat-item ${activeCategory === cat ? 'active' : ''}" onclick="setCategory('${cat}')">${cat}</span>`)
    .join("");
}

function renderProducts() {
  const grid = document.getElementById("productsGrid");
  const filtered = getFilteredProducts();

  if (filtered.length === 0) {
    grid.innerHTML = `<div class="no-results"><p>No se encontraron productos${searchQuery ? ` para "<strong>${document.getElementById('searchInput').value}</strong>"` : ""}</p><p>Prueba con otros términos o revisa las categorías</p></div>`;
    return;
  }

  grid.innerHTML = filtered.map(p => {
    const mainImg = p.imgs && p.imgs.length > 0 ? p.imgs[0] : "../assets/imagenes/general/logo.png";
    const stockClass = p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out';
    const stockText = p.stock > 10 ? 'En stock' : p.stock > 0 ? `Solo ${p.stock} left` : 'Sin stock';

    return `
      <div class="card-container" onclick="openProductDetail(${p.id})">
        <div class="card">
          <div class="my-logo"><img src="../assets/imagenes/general/logo.png" alt="Logo"></div>
          <img src="${mainImg}" class="product-img" alt="${p.name}">
          <h2>${p.name}</h2>
          <p>${p.subcategory}</p>
          <div class="stock-info ${stockClass}">${stockText}</div>
        </div>
        <div class="modal">
          <div class="my-logo"><img src="../assets/imagenes/general/logo.png" alt="Logo"></div>
          <h3>${p.name}</h3>
          <p class="subtitle">conjunto ${p.category}</p>
          <div class="sizes">
            ${p.sizes.map(s => `<div class="size-box ${selectedSizes[p.id] === s ? 'selected' : ''}" onclick="event.stopPropagation(); selectSize(${p.id}, '${s}')">${s}</div>`).join("")}
          </div>
          <div class="price">COP $${p.price.toLocaleString()}</div>
          <div class="stock-info ${stockClass}" style="margin:8px 0; font-size:14px;">${stockText}</div>
          <div class="buttons">
            <button class="buy-btn ${p.stock === 0 ? 'disabled' : ''}" ${p.stock === 0 ? 'disabled' : ''} onclick="event.stopPropagation(); addToCart(${p.id})">Comprar</button>
            <button class="fav-btn ${favorites.includes(p.id) ? 'active' : ''}" onclick="event.stopPropagation(); toggleFavorite(${p.id})">
              <img src="../assets/imagenes/general/favorito.png" alt="Fav">
            </button>
            <button class="edit-btn" onclick="event.stopPropagation(); editProduct(${p.id})" title="Editar producto">✎</button>
          </div>
        </div>
      </div>
    `;
  }).join("");
}

function setCategory(cat) { 
  activeCategory = cat; 
  renderCategories(); 
  renderProducts(); 
}

function selectSize(pid, size) { 
  event.stopPropagation();
  selectedSizes[pid] = size; 
  renderProducts(); 
}

// === FUNCIONES DEL MODAL DE PRODUCTOS ===
function openProductModal(product = null) {
  const modal = document.getElementById('productModal');
  const modalTitle = document.getElementById('modalTitle');
  const saveBtn = document.getElementById('modalSaveBtn');
  
  if (product) {
    // Modo edición
    modalTitle.textContent = 'Editar Producto';
    saveBtn.textContent = 'Guardar Cambios';
    
    // Cargar datos del producto
    document.getElementById('productName').value = product.name;
    document.getElementById('productCategory').value = product.category;
    document.getElementById('productSubcategory').value = product.subcategory;
    document.getElementById('productPrice').value = product.price;
    document.getElementById('productStock').value = product.stock;
    
    // Cargar tallas
    newProductSizes = [...product.sizes];
    renderSizes();
    
    // Cargar imágenes
    newProductImages = [...product.imgs];
    renderImagesPreview();
    
    editingProductId = product.id;
  } else {
    // Modo agregar
    modalTitle.textContent = 'Agregar Nuevo Producto';
    saveBtn.textContent = 'Agregar Producto';
    
    // Limpiar formulario
    document.getElementById('productName').value = '';
    document.getElementById('productCategory').value = '';
    document.getElementById('productSubcategory').value = '';
    document.getElementById('productPrice').value = '';
    document.getElementById('productStock').value = '10';
    
    newProductSizes = [];
    renderSizes();
    
    newProductImages = [];
    renderImagesPreview();
    
    editingProductId = null;
  }
  
  modal.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeProductModal() {
  document.getElementById('productModal').classList.remove('active');
  document.body.style.overflow = 'auto';
}

let newProductSizes = [];

function renderSizes() {
  const container = document.getElementById('sizesContainer');
  container.innerHTML = availableSizes.map(size => {
    const isSelected = newProductSizes.includes(size);
    return `<div class="product-size-badge ${isSelected ? 'selected' : ''}" onclick="toggleSize('${size}')">${size}</div>`;
  }).join('');
}

function toggleSize(size) {
  const index = newProductSizes.indexOf(size);
  if (index === -1) {
    newProductSizes.push(size);
  } else {
    newProductSizes.splice(index, 1);
  }
  renderSizes();
}

function renderImagesPreview() {
  const grid = document.getElementById('imagesPreviewGrid');
  grid.innerHTML = '';
  
  newProductImages.forEach((src, i) => {
    const thumb = document.createElement('div');
    thumb.className = 'image-thumb';
    thumb.innerHTML = `
      <img src="${src}" alt="Imagen ${i+1}">
      <button class="remove-image" onclick="removeImage(${i})">×</button>
    `;
    grid.appendChild(thumb);
  });
  
  if (newProductImages.length < 6) {
    const addMore = document.createElement('div');
    addMore.className = 'add-more-images';
    addMore.onclick = () => document.getElementById('productImages').click();
    addMore.innerHTML = `<span>+</span><span>Añadir</span>`;
    grid.appendChild(addMore);
  }
}

function removeImage(index) {
  newProductImages.splice(index, 1);
  renderImagesPreview();
}

function saveProduct() {
  const name = document.getElementById('productName').value.trim();
  const category = document.getElementById('productCategory').value;
  const subcategory = document.getElementById('productSubcategory').value.trim();
  const price = parseInt(document.getElementById('productPrice').value) || 0;
  const stock = parseInt(document.getElementById('productStock').value) || 0;

  if (!name || !category || !subcategory || price <= 0 || stock < 0 || newProductSizes.length === 0 || newProductImages.length === 0) {
    showToast({
      title: "Faltan datos",
      message: "Completa todos los campos obligatorios.",
      type: "warning"
    });
    return;
  }

  if (editingProductId !== null) {
    // Editar producto existente
    const index = products.findIndex(p => p.id === editingProductId);
    if (index !== -1) {
      products[index] = {
        ...products[index],
        name: name,
        category: category,
        subcategory: subcategory,
        price: price,
        stock: stock,
        sizes: [...newProductSizes],
        imgs: [...newProductImages]
      };
    }
    showToast({
      title: "Producto actualizado",
      message: name,
      type: "success"
    });
  } else {
    // Crear nuevo producto
    const newId = products.length ? Math.max(...products.map(p => p.id)) + 1 : 1;
    products.push({
      id: newId,
      name: name,
      category: category,
      subcategory: subcategory,
      price: price,
      stock: stock,
      sizes: [...newProductSizes],
      imgs: [...newProductImages],
      description: `${name} - ${subcategory}`,
      rating: 4.0,
      reviews: 0,
      features: ["Material de calidad", "Diseño exclusivo", "Comodidad garantizada"]
    });
    showToast({
      title: "¡Producto agregado!",
      message: name,
      type: "success"
    });
  }

  editingProductId = null;
  newProductSizes = [];
  newProductImages = [];
  renderProducts();
  renderFavorites();
  closeProductModal();
}

// === FUNCIONES DEL CARRITO ===
function renderCart() {
  const itemsContainer = document.getElementById("cartItems");
  const total = cart.reduce((sum, i) => sum + i.price * i.quantity, 0);
  const totalItems = cart.reduce((sum, i) => sum + i.quantity, 0);

  document.getElementById("total").textContent = `COP $${total.toLocaleString()}`;
  document.getElementById("cartCount").textContent = totalItems;
  document.getElementById("cartCount").style.display = totalItems > 0 ? "flex" : "none";

  if (cart.length === 0) {
    itemsContainer.innerHTML = `<div style="text-align:center;padding:100px 20px;color:#888;font-size:18px;">Tu carrito está vacío</div>`;
    return;
  }

  itemsContainer.innerHTML = cart.map(item => {
    const mainImg = item.imgs && item.imgs.length > 0 ? item.imgs[0] : "../assets/imagenes/general/logo.png";
    return `
      <div class="cart-item">
        <img src="${mainImg}">
        <div class="cart-info">
          <h4>${item.name}</h4>
          <span>Talla: ${item.selectedSize} • ${item.subcategory}</span>
          <div class="qty">
            <button onclick="updateQty('${item.cartId}', -1)" ${item.quantity <= 1 ? 'disabled' : ''}>−</button>
            <strong>${item.quantity}</strong>
            <button onclick="updateQty('${item.cartId}', 1)">+</button>
          </div>
          <strong>COP $${(item.price * item.quantity).toLocaleString()}</strong>
        </div>
        <button class="remove" onclick="removeFromCart('${item.cartId}')">×</button>
      </div>
    `;
  }).join("");
}

function addToCart(pid) {
  event.stopPropagation();
  const product = products.find(p => p.id === pid);
  if (product.stock <= 0) {
    showToast({title: "Sin stock", message: "Este producto no tiene unidades disponibles.", type: "error"});
    return;
  }
  const size = selectedSizes[pid];
  if (!size) {
    showToast({title: "Selecciona talla", message: "Por favor elige una talla antes de comprar.", type: "warning"});
    return;
  }

  const cartId = `${pid}-${size}`;
  const existing = cart.find(i => i.cartId === cartId);
  if (existing ? existing.quantity + 1 > product.stock : 1 > product.stock) {
    showToast({title: "Stock insuficiente", message: "No hay suficientes unidades de esta talla.", type: "warning"});
    return;
  }

  if (existing) existing.quantity++;
  else cart.push({ ...product, selectedSize: size, cartId, quantity: 1 });

  product.stock -= 1;
  saveCart();
  renderProducts();
  renderCart();
  showToast({title: "¡Agregado al carrito!", message: `${product.name} (Talla ${size})`, type: "success"});
}

function removeFromCart(cartId) {
  const item = cart.find(i => i.cartId === cartId);
  if (!item) return;

  const product = products.find(p => p.id === item.id);
  if (product) product.stock += item.quantity;

  cart = cart.filter(i => i.cartId !== cartId);
  saveCart();
  renderCart();
  renderProducts();
  showToast({message: `${item.name} eliminado del carrito`, type: "info"});
}

function updateQty(cartId, delta) {
  const item = cart.find(i => i.cartId === cartId);
  if (!item) return;

  const product = products.find(p => p.id === item.id);
  const newQty = item.quantity + delta;

  if (newQty < 1) {
    removeFromCart(cartId);
    return;
  }
  
  if (newQty > product.stock) {
    showToast({title: "Stock insuficiente", message: "No puedes cambiar la cantidad.", type: "warning"});
    return;
  }
  
  const stockDiff = delta * -1;
  product.stock += stockDiff;
  item.quantity = newQty;
  saveCart();
  renderCart();
  renderProducts();
}

function closeCart() {
  document.getElementById('cartOverlay').classList.remove('active');
}

// === FUNCIONES DE FAVORITOS ===
function updateFavBadges() {
  const favCount = favorites.length;
  document.getElementById('favBadge').textContent = favCount;
  document.getElementById('favHeaderBadge').textContent = favCount;
  document.getElementById('favTotal').textContent = favCount;
  
  document.getElementById('favBadge').style.display = favCount > 0 ? 'flex' : 'none';
  document.getElementById('favHeaderBadge').style.display = favCount > 0 ? 'flex' : 'none';
}

function toggleFavorite(id) {
  const product = products.find(p => p.id === id);
  
  if (favorites.includes(id)) {
    favorites = favorites.filter(x => x !== id);
    showToast({
      title: "Eliminado de favoritos",
      message: `${product.name} se eliminó de tus favoritos`,
      type: "info"
    });
  } else {
    favorites.push(id);
    showToast({
      title: "¡Añadido a favoritos!",
      message: `${product.name} se agregó a tus favoritos`,
      type: "success"
    });
  }
  
  saveFavorites();
  updateFavBadges();
  renderProducts();
  renderFavorites();
}

function renderFavorites() {
  const list = document.getElementById('favoritesList');
  const favProducts = products.filter(p => favorites.includes(p.id));
  
  if (favProducts.length === 0) {
    list.innerHTML = `
      <div class="fav-empty-state">
        <div class="fav-empty-icon">❤️</div>
        <div class="fav-empty-text">No tienes productos en favoritos</div>
        <p style="color: var(--text-secondary); margin-bottom: 30px;">
          Guarda tus productos favoritos para verlos aquí
        </p>
        <button class="fav-empty-btn" onclick="closeFavorites()">
          Seguir comprando
        </button>
      </div>
    `;
    return;
  }
  
  list.innerHTML = favProducts.map(p => {
    const stockClass = p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out';
    const stockText = p.stock > 10 ? 'En stock' : p.stock > 0 ? 'Pocas unidades' : 'Agotado';
    const mainImg = p.imgs && p.imgs.length > 0 ? p.imgs[0] : '../assets/imagenes/general/logo.png';
    
    return `
      <div class="fav-item" id="fav-item-${p.id}">
        <img src="${mainImg}" class="fav-item-img" alt="${p.name}">
        <div class="fav-item-info">
          <h4>${p.name}</h4>
          <span>${p.category} • ${p.subcategory}</span>
          <div style="font-weight:700; font-size:18px; color:var(--primary); margin-top:6px;">COP $${p.price.toLocaleString()}</div>
          <div class="fav-item-stock ${stockClass}">${stockText}</div>
        </div>
        <div class="fav-actions">
          <button class="fav-remove-btn" onclick="toggleFavorite(${p.id})" 
                  title="Quitar de favoritos">×
          </button>
          <button class="add-to-cart-btn" 
                  onclick="addFavoriteToCart(${p.id})" 
                  ${p.stock === 0 ? 'disabled' : ''}
                  title="Agregar al carrito">
            Carrito 
          </button>
        </div>
      </div>
    `;
  }).join('');
}

function addFavoriteToCart(productId) {
  const product = products.find(p => p.id === productId);
  
  if (product.stock <= 0) {
    showToast({
      title: "Producto agotado",
      message: `${product.name} no tiene stock disponible`,
      type: "error"
    });
    return;
  }
  
  const cartId = `${productId}-default`;
  const existingItem = cart.find(i => i.cartId === cartId);
  
  if (existingItem) {
    existingItem.quantity++;
  } else {
    const defaultSize = product.sizes[0];
    cart.push({
      ...product,
      selectedSize: defaultSize,
      cartId: cartId,
      quantity: 1
    });
  }
  
  product.stock--;
  saveCart();
  renderCart();
  renderFavorites();
  showToast({
    title: "¡Agregado al carrito!",
    message: `${product.name} se agregó desde favoritos`,
    type: "success"
  });
}

function closeFavorites() {
  document.getElementById('favoritesOverlay').classList.remove('active');
  document.querySelector('.fav-sidebar').classList.remove('active');
}

// === FUNCIONES DE DETALLE ===
function openProductDetail(productId) {
  const product = products.find(p => p.id === productId);
  if (!product) return;

  const detailContent = document.getElementById('productDetailContent');
  const stars = '★'.repeat(Math.floor(product.rating)) + '☆'.repeat(5 - Math.floor(product.rating));
  const reviews = product.reviews || 0;
  
  const formattedPrice = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
  }).format(product.price);
  
  detailContent.innerHTML = `
    <div class="detail-container">
      <div class="detail-images">
        <img src="${product.imgs[0] || '../assets/imagenes/general/logo.png'}" class="detail-main-image" alt="${product.name}" id="detailMainImage">
        <div class="detail-image-thumbnails">
          ${product.imgs.map((img, index) => `
            <img src="${img}" class="detail-thumbnail ${index === 0 ? 'active' : ''}" 
                 alt="Vista ${index + 1}" 
                 onclick="changeDetailImage('${img}', this)">
          `).join('')}
        </div>
      </div>
      
      <div class="detail-info">
        <div class="detail-category">${product.category}</div>
        <h1 class="detail-name">${product.name}</h1>
        <p class="detail-description">${product.description}</p>
        
        <div class="detail-rating">
          <div class="stars">${stars}</div>
          <span class="rating-text">${reviews} reseñas</span>
          <a href="#" class="rating-link" onclick="event.preventDefault(); showReviewForm(${productId})">
            Dejar tu reseña
          </a>
        </div>
        
        <div class="detail-prices">
          <span class="detail-price">${formattedPrice}</span>
        </div>
        
        <div class="detail-size-section">
          <div class="detail-size-title">Talla</div>
          <div class="detail-sizes">
            ${product.sizes.map(size => `
              <div class="detail-size-box ${selectedSizes[productId] === size ? 'selected' : ''}" 
                   onclick="selectDetailSize(${productId}, '${size}')">
                ${size}
              </div>
            `).join('')}
          </div>
          <div class="size-help">
            ¿No encuentras tu talla? <a href="#" class="size-help-link" onclick="event.preventDefault(); openSizeHelp()">Te ayudamos</a>
          </div>
        </div>
        
        <div class="detail-ref">REF: ${product.id}</div>
        
        <div class="detail-actions">
          <button class="detail-action-btn detail-buy-now" onclick="buyNowProduct(${productId})">
            COMPRAR AHORA
          </button>
          <button class="detail-action-btn detail-add-cart" onclick="addToCartFromDetail(${productId})">
            AGREGAR AL CARRITO
          </button>
        </div>
        
        <div class="detail-shipping-info">
          <div class="shipping-title">Envío y Devoluciones</div>
          <div class="shipping-item">
            <span style="color: #00a650; margin-right: 5px;">✓</span>
            <span>Envío gratis en pedidos superiores a $58.900</span>
          </div>
          <div class="shipping-item">
            <span style="color: #00a650; margin-right: 5px;">✓</span>
            <span>Devoluciones gratuitas</span>
          </div>
          <div class="shipping-item">
            <span style="color: #00a650; margin-right: 5px;">✓</span>
            <span>Entrega estimada: 5-10 días hábiles</span>
          </div>
        </div>
        
        <div class="detail-specs">
          <div class="specs-title">Descripción</div>
          <div class="specs-list">
            ${product.features ? product.features.map(feature => `
              <div class="spec-item">${feature}</div>
            `).join('') : `
              <div class="spec-item">Material de alta calidad</div>
              <div class="spec-item">Diseño exclusivo</div>
              <div class="spec-item">Comodidad garantizada</div>
            `}
          </div>
        </div>
      </div>
    </div>
  `;

  document.getElementById('productDetail').classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeProductDetail() {
  document.getElementById('productDetail').classList.remove('active');
  document.body.style.overflow = 'auto';
}

function changeDetailImage(imgSrc, element) {
  document.getElementById('detailMainImage').src = imgSrc;
  document.querySelectorAll('.detail-thumbnail').forEach(thumb => thumb.classList.remove('active'));
  element.classList.add('active');
}

function selectDetailSize(productId, size) {
  selectedSizes[productId] = size;
  
  const sizeBoxes = document.querySelectorAll(`.detail-size-box`);
  sizeBoxes.forEach(box => {
    box.classList.remove('selected');
    if (box.textContent.trim() === size) {
      box.classList.add('selected');
    }
  });
}

function showReviewForm(productId) {
  showToast({
    title: "Reseñas",
    message: "Función de reseñas próximamente disponible",
    type: "info"
  });
}

function openSizeHelp() {
  showToast({
    title: "Ayuda con tallas",
    message: "Contáctanos para asesoramiento personalizado",
    type: "info"
  });
}

function buyNowProduct(productId) {
  const product = products.find(p => p.id === productId);
  const size = selectedSizes[productId];
  
  if (!size && product.sizes && product.sizes.length > 0) {
    showToast({
      title: "Selecciona una talla",
      message: "Por favor, elige una talla antes de continuar",
      type: "warning"
    });
    return;
  }
  
  addToCartFromDetail(productId);
  closeProductDetail();
  setTimeout(() => {
    window.location.href = '../paginas/compra.html';
  }, 300);
}

function addToCartFromDetail(productId) {
  const product = products.find(p => p.id === productId);
  const size = selectedSizes[productId];

  if (!size && product.sizes && product.sizes.length > 0) {
    showToast({
      title: "Selecciona una talla",
      message: "Elige una talla antes de agregar al carrito",
      type: "warning"
    });
    return;
  }

  if (product.stock <= 0) {
    showToast({
      title: "Producto agotado",
      message: "Lo sentimos, este producto no está disponible",
      type: "error"
    });
    return;
  }

  const cartId = `${productId}-${size || 'default'}`;
  const existing = cart.find(i => i.cartId === cartId);

  if (existing) {
    existing.quantity++;
  } else {
    cart.push({ 
      ...product, 
      selectedSize: size || 'Única',
      cartId, 
      quantity: 1 
    });
  }

  product.stock--;
  saveCart();
  renderCart();
  renderProducts();
  
  showToast({
    title: "¡Agregado al carrito!", 
    message: `${product.name}${size ? ' (Talla ' + size + ')' : ''}`, 
    type: "success"
  });
}

function editProduct(id) {
  event.stopPropagation();
  const product = products.find(p => p.id === id);
  if (product) {
    openProductModal(product);
  }
}

// === EVENT LISTENERS ===
document.getElementById('cartBtnHeader').onclick = () => document.getElementById('cartOverlay').classList.add('active');
document.getElementById('favBtnHeader').onclick = () => {
  document.getElementById('favoritesOverlay').classList.add('active');
  document.querySelector('.fav-sidebar').classList.add('active');
};

document.getElementById('openFavoritesFromMenu').onclick = (e) => {
  e.preventDefault();
  dropdownMenu.classList.remove('show');
  document.getElementById('favoritesOverlay').classList.add('active');
  document.querySelector('.fav-sidebar').classList.add('active');
};

document.getElementById("closeFavorites").onclick = () => {
  document.getElementById('favoritesOverlay').classList.remove('active');
  document.querySelector('.fav-sidebar').classList.remove('active');
};

document.querySelectorAll(".overlay").forEach(o => o.onclick = e => { 
  if (e.target === o) {
    o.classList.remove("active");
    if (o.id === 'favoritesOverlay') {
      document.querySelector('.fav-sidebar').classList.remove('active');
    }
  }
});

document.getElementById("addProductBtnIcon").onclick = () => openProductModal();

document.getElementById("productImages").addEventListener("change", function(e) {
  const files = Array.from(e.target.files);
  const remaining = 6 - newProductImages.length;
  
  if (files.length > remaining) {
    showToast({
      title: "Límite de imágenes",
      message: `Solo puedes agregar ${remaining} más.`,
      type: "warning"
    });
    return;
  }
  
  files.forEach(file => {
    const reader = new FileReader();
    reader.onload = ev => {
      newProductImages.push(ev.target.result);
      renderImagesPreview();
    };
    reader.readAsDataURL(file);
  });
});

// === INICIALIZAR ===
renderCategories();
renderProducts();
renderCart();
renderFavorites();
updateFavBadges();
renderSizes();
renderImagesPreview();

// Año actual en el footer
document.getElementById('currentYear').textContent = new Date().getFullYear();

// Cerrar página de detalle con ESC
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    if (document.getElementById('productDetail').classList.contains('active')) {
      closeProductDetail();
    }
    if (document.getElementById('productModal').classList.contains('active')) {
      closeProductModal();
    }
  }
});

// Cerrar dropdown cuando se hace clic fuera
document.addEventListener('click', (e) => {
  if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
    dropdownMenu.classList.remove('show');
  }
});