// DATOS DE PRODUCTOS Y CATEGORÍAS
// Sofia #15: Datos completos y válidos - cada producto tiene imagen, nombre, categoría y precio 
const products = [
  { 
    id: 1, 
    name: "Conjunto Deportivo", 
    category: "Niños", 
    subcategory: "Edición Especial", 
    price: 89990, 
    description: "Elegancia casual en su máxima expresión. Presentamos este conjunto deportivo de dos piezas perfecto para los peques que quieren verse modernos y sentirse cómodos todo el día.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninos/Frente Conjunto Deportivo.png"], 
    stock: 15, 
    rating: 4.5, 
    reviews: 28, 
    features: ["Material: 100% Algodón","Lavable a máquina","Ideal para uso diario","Diseño unisex"] 
  },
  { 
    id: 2, 
    name: "Conjunto Size", 
    category: "Niños", 
    subcategory: "Popular", 
    price: 79990, 
    description: "Conjunto moderno y cómodo para niños con tallas variadas.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninos/Frente Conjunto Size.png"], 
    stock: 8, 
    rating: 4.2, 
    reviews: 15, 
    features: ["Material: Poliéster y algodón","Lavable a máquina","Secado rápido"] 
  },
  { 
    id: 3, 
    name: "Body Niño", 
    category: "Niños", 
    subcategory: "Niño", 
    price: 34990, 
    description: "Body cómodo y práctico para bebés y niños pequeños.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninos/Frente Body Niño.png"], 
    stock: 20, 
    rating: 4.7, 
    reviews: 42, 
    features: ["100% Algodón orgánico","Broches en la entrepierna","Sin etiquetas irritantes"] 
  },
  { 
    id: 4, 
    name: "Jogger Niño", 
    category: "Niños", 
    subcategory: "Niño", 
    price: 49990, 
    description: "Pantalones jogger cómodos y modernos para niños.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninos/Frente Jogger.png"], 
    stock: 5, 
    rating: 4.3, 
    reviews: 19, 
    features: ["Material: Jersey de algodón","Cintura elástica","Bolsillos laterales"] 
  },
  { 
    id: 5, 
    name: "Set Bebé", 
    category: "Bebés", 
    subcategory: "Edición especial", 
    price: 99990, 
    description: "Set completo para bebés recién nacidos. Incluye body, pantalón y gorrito.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/bebe/Frente Set Bebe.png"], 
    stock: 0, 
    rating: 4.8, 
    reviews: 36, 
    features: ["Material hipoalergénico","Set de 3 piezas","Ideal para recién nacidos"] 
  },
  { 
    id: 6, 
    name: "Conjunto Infantil", 
    category: "Niñas", 
    subcategory: "Niña", 
    price: 85990, 
    description: "Conjunto elegante y divertido para niñas.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninas/Frente Conjunto Infantil.png"], 
    stock: 12, 
    rating: 4.6, 
    reviews: 31, 
    features: ["Estampado exclusivo","Material: Algodón y elastano","Comodidad máxima"] 
  },
  { 
    id: 7, 
    name: "Body Negro", 
    category: "Niños", 
    subcategory: "Popular", 
    price: 32990, 
    description: "Body negro básico para niños. Versátil y fácil de combinar.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninas/Frente Body Negro.png"], 
    stock: 3, 
    rating: 4.4, 
    reviews: 23, 
    features: ["Color negro clásico","100% Algodón","Broches de metal"] 
  },
  { 
    id: 8, 
    name: "Set Falda", 
    category: "Niñas", 
    subcategory: "Popular", 
    price: 89990, 
    description: "Set con falda para niñas. Incluye falda y top a juego.", 
    sizes: ["2","4","6","8"], 
    imgs: ["assets/imagenes/ninas/Frente Set Falda.png"], 
    stock: 7, 
    rating: 4.9, 
    reviews: 47, 
    features: ["Falda con vuelo","Top a juego","Material ligero"] 
  }
];

