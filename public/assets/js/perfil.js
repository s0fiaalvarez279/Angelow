// Variables globales
let isEditing = false;
let cart = JSON.parse(localStorage.getItem("angelow_cart")) || [];
let pendingDeleteId = null;
let pendingDeleteType = null; // 'address', 'card', 'favorite'

// Datos de ejemplo para productos 
// validaciones echas por samuel 
const products = [
  { 
    id: 1, 
    name: "Conjunto Deportivo", 
    category: "Niños", 
    subcategory: "Edición Especial", 
    price: 899900, 
    description: "Elegancia casual en su máxima expresión.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninos/Frente Conjunto Deportivo.png"], 
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
    price: 899900, 
    description: "Conjunto moderno y cómodo para niños.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninos/Frente Conjunto Size.png"], 
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
    price: 899900, 
    description: "Body cómodo y práctico para bebés.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninos/Frente Body Niño.png"], 
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
    price: 899900, 
    description: "Pantalones jogger cómodos.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninos/Frente Jogger.png"], 
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
    price: 899900, 
    description: "Set completo para bebés recién nacidos.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/bebes/Frente Set Bebe.png"], 
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
    price: 899900, 
    description: "Conjunto elegante y divertido para niñas.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninas/Frente Conjunto Infantil.png"], 
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
    price: 899900, 
    description: "Body negro básico para niños.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninas/Frente Body Negro.png"], 
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
    price: 899900, 
    description: "Set con falda para niñas.", 
    sizes: ["2","4","6","8"], 
    imgs: ["../assets/imagenes/ninas/Frente Set Falda.png"], 
    stock: 7, 
    rating: 4.9, 
    reviews: 47, 
    features: ["Falda con vuelo","Top a juego","Material ligero"] 
  }
];

let addresses = [
  {
    id: 1,
    title: "Casa Principal",
    country: "Colombia",
    department: "Antioquia",
    municipality: "Medellín",
    street: "cr 49a #81-54",
    additionalInfo: "segundo piso",
    neighborhood: "El Poblado",
    recipient: "Sofía Alvarez",
    postalCode: "05001",
    isDefault: true
  }
];

let orders = [];
let cards = [];
let favorites = [];

//  INICIALIZACIÓN 
function initApp() {
  initCart();
  loadUserData();
  loadAddresses();
  loadOrders();
  loadCards();
  loadFavorites();
  
  // Navegación sidebar
  document.querySelectorAll('.menu-item[data-section]').forEach(item => {
    item.addEventListener('click', function() {
      const section = this.getAttribute('data-section');
      document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
      this.classList.add('active');
      document.querySelectorAll('.profile-section').forEach(s => s.classList.remove('active'));
      const target = document.getElementById(section);
      if (target) {
        target.classList.add('active');
      } else {
        showToast({message: "Sección próximamente disponible", type: "info"});
        document.getElementById('datosPersonales').classList.add('active');
        document.querySelector('.menu-item[data-section="datosPersonales"]').classList.add('active');
        this.classList.remove('active');
      }
    });
  });
  
  // Vista previa de tarjeta
  document.getElementById('cardNumber')?.addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');
    let formatted = v.match(/.{1,4}/g)?.join(' ') || v;
    e.target.value = formatted;
    document.getElementById('displayCardNumber').textContent = formatted.padEnd(19, '•');
  });

  document.getElementById('cardExpiry')?.addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');
    if (v.length >= 2) v = v.substring(0,2) + '/' + v.substring(2,4);
    e.target.value = v;
    document.getElementById('displayCardExpiry').textContent = v.padEnd(5, '•');
  });

  document.getElementById('cardName')?.addEventListener('input', function(e) {
    document.getElementById('displayCardHolder').textContent = e.target.value.toUpperCase() || 'NOMBRE';
  });
}

