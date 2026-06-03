// ======================== DATOS DE PRODUCTOS Y CATEGORÍAS ========================
// Sofia #15: Datos completos y válidos - cada producto tiene imagen, nombre, categoría y precio 
const products = [
  { id: 1, name: "Conjunto Deportivo", category: "Niños", subcategory: "Edición Especial", price: 89990, description: "Elegancia casual en su máxima expresión. Presentamos este conjunto deportivo de dos piezas perfecto para los peques que quieren verse modernos y sentirse cómodos todo el día.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninos/Frente Conjunto Deportivo.png"], stock: 15, rating: 4.5, reviews: 28, features: ["Material: 100% Algodón","Lavable a máquina","Ideal para uso diario","Diseño unisex"] },
  { id: 2, name: "Conjunto Size", category: "Niños", subcategory: "Popular", price: 79990, description: "Conjunto moderno y cómodo para niños con tallas variadas.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninos/Frente Conjunto Size.png"], stock: 8, rating: 4.2, reviews: 15, features: ["Material: Poliéster y algodón","Lavable a máquina","Secado rápido"] },
  { id: 3, name: "Body Niño", category: "Niños", subcategory: "Niño", price: 34990, description: "Body cómodo y práctico para bebés y niños pequeños.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninos/Frente Body Niño.png"], stock: 20, rating: 4.7, reviews: 42, features: ["100% Algodón orgánico","Broches en la entrepierna","Sin etiquetas irritantes"] },
  { id: 4, name: "Jogger Niño", category: "Niños", subcategory: "Niño", price: 49990, description: "Pantalones jogger cómodos y modernos para niños.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninos/Frente Jogger.png"], stock: 5, rating: 4.3, reviews: 19, features: ["Material: Jersey de algodón","Cintura elástica","Bolsillos laterales"] },
  { id: 5, name: "Set Bebé", category: "Bebés", subcategory: "Edición especial", price: 99990, description: "Set completo para bebés recién nacidos. Incluye body, pantalón y gorrito.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/bebe/Frente Set Bebe.png"], stock: 0, rating: 4.8, reviews: 36, features: ["Material hipoalergénico","Set de 3 piezas","Ideal para recién nacidos"] },
  { id: 6, name: "Conjunto Infantil", category: "Niñas", subcategory: "Niña", price: 85990, description: "Conjunto elegante y divertido para niñas.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninas/Frente Conjunto Infantil.png"], stock: 12, rating: 4.6, reviews: 31, features: ["Estampado exclusivo","Material: Algodón y elastano","Comodidad máxima"] },
  { id: 7, name: "Body Negro", category: "Niños", subcategory: "Popular", price: 32990, description: "Body negro básico para niños. Versátil y fácil de combinar.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninas/Frente Body Negro.png"], stock: 3, rating: 4.4, reviews: 23, features: ["Color negro clásico","100% Algodón","Broches de metal"] },
  { id: 8, name: "Set Falda", category: "Niñas", subcategory: "Popular", price: 89990, description: "Set con falda para niñas. Incluye falda y top a juego.", sizes: ["2","4","6","8"], imgs: ["assets/imagenes/ninas/Frente Set Falda.png"], stock: 7, rating: 4.9, reviews: 47, features: ["Falda con vuelo","Top a juego","Material ligero"] }
];

// Cargar categorías desde localStorage
let categories = JSON.parse(localStorage.getItem('angelow_client_categories')) || ["Todos","Bebés","Niños","Niñas","Popular","Edición especial","Oferta"];

// ======================== VARIABLES GLOBALES ========================
let cart = [];
let favorites = [];
let activeCategory = "Todos";
let selectedSizes = {};
let searchQuery = "";
let currentUser = null;

// ======================== FUNCIONES PARA SESIÓN INVITADO Y API ========================
function getSessionId() {
    let sessionId = localStorage.getItem('cart_session_id');
    if (!sessionId) {
        sessionId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        localStorage.setItem('cart_session_id', sessionId);
        document.cookie = `cart_session=${sessionId}; path=/`;
    }
    return sessionId;
}