// Cargar categorías desde localStorage
let categories = JSON.parse(localStorage.getItem('angelow_client_categories')) || ["Todos","Bebés","Niños","Niñas","Popular","Edición especial","Oferta"];

// Variables globales
let cart = JSON.parse(localStorage.getItem("angelow_cart")) || [];
// Sofia #14: Lista de favoritos del usuario (sincronizada por usuario)
let favorites = JSON.parse(localStorage.getItem("angelow_favorites")) || [];
let activeCategory = "Todos";
let selectedSizes = {};
let searchQuery = "";
let currentUser = null;

const saveCart = () => localStorage.setItem("angelow_cart", JSON.stringify(cart));
const saveFavorites = () => localStorage.setItem("angelow_favorites", JSON.stringify(favorites));
const saveUser = () => localStorage.setItem("angelow_user", JSON.stringify(currentUser));

function loadCategories() {
  const storedCategories = localStorage.getItem('angelow_client_categories');
  if (storedCategories) {
    categories = JSON.parse(storedCategories);
    if (!categories.includes("Todos")) {
      categories = ["Todos", ...categories];
    }
  }
  renderCategories();
}

window.addEventListener('storage', function(e) {
  if (e.key === 'angelow_client_categories') {
    loadCategories();
  }
});

function showToast({title, message, type = "info", duration = 4000}) {
  const container = document.getElementById("toastContainer");
  const toast = document.createElement("div");
  toast.className = `toast ${type}`;
  
  const icons = { 
    success: '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>', 
    warning: '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>', 
    error: '<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>', 
    info: '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>' 
  };
  
  toast.innerHTML = `
    <div class="toast-icon">${icons[type]}</div>
    <div class="toast-content">
      ${title ? `<div class="toast-title">${title}</div>` : ''}
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

function loadUser() {
  if (window.phpUser && window.phpUser !== null) {
    currentUser = window.phpUser;
    saveUser();
     // Sofia #14: Carga los favoritos específicos del usuario desde localStorage (sincronización por usuario)
    const userFavs = localStorage.getItem(`angelow_favorites_${currentUser.id}`);
    if (userFavs && !localStorage.getItem('angelow_favorites')) {
      localStorage.setItem('angelow_favorites', userFavs);
      favorites = JSON.parse(userFavs);
      updateFavBadges();
    }
  } else {
    const savedUser = localStorage.getItem("angelow_user");
    if (savedUser) {
      try {
        currentUser = JSON.parse(savedUser);
      } catch (e) {
        currentUser = null;
      }
    } else {
      currentUser = null;
    }
  }
  updateUserUI();
}

function updateUserUI() {
  const loginLink = document.getElementById('loginLink');
  const dropdownMenu = document.getElementById('dropdownMenu');
  
  if (currentUser) {
    const isAdmin = currentUser.rol === 'administrador';
    
    if (isAdmin) {
      loginLink.textContent = 'Administración';
 loginLink.href = APP_URL + '/admin';
    } else {
      loginLink.textContent = 'Mi cuenta';
      loginLink.href = APP_URL + '/perfil';
    }
    loginLink.onclick = null;
    
    // Eliminar elementos existentes para evitar duplicados
    const existingLogout = document.querySelector('.dropdown-item.logout-item');
    if (existingLogout) existingLogout.remove();
    
    // Ya NO se crea el enlace "Administración"
    
    const logoutItem = document.createElement('a');
    logoutItem.href = '#';
    logoutItem.className = 'dropdown-item logout-item';
    logoutItem.innerHTML = '<i class="fas fa-sign-out-alt"></i> Cerrar sesión';
    logoutItem.onclick = (e) => {
      e.preventDefault();
      logout();
    };
    dropdownMenu.appendChild(logoutItem);
    
  } else {
    loginLink.textContent = 'Iniciar sesión';
    loginLink.href = '#';
    loginLink.onclick = (e) => {
      e.preventDefault();
      const redirect = encodeURIComponent(window.location.pathname);
      window.location.href = APP_URL + `/auth/login?redirect=${redirect}`;
    };
    
    const logoutItem = document.querySelector('.dropdown-item.logout-item');
    if (logoutItem) logoutItem.remove();
  }
}

function logout() {
  if (currentUser && currentUser.id) {
    localStorage.setItem(`angelow_favorites_${currentUser.id}`, JSON.stringify(favorites));
  }
  
  currentUser = null;
  localStorage.removeItem("angelow_user");
  
  favorites = [];
  saveFavorites();
  updateFavBadges();
  
  updateUserUI();
  updateFavBadges();
  renderProducts();
  renderFavorites();
  
  showToast({
    title: "Sesión cerrada",
    message: "Has cerrado sesión correctamente",
    type: "success"
  });
  
  setTimeout(() => {
    window.location.href = APP_URL + '/auth/logout';
  }, 1500);
}

function requireAuth(action, callback) {
  if (!currentUser) {
    showToast({
      title: "Inicia sesión",
      message: "Debes iniciar sesión para " + action,
      type: "warning"
    });
    window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent(window.location.pathname)}`;
    return false;
  }
  return callback();
}