//  FUNCIONES DE CARGA DE DATOS 
function loadUserData() {
  const userProfile = JSON.parse(localStorage.getItem("angelow_profile")) || {};
  const ordersData = JSON.parse(localStorage.getItem("angelow_orders")) || [];
  
  // Combinar pedidos guardados con los de ejemplo
  orders = [...ordersData, ...orders];
  
  // Si hay datos del perfil, actualizar los campos
  if (userProfile.email) {
    document.getElementById('email').value = userProfile.email;
  }
  if (userProfile.nombre) {
    document.getElementById('nombre').value = userProfile.nombre;
  }
  if (userProfile.apellido) {
    document.getElementById('apellido').value = userProfile.apellido;
  }
}

function loadAddresses() {
  const addressList = document.getElementById('addressList');
  const emptyState = document.getElementById('emptyAddressState');
  
  // Cargar direcciones del localStorage si existen
  const savedAddresses = JSON.parse(localStorage.getItem("angelow_addresses"));
  if (savedAddresses && savedAddresses.length > 0) {
    addresses = savedAddresses;
  }
  
  if (addresses.length === 0) {
    emptyState.style.display = 'block';
    addressList.style.display = 'none';
    return;
  }

  emptyState.style.display = 'none';
  addressList.style.display = 'flex';
  
  addressList.innerHTML = addresses.map(address => `
    <div class="address-card ${address.isDefault ? 'selected' : ''}">
      <div class="address-actions">
        <button class="address-action-btn" onclick="editAddress(${address.id})" title="Editar">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
          </svg>
        </button>
        <button class="address-action-btn" onclick="showDeleteAddressAlert(${address.id})" title="Eliminar">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
        </button>
      </div>
      <div class="address-title">
        ${address.title}
        ${address.isDefault ? ' <span style="color:var(--success); font-size:14px;">(Predeterminada)</span>' : ''}
      </div>
      <div class="address-text">
        <strong>${address.recipient}</strong><br>
        ${address.street}<br>
        ${address.additionalInfo ? address.additionalInfo + '<br>' : ''}
        ${address.neighborhood}<br>
        ${address.municipality}, ${address.department}<br>
        ${address.country} - ${address.postalCode}
      </div>
      <div class="action-buttons" style="margin-top:15px;">
        <button class="secondary-btn" onclick="setDefaultAddress(${address.id})" ${address.isDefault ? 'disabled style="opacity:0.5;"' : ''}>
          ${address.isDefault ? 'Predeterminada' : 'Establecer como predeterminada'}
        </button>
        <button class="danger-btn" onclick="showDeleteAddressAlert(${address.id})">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
          ELIMINAR
        </button>
      </div>
    </div>
  `).join('');
}