async function apiFetch(url, options = {}) {
    try {
        const response = await fetch(url, {
            ...options,
            headers: { 'Content-Type': 'application/json', ...options.headers },
            credentials: 'same-origin'
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.message || 'Error en la petición');
        return data;
    } catch (error) {
        console.error('API Error:', error);
        showToast({ title: 'Error', message: error.message, type: 'error' });
        throw error;
    }
}

// ---------- CARRITO ----------
async function loadCartFromServer() {
    try {
        const data = await apiFetch(`${APP_URL}/api/carrito`);
        if (data.success) {
            cart = data.cart;
            renderCart();
            updateCartBadge();
        }
    } catch (e) { 
        // Fallback a localStorage para invitado
        const localCart = JSON.parse(localStorage.getItem("angelow_cart")) || [];
        if (localCart.length) cart = localCart;
        renderCart();
    }
}

function updateCartBadge() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartCountElem = document.getElementById("cartCount");
    if (cartCountElem) {
        cartCountElem.textContent = totalItems;
        cartCountElem.style.display = totalItems ? "flex" : "none";
    }
}

// ---------- FAVORITOS (ahora con soporte completo para invitado) ----------
// Guardar favoritos en localStorage (usado en modo invitado)
function saveFavoritesToLocal() {
    localStorage.setItem("angelow_favorites", JSON.stringify(favorites));
}

// Cargar favoritos desde localStorage (modo invitado)
function loadFavoritesFromLocal() {
    const localFavs = JSON.parse(localStorage.getItem("angelow_favorites"));
    favorites = (localFavs && Array.isArray(localFavs)) ? localFavs : [];
    updateFavBadges();
    renderFavorites();
    renderProducts();
}

// Cargar favoritos desde el servidor (cuando hay usuario logueado)
async function loadFavoritesFromServer() {
    if (!currentUser) {
        loadFavoritesFromLocal();
        return;
    }
    try {
        const data = await apiFetch(`${APP_URL}/api/favoritos`);
        if (data.success) {
            favorites = data.favoritos;
            // Respaldo local por si falla la conexión después
            localStorage.setItem("angelow_favorites", JSON.stringify(favorites));
            updateFavBadges();
            renderFavorites();
            renderProducts();
        }
    } catch (e) {
        // Si falla la API, usar localStorage
        loadFavoritesFromLocal();
    }
}

// Sincronizar favoritos locales al servidor (al hacer login)
async function syncLocalFavoritesToServer() {
    if (!currentUser) return;
    const localFavs = JSON.parse(localStorage.getItem("angelow_favorites")) || [];
    if (localFavs.length === 0) return;
    
    for (const productId of localFavs) {
        if (!favorites.includes(productId)) {
            try {
                await apiFetch(`${APP_URL}/api/favoritos/agregar`, {
                    method: 'POST',
                    body: JSON.stringify({ producto_id: productId })
                });
            } catch(e) { console.error("Error sync fav", productId); }
        }
    }
    // Recargar desde servidor para tener la lista definitiva
    await loadFavoritesFromServer();
    // Limpiar localStorage de invitado ya que ahora está en servidor
    localStorage.removeItem("angelow_favorites");
}