// Sofia #9: Filtro por nombre y/o categoría/subcategoría con coincidencias parciales
// Sofia #15: Filtrado unificado - consistencia en resultados por categoría y búsqueda
function getFilteredProducts() {
  return products.filter(p => {
    // Sofia #9: Filtro por categoría activa (incluye "Popular","Edición especial","Oferta" como subcategorías)
    if (activeCategory !== "Todos") {
      if (["Popular","Edición especial","Oferta"].includes(activeCategory)) {
        return p.subcategory === activeCategory;
      } else {
        return p.category === activeCategory;
      }
    }
    return true;
  }).filter(p => {
    if (!searchQuery) return true;
        // Sofia #9: Coincidencia parcial en nombre, categoría o subcategoría
    return p.name.toLowerCase().includes(searchQuery) || 
           p.category.toLowerCase().includes(searchQuery) || 
           p.subcategory.toLowerCase().includes(searchQuery);
  });
}

function renderCategories() {
  let html = [...categories, ...categories, ...categories].map(c => 
    `<span class="cat-item ${activeCategory === c ? 'active' : ''}" onclick="setCategory('${c}')">${c}</span>`
  ).join("");
  document.getElementById("categoriesList").innerHTML = html;
}

// Sofia #15: Renderizado consistente - muestra imagen, nombre, categoría y precio en catálogo, búsqueda y filtros
// Sofia #13: Cada producto tiene campo 'stock' que define disponibilidad
function renderProducts() {
  const grid = document.getElementById("productsGrid");
  const filtered = getFilteredProducts();
  
  // Sofia #9: Manejo de cero resultados - muestra mensaje claro al usuario
  if (filtered.length === 0) {
    grid.innerHTML = `
      <div class="no-results">
        <p>No se encontraron productos${searchQuery ? ` para "<strong>${document.getElementById('searchInput').value}</strong>"` : ""}</p>
        <p>Prueba con otros términos</p>
      </div>
    `;
    return;
  }
  
  grid.innerHTML = filtered.map(p => {
// Sofia #13: Visualización clara del estado de stock
    let stockClass = p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out';
    let stockText = p.stock > 10 ? 'En stock' : p.stock > 0 ? `Solo ${p.stock} left` : 'Sin stock';
    
 // Sofia #15: Información mínima obligatoria: imagen, nombre, categoría (subcategory/category) y precio
    return `
      <div class="card-container" onclick="openProductDetail(${p.id})">
        <div class="card">
          <div class="my-logo"><img src="${APP_URL}/assets/imagenes/general/logos.png"></div>
          <img src="${p.imgs[0]}" class="product-img">
          <h2>${p.name}</h2>
          <p>${p.subcategory}</p>
          <div class="stock-info ${stockClass}">${stockText}</div>
        </div>
        
        <div class="modal">
          <div class="my-logo"><img src="${APP_URL}/assets/imagenes/general/logos.png"></div>
          <h3>${p.name}</h3>
          <p class="subtitle">conjunto ${p.category}</p>
          
          <div class="sizes">
            ${p.sizes.map(s => `
              <div class="size-box ${selectedSizes[p.id] === s ? 'selected' : ''}" 
                   onclick="event.stopPropagation(); selectSize(${p.id},'${s}')">${s}</div>
            `).join("")}
          </div>
          
          <div class="price">COP $${p.price.toLocaleString()}</div>
          <div class="stock-info ${stockClass}" style="margin:8px 0;">${stockText}</div>
          
          <div class="buttons">
            <button class="buy-btn ${p.stock === 0 ? 'disabled' : ''}" 
                    ${p.stock === 0 ? 'disabled' : ''} 
                    onclick="event.stopPropagation(); addToCart(${p.id})">Comprar</button>
            <button class="fav-btn ${favorites.includes(p.id) ? 'active' : ''}" 
                    onclick="event.stopPropagation(); toggleFavorite(${p.id})">
              <img src="${APP_URL}/assets/imagenes/general/favoritos.png">
            </button>
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

function selectSize(id, size) { 
  event.stopPropagation(); 
  selectedSizes[id] = size; 
  renderProducts(); 
}

function renderCart() {
  const container = document.getElementById("cartItems");
  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  
  document.getElementById("total").textContent = `COP $${total.toLocaleString()}`;
  document.getElementById("cartCount").textContent = totalItems;
  document.getElementById("cartCount").style.display = totalItems ? "flex" : "none";
  
  if (cart.length === 0) {
    container.innerHTML = `<div style="text-align:center;padding:100px 20px;">Tu carrito está vacío</div>`;
    return;
  }
  
  container.innerHTML = cart.map(item => `
    <div class="cart-item">
      <img src="${item.imgs[0]}">
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
  `).join("");
}

function addToCart(pid) {
  event.stopPropagation();
  let p = products.find(p => p.id === pid);
    // Sofia #13: Validación de stock antes de agregar al carrito
  if (p.stock <= 0) {
    showToast({ title: "Sin stock", message: "Producto no disponible", type: "error" });
    return;
  }
  
  let size = selectedSizes[pid];
  if (!size) {
    showToast({ title: "Selecciona talla", message: "Elige una talla", type: "warning" });
    return;
  }
  
  let cartId = `${pid}-${size}`;
  let existing = cart.find(i => i.cartId === cartId);
  
  if (existing && existing.quantity + 1 > p.stock) {
    showToast({ title: "Stock insuficiente", message: "No hay suficientes unidades", type: "warning" });
    return;
  }
  
  if (existing) {
    existing.quantity++;
  } else {
    cart.push({ ...p, selectedSize: size, cartId, quantity: 1 });
  }
  
  p.stock -= 1;
  saveCart();
  renderProducts();
  renderCart();
  showToast({ title: "Agregado!", message: `${p.name} (Talla ${size})`, type: "success" });
}

function removeFromCart(cartId) {
  let item = cart.find(i => i.cartId === cartId);
  if (!item) return;
  
  let p = products.find(p => p.id === item.id);
  if (p) p.stock += item.quantity;
  
  cart = cart.filter(i => i.cartId !== cartId);
  saveCart();
  renderCart();
  renderProducts();
  showToast({ message: `${item.name} eliminado`, type: "info" });
}

function updateQty(cartId, delta) {
  let item = cart.find(i => i.cartId === cartId);
  if (!item) return;
  
  let p = products.find(p => p.id === item.id);
  let newQty = item.quantity + delta;
  
  if (newQty < 1) {
    removeFromCart(cartId);
    return;
  }
    // Sofia #13: Verifica stock disponible al incrementar cantidad
  if (newQty > p.stock) {
    showToast({ title: "Stock insuficiente", type: "warning" });
    return;
  }
  
  p.stock -= delta;
  item.quantity = newQty;
  saveCart();
  renderCart();
  renderProducts();
}

function openCart() { 
  document.getElementById('cartOverlay').classList.add('active'); 
}

function closeCart() { 
  document.getElementById('cartOverlay').classList.remove('active'); 
}

function proceedToCheckout() {
  if (!currentUser) {
    showToast({
      title: "Inicia sesión",
      message: "Debes iniciar sesión para finalizar tu compra",
      type: "warning"
    });
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent('/compra')}`;
  } else {
    window.location.href = APP_URL + '/compra';
  }
}

// Sofia #14: Actualiza los contadores visibles en header, menú y panel de favoritos
function updateFavBadges() {
  let count = favorites.length;
  document.getElementById('favBadge').textContent = count;
  document.getElementById('favHeaderBadge').textContent = count;
  document.getElementById('favTotal').textContent = count;
  
  document.getElementById('favBadge').style.display = count ? 'flex' : 'none';
  document.getElementById('favHeaderBadge').style.display = count ? 'flex' : 'none';
}

function toggleFavorite(id) {
  if (!currentUser) {
    showToast({ 
      title: "Inicia sesión", 
      message: "Debes iniciar sesión para agregar a favoritos", 
      type: "warning" 
    });
    localStorage.setItem("angelow_pending_favorite", id);
    window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent(window.location.pathname)}`;
    return;
  }
  
  let p = products.find(p => p.id === id);
  
  if (favorites.includes(id)) {
    favorites = favorites.filter(x => x !== id);
    showToast({ title: "Eliminado", message: `${p.name} eliminado de favoritos`, type: "info" });
  } else {
    favorites.push(id);
    showToast({ title: "Añadido!", message: `${p.name} agregado a favoritos`, type: "success" });
  }
  
  saveFavorites();
  
  if (currentUser && currentUser.id) {
    localStorage.setItem(`angelow_favorites_${currentUser.id}`, JSON.stringify(favorites));
  }
  
  // Sofia #14: Actualización en tiempo real al agregar/eliminar favorito
  updateFavBadges();
  renderProducts();
  renderFavorites();
}

function renderFavorites() {
  let list = document.getElementById('favoritesList');
  let favProducts = products.filter(p => favorites.includes(p.id));
  
  if (favProducts.length === 0) {
    list.innerHTML = `
      <div class="fav-empty-state">
        <div class="fav-empty-text">No tienes productos en favoritos</div>
        <p style="color:var(--text-secondary);margin-bottom:30px;">
          Guarda tus productos favoritos para verlos aquí
        </p>
        <button class="fav-empty-btn" onclick="closeFavorites()">Seguir comprando</button>
      </div>
    `;
    return;
  }
  
    // Sofia #13: También muestra disponibilidad en el panel de favoritos
  list.innerHTML = favProducts.map(p => `
    <div class="fav-item">
      <img src="${p.imgs[0]}" class="fav-item-img">
      <div class="fav-item-info">
        <h4>${p.name}</h4>
        <span>${p.category} • ${p.subcategory}</span>
        <div style="font-weight:700;font-size:18px;color:var(--primary);margin-top:6px;">
          COP $${p.price.toLocaleString()}
        </div>
        <div class="fav-item-stock ${p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out'}">
          ${p.stock > 10 ? 'En stock' : p.stock > 0 ? 'Pocas unidades' : 'Agotado'}
        </div>
      </div>
      <div class="fav-actions">
        <button class="fav-remove-btn" onclick="toggleFavorite(${p.id})">×</button>
        <button class="add-to-cart-btn" onclick="addFavoriteToCart(${p.id})" ${p.stock === 0 ? 'disabled' : ''}>
          Carrito
        </button>
      </div>
    </div>
  `).join('');
}

function addFavoriteToCart(id) {
  let p = products.find(p => p.id === id);
  if (p.stock <= 0) {
    showToast({ title: "Agotado", message: `${p.name} sin stock`, type: "error" });
    return;
  }
  
  let size = p.sizes[0];
  let cartId = `${id}-${size}`;
  let existing = cart.find(i => i.cartId === cartId);
  
  if (existing) {
    existing.quantity++;
  } else {
    cart.push({ ...p, selectedSize: size, cartId, quantity: 1 });
  }
  
  p.stock--;
  saveCart();
  renderCart();
  renderFavorites();
  showToast({ title: "Agregado!", message: `${p.name} desde favoritos`, type: "success" });
}

function openFavorites() {
  if (!currentUser) {
    showToast({ 
      title: "Inicia sesión", 
      message: "Debes iniciar sesión para ver favoritos", 
      type: "warning" 
    });
    window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent(window.location.pathname)}`;
    return;
  }
  document.getElementById('favoritesOverlay').classList.add('active');
  renderFavorites();
}