function loadOrders() {
  const ordersList = document.getElementById('ordersList');
  const emptyState = document.getElementById('emptyOrdersState');
  
  // Cargar pedidos desde localStorage
  const savedOrders = JSON.parse(localStorage.getItem("angelow_orders")) || [];
  orders = savedOrders;
  
  if (orders.length === 0) {
    emptyState.style.display = 'block';
    ordersList.style.display = 'none';
    return;
  }

  emptyState.style.display = 'none';
  ordersList.style.display = 'flex';
  
  // Ordenar pedidos por fecha (más recientes primero)
  orders.sort((a, b) => new Date(b.date) - new Date(a.date));
  
  ordersList.innerHTML = orders.map(order => {
    const statusText = {
      'delivered': 'Entregado',
      'processing': 'En proceso',
      'pending': 'Pendiente',
      'shipped': 'Enviado',
      'cancelled': 'Cancelado'
    }[order.status] || order.status;
    
    const statusClass = {
      'delivered': 'status-delivered',
      'processing': 'status-processing',
      'pending': 'status-pending',
      'shipped': 'status-processing',
      'cancelled': 'status-pending'
    }[order.status] || 'status-pending';

    // Formatear fecha
    const orderDate = new Date(order.date);
    const formattedDate = orderDate.toLocaleDateString('es-ES', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });

    return `
      <div class="order-card">
        <div class="order-header">
          <div>
            <div class="order-id">Pedido #${order.id || order.orderNumber}</div>
            <div class="order-date">${formattedDate}</div>
          </div>
          <div class="order-status ${statusClass}">${statusText}</div>
        </div>
        
        <div class="order-details">
          <div class="order-detail-item">
            <div class="detail-label">Total</div>
            <div class="detail-value">COP $${order.total.toLocaleString()}</div>
          </div>
          <div class="order-detail-item">
            <div class="detail-label">Productos</div>
            <div class="detail-value">${order.items || order.products?.length || 0} artículos</div>
          </div>
          <div class="order-detail-item">
            <div class="detail-label">Dirección de entrega</div>
            <div class="detail-value">${order.address || 'Dirección no especificada'}</div>
          </div>
          <div class="order-detail-item">
            <div class="detail-label">Método de pago</div>
            <div class="detail-value">${order.paymentMethod === 'pse' ? 'PSE/Botón Pago' : 'Mercado Pago'}</div>
          </div>
        </div>
        
        <div class="order-products">
          ${(order.products || []).slice(0, 5).map(product => `
            <div class="order-product">
              <img src="${product.image || '../assets/imagenes/general/logo.png'}" alt="${product.name}">
              ${product.quantity > 1 ? `<div style="position:absolute; bottom:5px; right:5px; background:var(--primary); color:white; border-radius:50%; width:20px; height:20px; display:flex; align-items:center; justify-content:center; font-size:10px;">${product.quantity}</div>` : ''}
            </div>
          `).join('')}
        </div>
        
        <div class="order-actions">
          <button class="primary-btn" onclick="viewOrderDetails('${order.id || order.orderNumber}')">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
            VER DETALLES
          </button>
          <button class="secondary-btn" onclick="reorder('${order.id || order.orderNumber}')">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M16 3h5v5"></path>
              <path d="M8 3H3v5"></path>
              <path d="M12 22v-8.5a3.5 3.5 0 0 1-7 0V22"></path>
              <path d="M17 15v-7.5a3.5 3.5 0 0 1 7 0V15"></path>
              <line x1="6" y1="13" x2="10" y2="13"></line>
              <line x1="14" y1="13" x2="18" y2="13"></line>
            </svg>
            VOLVER A PEDIR
          </button>
          <button class="secondary-btn" onclick="trackOrder('${order.id || order.orderNumber}')">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            SEGUIMIENTO
          </button>
        </div>
      </div>
    `;
  }).join('');
}

function loadCards() {
  const cardList = document.getElementById('cardList');
  const emptyState = document.getElementById('emptyCardState');
  
  // Cargar tarjetas desde localStorage
  const savedCards = JSON.parse(localStorage.getItem("angelow_cards"));
  if (savedCards && savedCards.length > 0) {
    cards = savedCards;
  }
  
  if (cards.length === 0) {
    emptyState.style.display = 'block';
    cardList.style.display = 'none';
    return;
  }

  emptyState.style.display = 'none';
  cardList.style.display = 'grid';
  
  cardList.innerHTML = cards.map(card => `
    <div class="card-item">
      ${card.isDefault ? '<div class="card-default-badge">PREDETERMINADA</div>' : ''}
      <div class="card-actions">
        <button class="card-action-btn" onclick="setDefaultCard(${card.id})" title="Establecer como predeterminada">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="20 6 9 17 4 12"></polyline>
          </svg>
        </button>
        <button class="card-action-btn" onclick="showDeleteCardAlert(${card.id})" title="Eliminar">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
        </button>
      </div>
      <div class="credit-card">
        <div class="card-chip">
          <svg width="50" height="42" viewBox="0 0 50 42">
            <rect x="2" y="2" width="46" height="38" rx="4" fill="none" stroke="#FFD700" stroke-width="2"/>
            <line x1="8" y1="12" x2="42" y2="12" stroke="#FFD700" stroke-width="2"/>
            <line x1="8" y1="18" x2="42" y2="18" stroke="#FFD700" stroke-width="2"/>
            <line x1="8" y1="24" x2="42" y2="24" stroke="#FFD700" stroke-width="2"/>
            <line x1="8" y1="30" x2="30" y2="30" stroke="#FFD700" stroke-width="2"/>
          </svg>
        </div>
        <div class="card-number">${card.number}</div>
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-top:auto;">
          <div style="flex:1;">
            <div class="card-holder">${card.holder}</div>
          </div>
          <div style="text-align:right;">
            <div class="card-expiry-label" style="font-size:11px; opacity:0.8;">Válida hasta</div>
            <div class="card-expiry">${card.expiry}</div>
          </div>
        </div>
      </div>
      <div class="action-buttons" style="margin-top:15px;">
        <button class="secondary-btn" onclick="setDefaultCard(${card.id})" ${card.isDefault ? 'disabled style="opacity:0.5;"' : ''}>
          ${card.isDefault ? 'Predeterminada' : 'Establecer como predeterminada'}
        </button>
        <button class="danger-btn" onclick="showDeleteCardAlert(${card.id})">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
          ELIMINAR
        </button>
      </div>
    </div>
  `).join('');
}