// ======================== TOAST NOTIFICATIONS ========================
function showToast({title, message, type = "info", duration = 4000}) {
  const container = document.getElementById("toastContainer");
  if (!container) return;
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

// ======================== FUNCIONES DE USUARIO ========================
function loadCategories() {
  const storedCategories = localStorage.getItem('angelow_client_categories');
  if (storedCategories) {
    categories = JSON.parse(storedCategories);
    if (!categories.includes("Todos")) categories = ["Todos", ...categories];
  }
  renderCategories();
}
window.addEventListener('storage', e => { if (e.key === 'angelow_client_categories') loadCategories(); });

function loadUser() {
  if (window.phpUser && window.phpUser !== null) {
    const wasLoggedOut = !currentUser;
    currentUser = window.phpUser;
    if (wasLoggedOut) {
      // Al iniciar sesión: sincronizar carrito invitado y favoritos locales
      Promise.all([
        apiFetch(`${APP_URL}/api/carrito/sincronizar`, { method: 'POST' }).catch(()=>{}),
        syncLocalFavoritesToServer()
      ]).finally(() => {
        loadCartFromServer();
        loadFavoritesFromServer();
      });
    } else {
      loadCartFromServer();
      loadFavoritesFromServer();
    }
    updateUserUI();
  } else {
    const savedUser = localStorage.getItem("angelow_user");
    currentUser = savedUser ? JSON.parse(savedUser) : null;
    loadCartFromServer();
    loadFavoritesFromServer(); // esta ya maneja el modo invitado (localStorage)
    updateUserUI();
  }
}

function updateUserUI() {
  const loginLink = document.getElementById('loginLink');
  const trackOrderLink = document.getElementById('trackOrderLink');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const existingInventario = document.getElementById('inventarioLink');
  if (existingInventario) existingInventario.remove();

  if (currentUser) {
    const isAdmin = currentUser.rol === 'administrador';
    if (isAdmin) {
      loginLink.textContent = 'Administración';
      loginLink.href = APP_URL + '/admin';
      const inventarioLink = document.createElement('a');
      inventarioLink.href = APP_URL + '/admin/inventario';
      inventarioLink.className = 'dropdown-item';
      inventarioLink.id = 'inventarioLink';
      inventarioLink.textContent = 'Inventario';
      dropdownMenu.insertBefore(inventarioLink, trackOrderLink);
    } else {
      loginLink.textContent = 'Mi cuenta';
      loginLink.href = APP_URL + '/perfil';
    }
    loginLink.onclick = null;
    const existingLogout = document.querySelector('.dropdown-item.logout-item');
    if (existingLogout) existingLogout.remove();
    const logoutItem = document.createElement('a');
    logoutItem.href = '#';
    logoutItem.className = 'dropdown-item logout-item';
    logoutItem.innerHTML = '<i class="fas fa-sign-out-alt"></i> Cerrar sesión';
    logoutItem.onclick = (e) => { e.preventDefault(); logout(); };
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
  
  // No borramos favoritos locales, los dejamos como están (modo invitado)
  loadFavoritesFromLocal();
  updateFavBadges();
  updateUserUI();
  renderProducts();
  renderFavorites();
  loadCartFromServer(); // recarga carrito de invitado
  
  showToast({ title: "Sesión cerrada", message: "Has cerrado sesión correctamente", type: "success" });
  setTimeout(() => { window.location.href = APP_URL + '/auth/logout'; }, 1500);
}

// ======================== FILTRADO Y RENDERIZADO DE PRODUCTOS ========================
function getFilteredProducts() {
  return products.filter(p => {
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

function renderProducts() {
  const grid = document.getElementById("productsGrid");
  const filtered = getFilteredProducts();
  if (filtered.length === 0) {
    grid.innerHTML = `<div class="no-results"><p>No se encontraron productos${searchQuery ? ` para "<strong>${document.getElementById('searchInput').value}</strong>"` : ""}</p><p>Prueba con otros términos</p></div>`;
    return;
  }
  grid.innerHTML = filtered.map(p => {
    let stockClass = p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out';
    let stockText = p.stock > 10 ? 'En stock' : p.stock > 0 ? `Solo ${p.stock} left` : 'Sin stock';
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
            ${p.sizes.map(s => `<div class="size-box ${selectedSizes[p.id] === s ? 'selected' : ''}" onclick="event.stopPropagation(); selectSize(${p.id},'${s}')">${s}</div>`).join("")}
          </div>
          <div class="price">COP $${p.price.toLocaleString()}</div>
          <div class="stock-info ${stockClass}" style="margin:8px 0;">${stockText}</div>
          <div class="buttons">
            <button class="buy-btn ${p.stock === 0 ? 'disabled' : ''}" ${p.stock === 0 ? 'disabled' : ''} onclick="event.stopPropagation(); addToCart(${p.id})">Comprar</button>
            <button class="fav-btn ${favorites.includes(p.id) ? 'active' : ''}" onclick="event.stopPropagation(); toggleFavorite(${p.id})"><img src="${APP_URL}/assets/imagenes/general/favoritos.png"></button>
          </div>
        </div>
      </div>
    `;
  }).join("");
}

function setCategory(cat) { activeCategory = cat; renderCategories(); renderProducts(); }
function selectSize(id, size) { event.stopPropagation(); selectedSizes[id] = size; renderProducts(); }

// ======================== CARRITO CON API + FALLBACK LOCAL ========================
function renderCart() {
  const container = document.getElementById("cartItems");
  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const totalElem = document.getElementById("total");
  if (totalElem) totalElem.textContent = `COP $${total.toLocaleString()}`;
  updateCartBadge();
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

async function addToCart(pid) {
  event.stopPropagation();
  let p = products.find(p => p.id === pid);
  if (p.stock <= 0) {
    showToast({ title: "Sin stock", message: "Producto no disponible", type: "error" });
    return;
  }
  let size = selectedSizes[pid];
  if (!size) {
    showToast({ title: "Selecciona talla", message: "Elige una talla", type: "warning" });
    return;
  }
  if (currentUser) {
    try {
      await apiFetch(`${APP_URL}/api/carrito/agregar`, {
        method: 'POST',
        body: JSON.stringify({ producto_id: pid, talla: size, cantidad: 1 })
      });
      await loadCartFromServer();
      showToast({ title: "Agregado!", message: `${p.name} (Talla ${size})`, type: "success" });
    } catch(e) {}
  } else {
    let cartId = `${pid}-${size}`;
    let existing = cart.find(i => i.cartId === cartId);
    if (existing && existing.quantity + 1 > p.stock) {
      showToast({ title: "Stock insuficiente", message: "No hay suficientes unidades", type: "warning" });
      return;
    }
    if (existing) existing.quantity++;
    else cart.push({ ...p, selectedSize: size, cartId, quantity: 1 });
    p.stock--;
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    renderCart();
    renderProducts();
    showToast({ title: "Agregado!", message: `${p.name} (Talla ${size})`, type: "success" });
  }
}

async function removeFromCart(cartId) {
  if (currentUser) {
    try {
      await apiFetch(`${APP_URL}/api/carrito/eliminar`, {
        method: 'DELETE',
        body: JSON.stringify({ item_id: cartId })
      });
      await loadCartFromServer();
      showToast({ message: "Producto eliminado", type: "info" });
    } catch(e) {}
  } else {
    let item = cart.find(i => i.cartId === cartId);
    if (!item) return;
    let p = products.find(p => p.id === item.id);
    if (p) p.stock += item.quantity;
    cart = cart.filter(i => i.cartId !== cartId);
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    renderCart();
    renderProducts();
    showToast({ message: `${item.name} eliminado`, type: "info" });
  }
}

async function updateQty(cartId, delta) {
  const item = cart.find(i => i.cartId === cartId);
  if (!item) return;
  let newQty = item.quantity + delta;
  if (newQty < 1) {
    removeFromCart(cartId);
    return;
  }
  const product = products.find(p => p.id === item.id);
  if (newQty > product.stock) {
    showToast({ title: "Stock insuficiente", type: "warning" });
    return;
  }
  if (currentUser) {
    try {
      await apiFetch(`${APP_URL}/api/carrito/actualizar`, {
        method: 'POST',
        body: JSON.stringify({ item_id: cartId, cantidad: newQty })
      });
      await loadCartFromServer();
    } catch(e) {}
  } else {
    product.stock -= delta;
    item.quantity = newQty;
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    renderCart();
    renderProducts();
  }
}

// ======================== FAVORITOS (AHORA FUNCIONAN SIEMPRE) ========================
function updateFavBadges() {
  let count = favorites.length;
  const favBadge = document.getElementById('favBadge');
  const favHeaderBadge = document.getElementById('favHeaderBadge');
  const favTotal = document.getElementById('favTotal');
  if (favBadge) { favBadge.textContent = count; favBadge.style.display = count ? 'flex' : 'none'; }
  if (favHeaderBadge) { favHeaderBadge.textContent = count; favHeaderBadge.style.display = count ? 'flex' : 'none'; }
  if (favTotal) favTotal.textContent = count;
}

async function toggleFavorite(id) {
  let p = products.find(p => p.id === id);
  const isFav = favorites.includes(id);
  
  if (currentUser) {
    try {
      if (isFav) {
        await apiFetch(`${APP_URL}/api/favoritos/eliminar`, {
          method: 'DELETE',
          body: JSON.stringify({ producto_id: id })
        });
        favorites = favorites.filter(x => x !== id);
        showToast({ title: "Eliminado", message: `${p.name} eliminado de favoritos`, type: "info" });
      } else {
        await apiFetch(`${APP_URL}/api/favoritos/agregar`, {
          method: 'POST',
          body: JSON.stringify({ producto_id: id })
        });
        favorites.push(id);
        showToast({ title: "Añadido!", message: `${p.name} agregado a favoritos`, type: "success" });
      }
      // Respaldo local
      localStorage.setItem("angelow_favorites", JSON.stringify(favorites));
    } catch(e) {
      // Fallback a localStorage si falla la API
      if (isFav) favorites = favorites.filter(x => x !== id);
      else favorites.push(id);
      localStorage.setItem("angelow_favorites", JSON.stringify(favorites));
      showToast({ title: isFav ? "Eliminado" : "Añadido!", message: `${p.name} (guardado localmente)`, type: "info" });
    }
  } else {
    // Modo invitado: solo localStorage
    if (isFav) {
      favorites = favorites.filter(x => x !== id);
      showToast({ title: "Eliminado", message: `${p.name} eliminado de favoritos`, type: "info" });
    } else {
      favorites.push(id);
      showToast({ title: "Añadido!", message: `${p.name} agregado a favoritos (modo invitado)`, type: "success" });
    }
    saveFavoritesToLocal();
  }
  
  updateFavBadges();
  renderProducts();
  renderFavorites();
}

function renderFavorites() {
  let list = document.getElementById('favoritesList');
  let favProducts = products.filter(p => favorites.includes(p.id));
  if (favProducts.length === 0) {
    list.innerHTML = `<div class="fav-empty-state"><div class="fav-empty-text">No tienes productos en favoritos</div><p style="color:var(--text-secondary);margin-bottom:30px;">Guarda tus productos favoritos para verlos aquí</p><button class="fav-empty-btn" onclick="closeFavorites()">Seguir comprando</button></div>`;
    return;
  }
  list.innerHTML = favProducts.map(p => `
    <div class="fav-item">
      <img src="${p.imgs[0]}" class="fav-item-img">
      <div class="fav-item-info">
        <h4>${p.name}</h4>
        <span>${p.category} • ${p.subcategory}</span>
        <div style="font-weight:700;font-size:18px;color:var(--primary);margin-top:6px;">COP $${p.price.toLocaleString()}</div>
        <div class="fav-item-stock ${p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out'}">${p.stock > 10 ? 'En stock' : p.stock > 0 ? 'Pocas unidades' : 'Agotado'}</div>
      </div>
      <div class="fav-actions">
        <button class="fav-remove-btn" onclick="toggleFavorite(${p.id})">×</button>
        <button class="add-to-cart-btn" onclick="addFavoriteToCart(${p.id})" ${p.stock === 0 ? 'disabled' : ''}>Carrito</button>
      </div>
    </div>
  `).join('');
}

async function addFavoriteToCart(id) {
  let p = products.find(p => p.id === id);
  if (p.stock <= 0) {
    showToast({ title: "Agotado", message: `${p.name} sin stock`, type: "error" });
    return;
  }
  let size = p.sizes[0];
  if (currentUser) {
    try {
      await apiFetch(`${APP_URL}/api/carrito/agregar`, {
        method: 'POST',
        body: JSON.stringify({ producto_id: id, talla: size, cantidad: 1 })
      });
      await loadCartFromServer();
      showToast({ title: "Agregado!", message: `${p.name} desde favoritos`, type: "success" });
    } catch(e) {}
  } else {
    let cartId = `${id}-${size}`;
    let existing = cart.find(i => i.cartId === cartId);
    if (existing) existing.quantity++;
    else cart.push({ ...p, selectedSize: size, cartId, quantity: 1 });
    p.stock--;
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    renderCart();
    renderFavorites();
    showToast({ title: "Agregado!", message: `${p.name} desde favoritos`, type: "success" });
  }
}

// ======================== UI: ABRIR/CERRAR CARRITO, FAVORITOS, DETALLE ========================
function openCart() { document.getElementById('cartOverlay').classList.add('active'); }
function closeCart() { document.getElementById('cartOverlay').classList.remove('active'); }
function proceedToCheckout() {
  if (!currentUser) {
    showToast({ title: "Inicia sesión", message: "Debes iniciar sesión para finalizar tu compra", type: "warning" });
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent('/compra')}`;
  } else {
    window.location.href = APP_URL + '/compra';
  }
}

function openFavorites() {
  // Ya no obliga a iniciar sesión
  document.getElementById('favoritesOverlay').classList.add('active');
  renderFavorites();
}
function closeFavorites() { document.getElementById('favoritesOverlay').classList.remove('active'); }

// ======================== DETALLE DEL PRODUCTO ========================
function openProductDetail(id) {
  let p = products.find(p => p.id === id);
  if (!p) return;
  let stars = '★'.repeat(Math.floor(p.rating)) + '☆'.repeat(5 - Math.floor(p.rating));
  document.getElementById('productDetailContent').innerHTML = `
    <div class="detail-container">
      <div class="detail-images">
        <img src="${p.imgs[0]}" class="detail-main-image" id="detailMainImage">
        <div class="detail-image-thumbnails">${p.imgs.map((img, i) => `<img src="${img}" class="detail-thumbnail ${i === 0 ? 'active' : ''}" onclick="document.getElementById('detailMainImage').src='${img}'; document.querySelectorAll('.detail-thumbnail').forEach(t => t.classList.remove('active')); this.classList.add('active')">`).join('')}</div>
      </div>
      <div class="detail-info">
        <div class="detail-category">${p.category}</div>
        <h1 class="detail-name">${p.name}</h1>
        <p class="detail-description">${p.description}</p>
        <div class="detail-rating"><div class="stars">${stars}</div><span class="rating-text">${p.reviews || 0} reseñas</span><a href="#" class="rating-link" onclick="event.preventDefault(); showToast({title:'Reseñas',message:'Función próximamente',type:'info'})">Dejar tu reseña</a></div>
        <div class="detail-prices"><span class="detail-price">COP $${p.price.toLocaleString()}</span></div>
        <div class="detail-size-section"><div class="detail-size-title">Talla</div><div class="detail-sizes">${p.sizes.map(s => `<div class="detail-size-box ${selectedSizes[p.id] === s ? 'selected' : ''}" onclick="selectedSizes[${p.id}]='${s}'; this.parentElement.querySelectorAll('.detail-size-box').forEach(b => b.classList.remove('selected')); this.classList.add('selected')">${s}</div>`).join('')}</div><div class="size-help"><a href="#" class="size-help-link" onclick="event.preventDefault(); showToast({title:'Ayuda',message:'Contáctanos para asesoramiento',type:'info'})">¿No encuentras tu talla? Te ayudamos</a></div></div>
        <div class="detail-ref">REF: ${p.id}</div>
        <div class="detail-actions"><button class="detail-action-btn detail-buy-now" onclick="buyNowProduct(${p.id})">COMPRAR AHORA</button><button class="detail-action-btn detail-add-cart" onclick="addToCartFromDetail(${p.id})">AGREGAR AL CARRITO</button></div>
        <div class="detail-shipping-info"><div class="shipping-title">Envío y Devoluciones</div><div class="shipping-item"><span style="color:#00a650">✓</span>Envío gratis en pedidos > $58.900</div><div class="shipping-item"><span style="color:#00a650">✓</span>Devoluciones gratuitas</div><div class="shipping-item"><span style="color:#00a650">✓</span>Entrega estimada: 5-10 días</div></div>
        <div class="detail-specs"><div class="specs-title">Descripción</div><div class="specs-list">${(p.features || ['Material de alta calidad','Diseño exclusivo','Comodidad garantizada']).map(f => `<div class="spec-item">${f}</div>`).join('')}</div></div>
      </div>
    </div>
  `;
  document.getElementById('productDetail').classList.add('active');
  document.body.style.overflow = 'hidden';
}
function closeProductDetail() { document.getElementById('productDetail').classList.remove('active'); document.body.style.overflow = 'auto'; }

async function buyNowProduct(id) {
  await addToCartFromDetail(id);
  closeProductDetail();
  if (!currentUser) {
    showToast({ title: "Inicia sesión", message: "Debes iniciar sesión para finalizar tu compra", type: "warning" });
    setTimeout(() => window.location.href = APP_URL + `/auth/login?redirect=${encodeURIComponent('/compra')}`, 500);
  } else {
    setTimeout(() => window.location.href = APP_URL + '/compra', 300);
  }
}

async function addToCartFromDetail(id) {
  let p = products.find(p => p.id === id);
  let size = selectedSizes[id];
  if (!size && p.sizes?.length) {
    showToast({ title: "Selecciona talla", message: "Elige una talla", type: "warning" });
    return;
  }
  if (p.stock <= 0) {
    showToast({ title: "Agotado", message: "Producto no disponible", type: "error" });
    return;
  }
  if (currentUser) {
    try {
      await apiFetch(`${APP_URL}/api/carrito/agregar`, {
        method: 'POST',
        body: JSON.stringify({ producto_id: id, talla: size || 'Única', cantidad: 1 })
      });
      await loadCartFromServer();
      showToast({ title: "Agregado!", message: `${p.name}${size ? ' (Talla ' + size + ')' : ''}`, type: "success" });
    } catch(e) {}
  } else {
    let cartId = `${id}-${size || 'default'}`;
    let existing = cart.find(i => i.cartId === cartId);
    if (existing) existing.quantity++;
    else cart.push({ ...p, selectedSize: size || 'Única', cartId, quantity: 1 });
    p.stock--;
    localStorage.setItem("angelow_cart", JSON.stringify(cart));
    renderCart();
    renderProducts();
    showToast({ title: "Agregado!", message: `${p.name}${size ? ' (Talla ' + size + ')' : ''}`, type: "success" });
  }
}

// ======================== RASCA Y GANA (sin cambios) ========================
let scratchRevealed = false;
let canvas, ctx, isDrawing = false;
let scratchPixels = 0;
const requiredPixels = 0.6;

function getNewProducts() {
  return products.filter(p => p.subcategory === "Edición Especial");
}

function renderNewProductsGrid() {
  const container = document.getElementById("newProductsRevealed");
  if (!container) return;
  const newProducts = getNewProducts();
  if (!newProducts.length) {
    container.innerHTML = "<p style='color: #1e3a8a; padding:20px;'>No hay productos nuevos disponibles.</p>";
    container.style.display = "block";
    return;
  }
  let html = `<h3 style="color:#1e3a8a; margin-top:0;">✨ PRODUCTOS NUEVOS DESBLOQUEADOS ✨</h3><div class="new-products-grid">`;
  newProducts.forEach(p => {
    let stockClass = p.stock > 10 ? 'stock-ok' : p.stock > 0 ? 'stock-low' : 'stock-out';
    let stockText = p.stock > 10 ? 'En stock' : p.stock > 0 ? `Solo ${p.stock} left` : 'Sin stock';
    html += `<div class="card-container" onclick="openProductDetail(${p.id})"><div class="card"><div class="my-logo"><img src="${APP_URL}/assets/imagenes/general/logos.png"></div><img src="${p.imgs[0]}" class="product-img"><h2>${p.name}</h2><p>${p.subcategory}</p><div class="stock-info ${stockClass}">${stockText}</div></div><div class="modal"><div class="my-logo"><img src="${APP_URL}/assets/imagenes/general/logos.png"></div><h3>${p.name}</h3><div class="sizes">${p.sizes.map(s => `<div class="size-box" onclick="event.stopPropagation(); selectSize(${p.id},'${s}')">${s}</div>`).join("")}</div><div class="price">COP $${p.price.toLocaleString()}</div><div class="stock-info ${stockClass}">${stockText}</div><div class="buttons"><button class="buy-btn ${p.stock === 0 ? 'disabled' : ''}" ${p.stock === 0 ? 'disabled' : ''} onclick="event.stopPropagation(); addToCart(${p.id})">Comprar</button><button class="fav-btn ${favorites.includes(p.id) ? 'active' : ''}" onclick="event.stopPropagation(); toggleFavorite(${p.id})"><img src="${APP_URL}/assets/imagenes/general/favoritos.png"></button></div></div></div>`;
  });
  html += `</div>`;
  container.innerHTML = html;
  container.style.display = "block";
  const scratchMsg = document.querySelector(".scratch-message");
  if (scratchMsg) scratchMsg.style.display = "none";
}

function initScratchCard() {
  canvas = document.getElementById("scratchCanvas");
  if (!canvas) return;
  ctx = canvas.getContext("2d");
  const w = canvas.width, h = canvas.height;
  ctx.fillStyle = "#9ca3af";
  ctx.fillRect(0, 0, w, h);
  ctx.fillStyle = "#6b7280";
  for (let i = 0; i < 200; i++) ctx.fillRect(Math.random() * w, Math.random() * h, 2, 2);
  ctx.fillStyle = "#4b5563";
  ctx.font = "bold 18px 'Inter'";
  ctx.fillText("¡RASCA!", w / 2 - 45, h / 2);
  scratchPixels = 0;
  isDrawing = false;

  const getCoords = (e) => {
    const rect = canvas.getBoundingClientRect();
    const scaleX = canvas.width / rect.width;
    const scaleY = canvas.height / rect.height;
    let clientX, clientY;
    if (e.touches) { clientX = e.touches[0].clientX; clientY = e.touches[0].clientY; }
    else { clientX = e.clientX; clientY = e.clientY; }
    let x = (clientX - rect.left) * scaleX;
    let y = (clientY - rect.top) * scaleY;
    x = Math.min(Math.max(0, x), w);
    y = Math.min(Math.max(0, y), h);
    return { x, y };
  };

  const scratch = (x, y) => {
    if (scratchRevealed) return;
    ctx.globalCompositeOperation = "destination-out";
    ctx.beginPath();
    ctx.arc(x, y, 18, 0, Math.PI * 2);
    ctx.fill();
    ctx.globalCompositeOperation = "source-over";
    const imageData = ctx.getImageData(0, 0, w, h);
    let transparent = 0;
    for (let i = 3; i < imageData.data.length; i += 4) if (imageData.data[i] === 0) transparent++;
    scratchPixels = transparent / (w * h);
    if (scratchPixels >= requiredPixels && !scratchRevealed) {
      scratchRevealed = true;
      renderNewProductsGrid();
    }
  };

  const onStart = (e) => { e.preventDefault(); isDrawing = true; const { x, y } = getCoords(e); scratch(x, y); };
  const onMove = (e) => { if (!isDrawing) return; e.preventDefault(); const { x, y } = getCoords(e); scratch(x, y); };
  const onEnd = () => { isDrawing = false; };

  canvas.addEventListener("mousedown", onStart);
  canvas.addEventListener("mousemove", onMove);
  canvas.addEventListener("mouseup", onEnd);
  canvas.addEventListener("touchstart", onStart);
  canvas.addEventListener("touchmove", onMove);
  canvas.addEventListener("touchend", onEnd);
}

// ======================== EVENTOS E INICIALIZACIÓN ========================
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
  o.onclick = e => { if (e.target === o) o.classList.remove('active'); };
});
document.getElementById('profileBtn').addEventListener('click', (e) => {
  e.stopPropagation();
  const dropdownMenu = document.getElementById('dropdownMenu');
  dropdownMenu.classList.toggle('show');
});
document.addEventListener('click', () => {
  const dropdownMenu = document.getElementById('dropdownMenu');
  if (dropdownMenu) dropdownMenu.classList.remove('show');
});
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && document.getElementById('productDetail').classList.contains('active')) closeProductDetail();
});
document.getElementById('currentYear').textContent = new Date().getFullYear();

function checkPendingFavorite() {
  const pendingFavorite = localStorage.getItem("angelow_pending_favorite");
  if (pendingFavorite && currentUser) {
    const id = parseInt(pendingFavorite);
    if (!favorites.includes(id)) {
      toggleFavorite(id).finally(() => localStorage.removeItem("angelow_pending_favorite"));
    } else {
      localStorage.removeItem("angelow_pending_favorite");
    }
  }
}

// ======================== INICIALIZACIÓN FINAL ========================
getSessionId();
loadUser();
loadCategories();
renderCategories();
renderProducts();
renderCart();
renderFavorites();
updateFavBadges();
checkPendingFavorite();
initScratchCard();