function closeFavorites() { 
  document.getElementById('favoritesOverlay').classList.remove('active'); 
}

function openProductDetail(id) {
  let p = products.find(p => p.id === id);
  if (!p) return;
  
  let stars = '★'.repeat(Math.floor(p.rating)) + '☆'.repeat(5 - Math.floor(p.rating));
  
  document.getElementById('productDetailContent').innerHTML = `
    <div class="detail-container">
      <div class="detail-images">
        <img src="${p.imgs[0]}" class="detail-main-image" id="detailMainImage">
        <div class="detail-image-thumbnails">
          ${p.imgs.map((img, i) => `
            <img src="${img}" class="detail-thumbnail ${i === 0 ? 'active' : ''}" 
                 onclick="document.getElementById('detailMainImage').src='${img}';
                          document.querySelectorAll('.detail-thumbnail').forEach(t => t.classList.remove('active'));
                          this.classList.add('active')">
          `).join('')}
        </div>
      </div>
      
      <div class="detail-info">
        <div class="detail-category">${p.category}</div>
        <h1 class="detail-name">${p.name}</h1>
        <p class="detail-description">${p.description}</p>
        
        <div class="detail-rating">
          <div class="stars">${stars}</div>
          <span class="rating-text">${p.reviews || 0} reseñas</span>
          <a href="#" class="rating-link" onclick="event.preventDefault(); showToast({title:'Reseñas',message:'Función próximamente',type:'info'})">
            Dejar tu reseña
          </a>
        </div>
        
        <div class="detail-prices">
          <span class="detail-price">COP $${p.price.toLocaleString()}</span>
        </div>
        
        <div class="detail-size-section">
          <div class="detail-size-title">Talla</div>
          <div class="detail-sizes">
            ${p.sizes.map(s => `
              <div class="detail-size-box ${selectedSizes[p.id] === s ? 'selected' : ''}" 
                   onclick="selectedSizes[${p.id}]='${s}';
                            this.parentElement.querySelectorAll('.detail-size-box').forEach(b => b.classList.remove('selected'));
                            this.classList.add('selected')">
                ${s}
              </div>
            `).join('')}
          </div>
          <div class="size-help">
            <a href="#" class="size-help-link" onclick="event.preventDefault(); showToast({title:'Ayuda',message:'Contáctanos para asesoramiento',type:'info'})">
              ¿No encuentras tu talla? Te ayudamos
            </a>
          </div>
        </div>
        
        <div class="detail-ref">REF: ${p.id}</div>
        
        <div class="detail-actions">
          <button class="detail-action-btn detail-buy-now" onclick="buyNowProduct(${p.id})">
            COMPRAR AHORA
          </button>
          <button class="detail-action-btn detail-add-cart" onclick="addToCartFromDetail(${p.id})">
            AGREGAR AL CARRITO
          </button>
        </div>
        
        <div class="detail-shipping-info">
          <div class="shipping-title">Envío y Devoluciones</div>
          <div class="shipping-item">
            <span style="color:#00a650">✓</span>Envío gratis en pedidos > $58.900
          </div>
          <div class="shipping-item">
            <span style="color:#00a650">✓</span>Devoluciones gratuitas
          </div>
          <div class="shipping-item">
            <span style="color:#00a650">✓</span>Entrega estimada: 5-10 días
          </div>
        </div>
        
        <div class="detail-specs">
          <div class="specs-title">Descripción</div>
          <div class="specs-list">
            ${(p.features || ['Material de alta calidad','Diseño exclusivo','Comodidad garantizada']).map(f => `
              <div class="spec-item">${f}</div>
            `).join('')}
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

function buyNowProduct(id) {
  let p = products.find(p => p.id === id);
  let size = selectedSizes[id];
  
  if (!size && p.sizes?.length) {
    showToast({ title: "Selecciona talla", message: "Elige una talla", type: "warning" });
    return;
  }
  
  addToCartFromDetail(id);
  closeProductDetail();
  
  if (!currentUser) {
    showToast({
      title: "Inicia sesión",
      message: "Debes iniciar sesión para finalizar tu compra",
      type: "warning"
    });
    setTimeout(() => window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent('/compra')}`, 500);
  } else {
    setTimeout(() => window.location.href = APP_URL + '/compra', 300);
  }
}