// FAVORITOS 
function loadFavorites() {
  const favoritesGrid = document.getElementById('favoritesGrid');
  const emptyState = document.getElementById('emptyFavoritesState');
  
  // Cargar favoritos desde localStorage
  const savedFavorites = JSON.parse(localStorage.getItem("angelow_favorites"));
  
  if (savedFavorites && savedFavorites.length > 0) {
    // Si hay favoritos guardados, filtrar los productos completos
    favorites = products.filter(p => savedFavorites.includes(p.id));
  } else {
    // Si no hay favoritos, cargar algunos de ejemplo para probar
    favorites = products.slice(0, 4); // Cargar los primeros 4 productos como ejemplo
    // Guardarlos en localStorage para persistencia
    const favoriteIds = favorites.map(f => f.id);
    localStorage.setItem("angelow_favorites", JSON.stringify(favoriteIds));
  }
  
  if (favorites.length === 0) {
    emptyState.style.display = 'block';
    favoritesGrid.style.display = 'none';
    return;
  }

  emptyState.style.display = 'none';
  favoritesGrid.style.display = 'grid';
  
  favoritesGrid.innerHTML = favorites.map(fav => `
    <div class="favorite-item">
      <div class="favorite-badge">FAVORITO</div>
      <img src="${fav.imgs[0] || '../assets/imagenes/general/logo.png'}" alt="${fav.name}" class="favorite-image">
      <div class="favorite-info">
        <div class="favorite-title">${fav.name}</div>
        <div style="font-size:12px; color:var(--text-secondary); margin-bottom:8px;">${fav.category} - ${fav.subcategory}</div>
        <div class="favorite-price">COP $${fav.price.toLocaleString()}</div>
        <div class="favorite-actions">
          <button class="favorite-action-btn add-to-cart" onclick="addToCartFromFavorites(${fav.id})">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            AÑADIR AL CARRITO
          </button>
          <button class="favorite-action-btn remove" onclick="showDeleteFavoriteAlert(${fav.id})">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            QUITAR
          </button>
        </div>
      </div>
    </div>
  `).join('');
}

//  SISTEMA DE ALERTA PERSONALIZADA 
function showAlert(title, message, type = 'delete') {
  document.getElementById('alertTitle').textContent = title;
  document.getElementById('alertMessage').textContent = message;
  document.getElementById('alertOverlay').classList.add('active');
}

function closeAlert() {
  document.getElementById('alertOverlay').classList.remove('active');
  pendingDeleteId = null;
  pendingDeleteType = null;
}

function confirmDelete() {
  if (pendingDeleteId && pendingDeleteType) {
    switch(pendingDeleteType) {
      case 'address':
        deleteAddressConfirmed(pendingDeleteId);
        break;
      case 'card':
        deleteCardConfirmed(pendingDeleteId);
        break;
      case 'favorite':
        deleteFavoriteConfirmed(pendingDeleteId);
        break;
      case 'clearFavorites':
        // Limpiar todos los favoritos
        favorites = [];
        localStorage.setItem("angelow_favorites", JSON.stringify([]));
        loadFavorites();
        showToast({title: "Favoritos limpiados", message: "Todos los productos han sido eliminados de favoritos", type: "success"});
        break;
      case 'logout':
        logout();
        break;
    }
  }
  closeAlert();
}

function showLogoutAlert() {
  showAlert(
    "¿Cerrar sesión?",
    "Se perderán los cambios no guardados. ¿Estás seguro de que deseas salir?",
    'logout'
  );
  pendingDeleteType = 'logout';
}

