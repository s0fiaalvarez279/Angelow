<?php
// La variable $user es inyectada por HomeController
$user = $user ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ANGELOW - INICIO</title>
  <link rel="shortcut icon" href="<?= APP_URL ?>/assets/imagenes/general/favico.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/bienvenida.css">
  <!-- Inyectamos la URL base para el JavaScript -->
  <script>const APP_URL = '<?= APP_URL ?>';</script>
</head>
<body>

<script>
  (function() {
    const phpUser = <?php echo json_encode($user); ?>;
    if (phpUser) {
      const localUser = localStorage.getItem('angelow_user');
      if (!localUser || JSON.stringify(JSON.parse(localUser)) !== JSON.stringify(phpUser)) {
        localStorage.setItem('angelow_user', JSON.stringify(phpUser));
      }
      const userFavs = localStorage.getItem(`angelow_favorites_${phpUser.id}`);
      if (userFavs && !localStorage.getItem('angelow_favorites')) {
        localStorage.setItem('angelow_favorites', userFavs);
      }
    } else {
      if (localStorage.getItem('angelow_user')) {
        localStorage.removeItem('angelow_user');
        localStorage.removeItem('angelow_favorites');
      }
    }
  })();
</script>

<div class="toast-container" id="toastContainer"></div>

<header>
  <div class="logo">
    <img src="<?= APP_URL ?>/assets/imagenes/general/logos.png" alt="ANGELOW" class="logo-img">
    <div class="logo-text">
      <span>ANGELOW</span>
      <span>INICIO</span>
    </div>
  </div>

  <!-- Sofia #9: Búsqueda dinámica y filtros -->
  <div class="search-container">
    <img src="https://img.icons8.com/ios-filled/50/search--v1.png" class="search-icon" alt="Buscar">
    <input type="text" id="searchInput" class="search-input" placeholder="Buscar productos...">
    <button id="clearSearch" class="clear-search">×</button>
  </div>

  <div class="header-icons">
    <div class="icon-btn" id="cartBtnHeader">
      <img src="<?= APP_URL ?>/assets/imagenes/general/carro.png" alt="Carrito" style="width:24px;" onerror="this.src='https://via.placeholder.com/24?text=cart'">
      <span id="cartCount" class="badge" style="display:none"></span>
    </div>

    <div class="icon-btn" id="favBtnHeader">
      <img src="<?= APP_URL ?>/assets/imagenes/general/favoritos.png" alt="Favoritos" style="width:24px;" onerror="this.src='https://via.placeholder.com/24?text=fav'">
      <span id="favHeaderBadge" class="badge" style="display:none">0</span>
    </div>

    <div class="icon-btn" id="profileBtn">
      <img src="<?= APP_URL ?>/assets/imagenes/general/avatar.png" alt="Perfil" style="width:24px;" onerror="this.src='https://via.placeholder.com/24?text=user'">
      <div class="dropdown-menu" id="dropdownMenu">
        <a href="<?= APP_URL ?>/perfil" class="dropdown-item" id="loginLink">Mi perfil</a>
        <a href="<?= APP_URL ?>/seguimiento" class="dropdown-item" id="trackOrderLink">Rastrea tu pedido</a>
        <a href="#" class="dropdown-item" id="openFavoritesFromMenu">
          <span>Mis Favoritos</span>
          <span id="favBadge" class="badge" style="position:static; margin-left:auto; display:none;">0</span>
        </a>
      </div>
    </div>
  </div>
</header>

<div class="categories">
  <div class="categories-inner" id="categoriesList"></div>
</div>

<section>
  <div class="products-grid" id="productsGrid"></div>
</section>

<div class="product-detail-overlay" id="productDetail">
  <button class="detail-close" onclick="closeProductDetail()">✕</button>
  <div class="product-detail" id="productDetailContent"></div>
</div>

<div id="cartOverlay" class="overlay">
  <div class="cart">
    <div class="cart-header">
      <div>
        <h2>Bolsa de compras</h2>
        <p>Envío gratis</p>
      </div>
      <button onclick="closeCart()" style="background:none;border:none;font-size:28px;cursor:pointer;">✕</button>
    </div>
    <div class="cart-content" id="cartItems">
      <div style="text-align:center;padding:100px 20px;color:#888;">Tu carrito está vacío</div>
    </div>
    <div class="cart-footer">
      <div class="total">
        <span>Total</span>
        <span id="total">COP $0</span>
      </div>
      <button onclick="proceedToCheckout()" class="checkout" id="checkoutBtn">FINALIZAR COMPRA</button>
    </div>
  </div>
</div>

<div id="favoritesOverlay" class="overlay">
  <div class="fav-sidebar">
    <div class="fav-header">
      <div>
        <h2>Mis Favoritos (<span id="favTotal">0</span>)</h2>
        <p>Envío gratis</p>
      </div>
      <button id="closeFavorites" style="background:none;border:none;font-size:28px;cursor:pointer;">✕</button>
    </div>
    <div class="fav-content" id="favoritesList"></div>
  </div>
</div>

<footer>
  <div class="footer-content">
    <div class="footer-logo">
      <img src="<?= APP_URL ?>/assets/imagenes/general/logos.png" alt="ANGELOW" onerror="this.src='https://via.placeholder.com/100?text=ANGELOW'">
      <div class="footer-logo-text">ANGELOW</div>
      <p>Ropa infantil de calidad</p>
    </div>
    <div class="footer-section">
      <h3>Contacto</h3>
      <p>+57 3135951664</p>
      <p>info@angelow.com</p>
      <p>Medellín, Colombia</p>
    </div>
    <div class="footer-section">
      <h3>Ayuda</h3>
      <ul class="footer-links">
        <li><a href="<?= APP_URL ?>/documentos/Pedidos_envios.html">Pedidos y Envíos</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Politicas_devolucion.html">Devoluciones y Cambios</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Preguntas.html">Preguntas Frecuentes</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Guia_Tallas.html">Guía de Tallas</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Terminos.html">Devoluciones</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Legal</h3>
      <ul class="footer-links">
        <li><a href="<?= APP_URL ?>/documentos/Politicas_Priv.php">Políticas de Privacidad</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Terminos.php">Términos y Condiciones</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Politicas_Env.php">Políticas de Envío</a></li>
        <li><a href="<?= APP_URL ?>/documentos/Politicas_devolucion.php">Políticas de Devolución</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Síguenos</h3>
      <div class="social-links">
        <a href="https://instagram.com/tuusuario" target="_blank"><img src="https://img.icons8.com/ios-filled/50/instagram-new.png" alt="Instagram"></a>
        <a href="https://facebook.com/tuusuario" target="_blank"><img src="https://img.icons8.com/ios-filled/50/facebook-new.png" alt="Facebook"></a>
        <a href="https://wa.me/573135951664" target="_blank"><img src="https://img.icons8.com/ios-filled/50/whatsapp.png" alt="WhatsApp"></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <span id="currentYear"></span> ANGELOW. Todos los derechos reservados.</p>
  </div>
</footer>

<script src="<?= APP_URL ?>/assets/chatbot/botpress.js"></script>
<script src="<?= APP_URL ?>/assets/js/bienvenida.js"></script>
</body>
</html>