function addToCartFromDetail(id) {
  let p = products.find(p => p.id === id);
  let size = selectedSizes[id];
  
  if (!size && p.sizes?.length) {
    showToast({ title: "Selecciona talla", message: "Elige una talla", type: "warning" });
    return;
  }
    // Sofia #13: Misma validación en detalle del producto
  if (p.stock <= 0) {
    showToast({ title: "Agotado", message: "Producto no disponible", type: "error" });
    return;
  }
  
  let cartId = `${id}-${size || 'default'}`;
  let existing = cart.find(i => i.cartId === cartId);
  
  if (existing) {
    existing.quantity++;
  } else {
    cart.push({ ...p, selectedSize: size || 'Única', cartId, quantity: 1 });
  }
  
  p.stock--;
  saveCart();
  renderCart();
  renderProducts();
  showToast({ 
    title: "Agregado!", 
    message: `${p.name}${size ? ' (Talla ' + size + ')' : ''}`, 
    type: "success" 
  });
}

// Sofia #9: Búsqueda dinámica - actualiza resultados en tiempo real mientras el usuario escribe
document.getElementById('searchInput').addEventListener('input', e => {
  searchQuery = e.target.value.toLowerCase().trim();
  document.getElementById('clearSearch').style.display = searchQuery ? 'block' : 'none';
  renderProducts();
});