//  SISTEMA DEL CARRITO 
function initCart() {
  renderCart();
  document.getElementById("cartBtn").onclick = () => document.getElementById("cartOverlay").classList.add("active");
  document.getElementById("cartOverlay").onclick = (e) => {
    if (e.target === document.getElementById("cartOverlay")) closeCart();
  };
}

function renderCart() {
  const itemsContainer = document.getElementById("cartItems");
  const total = cart.reduce((sum, i) => sum + (i.price || 0) * (i.quantity || 1), 0);
  const totalItems = cart.reduce((sum, i) => sum + (i.quantity || 1), 0);

  document.getElementById("cartTotal").textContent = `COP $${total.toLocaleString()}`;
  document.getElementById("cartCount").textContent = totalItems;
  document.getElementById("cartCount").style.display = totalItems > 0 ? "flex" : "none";

  if (cart.length === 0) {
    itemsContainer.innerHTML = `<div style="text-align:center;padding:100px 20px;color:#888;font-size:18px;">Tu carrito está vacío</div>`;
    return;
  }

  itemsContainer.innerHTML = cart.map(item => {
    const mainImg = item.imgs && item.imgs[0] ? item.imgs[0] : "../assets/imagenes/general/logo.png";
    return `
      <div class="cart-item">
        <img src="${mainImg}">
        <div class="cart-info">
          <h4>${item.name || 'Producto'}</h4>
          <span>Talla: ${item.selectedSize || 'N/A'} • ${item.subcategory || ''}</span>
          <div class="qty">
            <button onclick="updateQty('${item.cartId || item.id}', -1)" ${(item.quantity || 1) <= 1 ? 'disabled' : ''}>−</button>
            <strong>${item.quantity || 1}</strong>
            <button onclick="updateQty('${item.cartId || item.id}', 1)">+</button>
          </div>
          <strong>COP $${((item.price || 0) * (item.quantity || 1)).toLocaleString()}</strong>
        </div>
        <button class="remove" onclick="removeFromCart('${item.cartId || item.id}')">×</button>
      </div>
    `;
  }).join("");
}

function closeCart() {
  document.getElementById("cartOverlay").classList.remove("active");
}

function removeFromCart(cartId) {
  cart = cart.filter(i => (i.cartId || i.id) !== cartId);
  localStorage.setItem("angelow_cart", JSON.stringify(cart));
  renderCart();
  showToast({message: "Producto eliminado del carrito", type: "info"});
}

function updateQty(cartId, delta) {
  const item = cart.find(i => (i.cartId || i.id) === cartId);
  if (!item) return;
  const newQty = (item.quantity || 1) + delta;
  if (newQty < 1) return;
  item.quantity = newQty;
  localStorage.setItem("angelow_cart", JSON.stringify(cart));
  renderCart();
}

function checkout() {
  if (cart.length === 0) {
    showToast({title: "Carrito vacío", message: "Agrega productos al carrito primero", type: "error"});
    return;
  }
  window.location.href = "compra.html";
}

//  FUNCIONES PARA DIRECCIONES 
function showDeleteAddressAlert(id) {
  const address = addresses.find(a => a.id === id);
  if (!address) return;
  
  pendingDeleteId = id;
  pendingDeleteType = 'address';
  
  showAlert(
    "¿Eliminar dirección?",
    `Esta acción no se puede deshacer. ¿Estás seguro de que deseas eliminar la dirección "${address.title}"?`,
    'delete'
  );
}

function deleteAddressConfirmed(id) {
  addresses = addresses.filter(a => a.id !== id);
  // Guardar en localStorage
  localStorage.setItem("angelow_addresses", JSON.stringify(addresses));
  loadAddresses();
  showToast({title: "Dirección eliminada", message: "La dirección ha sido eliminada correctamente", type: "success"});
}

function showAddressForm() {
  document.getElementById('addressFormContainer').style.display = 'block';
  document.getElementById('addressList').style.display = 'none';
  document.getElementById('emptyAddressState').style.display = 'none';
}