document.getElementById('clearSearch').onclick = () => {
  document.getElementById('searchInput').value = '';
  searchQuery = '';
  document.getElementById('clearSearch').style.display = 'none';
  document.getElementById('searchInput').focus();
  renderProducts();
};

document.getElementById('cartBtnHeader').onclick = openCart;
document.getElementById('favBtnHeader').onclick = openFavorites;

document.getElementById('openFavoritesFromMenu').onclick = (e) => {
  e.preventDefault();
  const dropdownMenu = document.getElementById('dropdownMenu');
  dropdownMenu.classList.remove('show');
  openFavorites();
};

document.getElementById('closeFavorites').onclick = closeFavorites;

document.querySelectorAll('.overlay').forEach(o => {
  o.onclick = e => {
    if (e.target === o) o.classList.remove('active');
  };
});

document.getElementById('profileBtn').addEventListener('click', (e) => {
  e.stopPropagation();
  document.getElementById('dropdownMenu').classList.toggle('show');
});

document.addEventListener('click', () => {
  document.getElementById('dropdownMenu').classList.remove('show');
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && document.getElementById('productDetail').classList.contains('active')) {
    closeProductDetail();
  }
});

document.getElementById('currentYear').textContent = new Date().getFullYear();

function checkPendingFavorite() {
  const pendingFavorite = localStorage.getItem("angelow_pending_favorite");
  if (pendingFavorite && currentUser) {
    const id = parseInt(pendingFavorite);
    if (!favorites.includes(id)) {
      favorites.push(id);
      saveFavorites();
      if (currentUser.id) {
        localStorage.setItem(`angelow_favorites_${currentUser.id}`, JSON.stringify(favorites));
      }
      updateFavBadges();
      renderProducts();
      showToast({ title: "Favorito guardado!", message: "El producto se agregó a tus favoritos", type: "success" });
    }
    localStorage.removeItem("angelow_pending_favorite");
  }
}

// Inicialización
loadUser();
loadCategories();
renderCategories();
renderProducts();
renderCart();
renderFavorites();
updateFavBadges();
checkPendingFavorite();