function cancelAddressForm() {
  document.getElementById('addressFormContainer').style.display = 'none';
  document.getElementById('addressList').style.display = 'flex';
  if (addresses.length === 0) {
    document.getElementById('emptyAddressState').style.display = 'block';
  }
  document.getElementById('addressForm').reset();
}

function saveAddress() {
  const calle = document.getElementById('calle').value;
  const destinatario = document.getElementById('destinatario').value;

  if (!calle || !destinatario) {
    showToast({title: "Campos incompletos", message: "Por favor completa todos los campos requeridos", type: "error"});
    return;
  }

  const newAddress = {
    id: Date.now(), // ID único basado en timestamp
    title: "Casa",
    country: "Colombia",
    department: document.getElementById('departamento').value,
    municipality: document.getElementById('municipio').value,
    street: calle,
    additionalInfo: document.getElementById('infoAdicional').value,
    neighborhood: document.getElementById('barrio').value,
    recipient: destinatario,
    postalCode: "05001",
    isDefault: addresses.length === 0
  };

  addresses.push(newAddress);
  // Guardar en localStorage
  localStorage.setItem("angelow_addresses", JSON.stringify(addresses));
  loadAddresses();
  cancelAddressForm();
  showToast({title: "¡Dirección agregada!", message: "Tu dirección ha sido guardada correctamente", type: "success"});
}

function editAddress(id) {
  const address = addresses.find(a => a.id === id);
  if (!address) return;

  document.getElementById('calle').value = address.street;
  document.getElementById('infoAdicional').value = address.additionalInfo || '';
  document.getElementById('barrio').value = address.neighborhood || '';
  document.getElementById('destinatario').value = address.recipient;
  document.getElementById('departamento').value = address.department.toLowerCase();
  document.getElementById('municipio').value = address.municipality.toLowerCase();

  showAddressForm();
}

function setDefaultAddress(id) {
  addresses.forEach(a => a.isDefault = a.id === id);
  // Guardar en localStorage
  localStorage.setItem("angelow_addresses", JSON.stringify(addresses));
  loadAddresses();
  showToast({title: "Dirección predeterminada", message: "La dirección ha sido establecida como predeterminada", type: "success"});
}

//  FUNCIONES PARA PEDIDOS 
function refreshOrders() {
  showToast({title: "Actualizando pedidos", message: "Buscando nuevos pedidos...", type: "info"});
  // Recargar pedidos desde localStorage
  loadOrders();
}

function viewOrderDetails(orderId) {
  const order = orders.find(o => o.id === orderId || o.orderNumber === orderId);
  if (!order) {
    showToast({title: "Error", message: "No se encontró el pedido", type: "error"});
    return;
  }
  
  // Crear mensaje con detalles del pedido
  let details = `Pedido: ${order.id || order.orderNumber}\n`;
  details += `Fecha: ${new Date(order.date).toLocaleDateString()}\n`;
  details += `Total: COP $${order.total.toLocaleString()}\n`;
  details += `Estado: ${order.status}\n`;
  details += `Dirección: ${order.address}\n`;
  details += `Productos:\n`;
  (order.products || []).forEach(p => {
    details += `- ${p.name} (x${p.quantity}) - COP $${p.price.toLocaleString()}\n`;
  });
  
  alert(details);
}

function reorder(orderId) {
  const order = orders.find(o => o.id === orderId || o.orderNumber === orderId);
  if (!order) {
    showToast({title: "Error", message: "No se encontró el pedido", type: "error"});
    return;
  }
  
  // Agregar productos al carrito
  let currentCart = JSON.parse(localStorage.getItem("angelow_cart")) || [];
  
  (order.products || []).forEach(product => {
    const cartItem = {
      ...product,
      cartId: `reorder_${Date.now()}_${product.name}`,
      quantity: product.quantity
    };
    currentCart.push(cartItem);
  });
  
  localStorage.setItem("angelow_cart", JSON.stringify(currentCart));
  cart = currentCart;
  renderCart();
  
  showToast({
    title: "¡Productos agregados!", 
    message: `${order.products?.length || 0} productos han sido agregados al carrito`, 
    type: "success"
  });
}

function trackOrder(orderId) {
  showToast({
    title: "Seguimiento del pedido", 
    message: `El pedido #${orderId} está en proceso. Recibirás actualizaciones por correo.`, 
    type: "info"
  });
}

//  FUNCIONES PARA TARJETAS 
function showDeleteCardAlert(id) {
  const card = cards.find(c => c.id === id);
  if (!card) return;
  
  pendingDeleteId = id;
  pendingDeleteType = 'card';
  
  showAlert(
    "¿Eliminar tarjeta?",
    `Esta acción no se puede deshacer. ¿Estás seguro de que deseas eliminar la tarjeta que termina en ${card.number.slice(-4)}?`,
    'delete'
  );
}

function deleteCardConfirmed(id) {
  cards = cards.filter(c => c.id !== id);
  // Guardar en localStorage
  localStorage.setItem("angelow_cards", JSON.stringify(cards));
  loadCards();
  showToast({title: "Tarjeta eliminada", message: "La tarjeta ha sido eliminada correctamente", type: "success"});
}

function setDefaultCard(id) {
  cards.forEach(c => c.isDefault = c.id === id);
  // Guardar en localStorage
  localStorage.setItem("angelow_cards", JSON.stringify(cards));
  loadCards();
  showToast({title: "Tarjeta predeterminada", message: "La tarjeta ha sido establecida como predeterminada", type: "success"});
}

function showCardForm() {
  document.getElementById('emptyCardState').style.display = 'none';
  document.getElementById('cardList').style.display = 'none';
  document.getElementById('cardFormContainer').style.display = 'block';
}

function cancelCardForm() {
  document.getElementById('cardFormContainer').style.display = 'none';
  if (cards.length === 0) {
    document.getElementById('emptyCardState').style.display = 'block';
  } else {
    document.getElementById('cardList').style.display = 'grid';
  }
  document.getElementById('cardForm').reset();
  document.getElementById('displayCardNumber').textContent = '•••• •••• •••• ••••';
  document.getElementById('displayCardHolder').textContent = 'NOMBRE';
  document.getElementById('displayCardExpiry').textContent = '••/••';
}

function saveCard() {
  const fields = ['cardNumber', 'cardName', 'cardExpiry', 'cardCVV'];
  if (fields.some(id => !document.getElementById(id).value.trim())) {
    showToast({title: "Campos incompletos", message: "Por favor completa todos los datos de la tarjeta", type: "error"});
    return;
  }

  const newCard = {
    id: Date.now(),
    number: document.getElementById('cardNumber').value.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim(),
    holder: document.getElementById('cardName').value.toUpperCase(),
    expiry: document.getElementById('cardExpiry').value,
    type: 'visa',
    isDefault: cards.length === 0
  };

  cards.push(newCard);
  // Guardar en localStorage
  localStorage.setItem("angelow_cards", JSON.stringify(cards));
  loadCards();
  cancelCardForm();
  showToast({title: "¡Tarjeta guardada!", message: "Tu método de pago ha sido registrado correctamente", type: "success"});
}

//  FUNCIONES PARA FAVORITOS 
function showDeleteFavoriteAlert(id) {
  const fav = favorites.find(f => f.id === id);
  if (!fav) return;
  
  pendingDeleteId = id;
  pendingDeleteType = 'favorite';
  
  showAlert(
    "¿Eliminar de favoritos?",
    `¿Estás seguro de que deseas eliminar "${fav.name}" de tus favoritos?`,
    'delete'
  );
}

function deleteFavoriteConfirmed(id) {
  // Eliminar de la lista de favoritos
  favorites = favorites.filter(f => f.id !== id);
  // Guardar solo los IDs en localStorage
  const favoriteIds = favorites.map(f => f.id);
  localStorage.setItem("angelow_favorites", JSON.stringify(favoriteIds));
  loadFavorites();
  showToast({title: "Eliminado de favoritos", message: "El producto ha sido eliminado de tus favoritos", type: "success"});
}

function refreshFavorites() {
  showToast({title: "Actualizando favoritos", message: "Buscando nuevos productos...", type: "info"});
  // Recargar favoritos desde localStorage
  loadFavorites();
}

function clearAllFavorites() {
  if (favorites.length === 0) return;
  
  pendingDeleteType = 'clearFavorites';
  
  showAlert(
    "¿Limpiar todos los favoritos?",
    "Esta acción eliminará todos los productos de tu lista de favoritos. ¿Estás seguro?",
    'delete'
  );
}

function addToCartFromFavorites(id) {
  const fav = favorites.find(f => f.id === id);
  if (!fav) return;

  const cartItem = {
    ...fav,
    cartId: 'fav_' + Date.now(),
    quantity: 1,
    selectedSize: fav.sizes[0] || 'M',
    subcategory: fav.subcategory
  };

  cart.push(cartItem);
  localStorage.setItem("angelow_cart", JSON.stringify(cart));
  renderCart();
  showToast({title: "¡Añadido al carrito!", message: `${fav.name} ha sido añadido a tu carrito`, type: "success"});
}

//  FUNCIONES DE AUTENTICACIÓN 
function refreshSecurity() {
  showToast({title: "Actualizando seguridad", message: "Verificando estado de seguridad...", type: "info"});
}

function definePassword() {
  showToast({title: "Definir contraseña", message: "Redirigiendo a la configuración de contraseña...", type: "info"});
}

function recoverPassword() {
  showToast({title: "Recuperar contraseña", message: "Enviando enlace de recuperación...", type: "info"});
}

function viewSessions() {
  showToast({title: "Gestión de sesiones", message: "Mostrando sesiones activas...", type: "info"});
}

function closeAllSessions() {
  showAlert(
    "¿Cerrar todas las sesiones?",
    "Se cerrarán todas las sesiones activas excepto la actual. Tendrás que iniciar sesión nuevamente en otros dispositivos.",
    'logout'
  );
}

function enableTwoFactor() {
  showToast({title: "Autenticación de dos factores", message: "Configurando 2FA...", type: "info"});
}

//  FUNCIONES DE PERFIL 
function toggleEdit() {
  isEditing = !isEditing;
  const inputs = document.querySelectorAll('#datosPersonales .form-input:not(.readonly)');
  const editBtn = document.getElementById('editBtn');
  
  inputs.forEach(input => input.disabled = !isEditing);

  if (isEditing) {
    editBtn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> GUARDAR`;
    editBtn.classList.add('save');
  } else {
    editBtn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> EDITAR`;
    editBtn.classList.remove('save');
    saveProfile();
  }
}

function saveProfile() {
  // Guardar datos del perfil en localStorage
  const userProfile = {
    email: document.getElementById('email').value,
    nombre: document.getElementById('nombre').value,
    apellido: document.getElementById('apellido').value,
    cedula: document.getElementById('cedula').value,
    genero: document.getElementById('genero').value,
    fechaNacimiento: document.getElementById('fechaNacimiento').value,
    telefono: document.getElementById('telefono').value
  };
  
  localStorage.setItem("angelow_profile", JSON.stringify(userProfile));
  showToast({title: "¡Cambios guardados!", message: "Tu información ha sido actualizada correctamente", type: "success"});
}

function logout() {
  showToast({title: "Sesión cerrada", message: "Hasta pronto", type: "success"});
  setTimeout(() => window.location.href = "../index.html", 1500);
}

//  FUNCIONES GENERALES 
function showToast({title = "", message = "", type = "success", duration = 4000}) {
  const container = document.getElementById("toastContainer");
  const toast = document.createElement("div");
  toast.className = `toast ${type}`;
  const icons = {
    success: `<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>`,
    error: `<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`,
    info: `<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>`
  };
  toast.innerHTML = `
    <div class="toast-icon">${icons[type] || icons.success}</div>
    <div class="toast-content">
      ${title ? `<div class="toast-title">${title}</div>` : ""}
      <div class="toast-message">${message}</div>
    </div>
  `;
  container.appendChild(toast);
  setTimeout(() => toast.classList.add("show"), 100);
  setTimeout(() => { toast.classList.remove("show"); setTimeout(() => toast.remove(), 400); }, duration);
}

//  INICIALIZAR APLICACIÓN 
document.addEventListener('DOMContentLoaded', function() {
  initApp();
});
