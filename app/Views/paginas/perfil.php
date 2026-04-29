<?php
// Asegurar que el usuario esté logueado
if (!isset($_SESSION['user'])) {
    header('Location: ' . APP_URL . '/auth/login');
    exit();
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ANGELOW - Mi Perfil</title>
  <link rel="shortcut icon" href="<?= APP_URL ?>/assets/imagenes/general/favico.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Inyectamos la URL base para JavaScript -->
  <script>const APP_URL = '<?= APP_URL ?>';</script>
  <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/perfil.css">
</head>
<body>

  <!-- ALERTA PERSONALIZADA -->
  <div class="alert-overlay" id="alertOverlay">
    <div class="alert-box">
      <div class="alert-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
          <line x1="12" y1="9" x2="12" y2="13"></line>
          <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
      </div>
      <h3 class="alert-title" id="alertTitle">¿Eliminar dirección?</h3>
      <p class="alert-message" id="alertMessage">Esta acción no se puede deshacer. ¿Estás seguro de que deseas eliminar esta dirección?</p>
      <div class="alert-buttons">
        <button class="alert-btn cancel" onclick="closeAlert()">CANCELAR</button>
        <button class="alert-btn confirm" onclick="confirmDelete()">ELIMINAR</button>
      </div>
    </div>
  </div>

  <div class="toast-container" id="toastContainer"></div>

  <header>
    <div class="logo">
      <img src="<?= APP_URL ?>/assets/imagenes/general/logos.png" alt="ANGELOW" class="logo-img">
      <div class="logo-text">
        <span>ANGELOW</span>
        <span>PERFIL</span>
      </div>
    </div>

    <div class="header-icons">
      <div class="icon-btn" onclick="window.location.href='<?= APP_URL ?>/'">
        <img src="<?= APP_URL ?>/assets/imagenes/general/volver.png" alt="Inicio" style="width:24px;">
      </div>
      <div class="icon-btn" id="cartBtn" style="position:relative;">
        <img src="<?= APP_URL ?>/assets/imagenes/general/carro.png" alt="Carrito" style="width:24px;">
        <span id="cartCount" class="badge" style="display:none"></span>
      </div>
    </div>
  </header>

  <!-- CARRITO MODERNO -->
  <div class="overlay" id="cartOverlay">
    <div class="cart">
      <div class="cart-header">
        <div>
          <h2>Bolsa de compras</h2>
          <p>Envío gratis para tu pedido</p>
        </div>
        <button onclick="closeCart()" style="background:none;border:none;font-size:28px;cursor:pointer;color:#666;">✕</button>
      </div>
      <div class="cart-content" id="cartItems">
        <div style="text-align:center;padding:100px 20px;color:#888;font-size:18px;">Tu carrito está vacío</div>
      </div>
      <div class="cart-footer">
        <div class="total">
          <span>Total</span>
          <span id="cartTotal">COP $0</span>
        </div>
        <!-- Botón Finalizar Compra redirige a la ruta MVC /compra -->
        <button class="checkout" onclick="window.location.href='<?= APP_URL ?>/compra'">FINALIZAR COMPRA</button>
      </div>
    </div>
  </div>

  <div class="main-container">
    <aside class="sidebar-menu">
      <div class="menu-item active" data-section="datosPersonales">
        <span>Perfil</span>
      </div>
      <div class="menu-item" data-section="direcciones">
        <span>Direcciones</span>
      </div>
      <div class="menu-item" data-section="pedidos">
        <span>Pedidos</span>
      </div>
      <div class="menu-item" data-section="metodosPago">
        <span>Tarjetas de crédito</span>
      </div>
      <div class="menu-item" data-section="autenticacion">
        <span>Autenticación</span>
      </div>
      <div class="menu-item" data-section="favoritos">
        <span>Mis Favoritos</span>
      </div>
    </aside>

    <div class="content-area">

      <!-- DATOS PERSONALES -->
      <div class="profile-section active" id="datosPersonales">
        <div class="profile-header">
          <h1 class="profile-title">Datos personales</h1>
          <button class="edit-btn" id="editBtn" onclick="toggleEdit()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
              <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            EDITAR
          </button>
        </div>

        <div class="profile-card">
          <form id="profileForm">
            <div class="form-grid">
              <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-input" id="nombre" value="<?= htmlspecialchars($user['nombre'] ?? '') ?>" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-input" id="apellido" value="<?= htmlspecialchars($user['apellido'] ?? '') ?>" disabled>
              </div>
              <div class="form-group" style="grid-column: 1 / -1;">
                <label class="form-label">Email</label>
                <input type="email" class="form-input readonly" id="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">Cédula de ciudadanía</label>
                <input type="text" class="form-input" id="cedula" value="<?= htmlspecialchars($user['cedula'] ?? '') ?>" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">Género</label>
                <select class="form-input" id="genero" disabled>
                  <option value="">Seleccionar</option>
                  <option value="femenino" <?= ($user['genero'] ?? '') == 'femenino' ? 'selected' : '' ?>>Femenino</option>
                  <option value="masculino" <?= ($user['genero'] ?? '') == 'masculino' ? 'selected' : '' ?>>Masculino</option>
                  <option value="otro" <?= ($user['genero'] ?? '') == 'otro' ? 'selected' : '' ?>>Otro</option>
                  <option value="prefiero_no_decirlo" <?= ($user['genero'] ?? '') == 'prefiero_no_decirlo' ? 'selected' : '' ?>>Prefiero no decir</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fechaNacimiento" value="<?= $user['fecha_nacimiento'] ?? '' ?>" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-input" id="telefono" value="<?= htmlspecialchars($user['telefono'] ?? '') ?>" disabled>
              </div>
            </div>

            <div class="action-buttons" style="margin-top:40px; justify-content:flex-end;">
              <button type="button" class="primary-btn" onclick="saveProfile()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                  <polyline points="17 21 17 13 7 13 7 21"></polyline>
                  <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                GUARDAR CAMBIOS
              </button>
            </div>
            
            <div class="logout-section">
              <button type="button" class="logout-btn" onclick="showLogoutAlert()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                CERRAR SESIÓN
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- DIRECCIONES -->
      <div class="profile-section" id="direcciones">
        <div class="profile-header">
          <h1 class="profile-title">Direcciones</h1>
          <button class="primary-btn" onclick="showAddressForm()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 5v14M5 12h14"/>
            </svg>
            AGREGAR DIRECCIÓN
          </button>
        </div>

        <div class="profile-card">
          <div class="address-list" id="addressList">
            <!-- Las direcciones se cargarán con JavaScript -->
          </div>
          <div class="profile-card" id="addressFormContainer" style="display: none; margin-top: 30px;">
            <h2 style="font-size:24px; font-weight:700; color:var(--text-dark); margin-bottom:40px;">NUEVA DIRECCIÓN</h2>
            <form id="addressForm">
              <div class="form-grid">
                <div class="form-group">
                  <label class="form-label">País</label>
                  <select class="form-input" id="pais">
                    <option value="colombia" selected>Colombia</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Departamento</label>
                  <select class="form-input" id="departamento">
                    <option value="">Seleccionar</option>
                    <option value="antioquia">Antioquia</option>
                    <option value="cundinamarca">Cundinamarca</option>
                    <option value="valle">Valle del Cauca</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Municipio</label>
                  <select class="form-input" id="municipio">
                    <option value="">Seleccionar</option>
                    <option value="medellin">Medellín</option>
                    <option value="envigado">Envigado</option>
                    <option value="itagui">Itagüí</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Calle</label>
                  <input type="text" class="form-input" id="calle" placeholder="Ej: Calle 50 #45-32">
                </div>
                <div class="form-group" style="grid-column: 1 / -1;">
                  <label class="form-label">Información adicional (ej.: apto. 201)</label>
                  <input type="text" class="form-input" id="infoAdicional" placeholder="Apartamento, torre, piso, etc.">
                </div>
                <div class="form-group">
                  <label class="form-label">Barrio</label>
                  <input type="text" class="form-input" id="barrio" placeholder="Nombre del barrio">
                </div>
                <div class="form-group">
                  <label class="form-label">Destinatario</label>
                  <input type="text" class="form-input" id="destinatario" placeholder="Nombre completo" value="<?= htmlspecialchars($user['nombre'] ?? '') ?>">
                </div>
              </div>
              <div class="action-buttons">
                <button type="button" class="primary-btn" onclick="saveAddress()">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                  </svg>
                  GUARDAR DIRECCIÓN
                </button>
                <button type="button" class="secondary-btn" onclick="cancelAddressForm()">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
                  CANCELAR
                </button>
              </div>
            </form>
          </div>
          <div class="empty-state" id="emptyAddressState" style="display: none;">
            <div class="empty-icon">
              <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
            </div>
            <p class="empty-text">¡AÚN NO TIENES NINGUNA DIRECCIÓN REGISTRADA!</p>
            <p class="empty-subtext">Agrega una dirección para recibir tus pedidos</p>
            <div class="action-buttons" style="justify-content:center; margin-top:30px;">
              <button class="primary-btn" onclick="showAddressForm()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 5v14M5 12h14"/>
                </svg>
                AGREGAR DIRECCIÓN
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- PEDIDOS -->
      <div class="profile-section" id="pedidos">
        <div class="profile-header">
          <h1 class="profile-title">Mis Pedidos</h1>
          <button class="secondary-btn" onclick="refreshOrders()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="1 4 1 10 7 10"></polyline>
              <polyline points="23 20 23 14 17 14"></polyline>
              <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
            </svg>
            ACTUALIZAR
          </button>
        </div>
        <div class="profile-card">
          <div class="orders-list" id="ordersList"></div>
          <div class="empty-state" id="emptyOrdersState">
            <div class="empty-icon">
              <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
              </svg>
            </div>
            <p class="empty-text">¡AÚN NO HAS REALIZADO NINGÚN PEDIDO!</p>
            <p class="empty-subtext">Cuando realices un pedido, aparecerá aquí</p>
            <div class="action-buttons" style="justify-content:center; margin-top:30px;">
              <button class="primary-btn" onclick="window.location.href='<?= APP_URL ?>/'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                EXPLORAR PRODUCTOS
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- AUTENTICACIÓN -->
      <div class="profile-section" id="autenticacion">
        <div class="profile-header">
          <h1 class="profile-title">Autenticación</h1>
          <button class="secondary-btn" onclick="refreshSecurity()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="1 4 1 10 7 10"></polyline>
              <polyline points="23 20 23 14 17 14"></polyline>
              <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
            </svg>
            ACTUALIZAR
          </button>
        </div>
        <div class="profile-card">
          <div class="security-section">
            <h3 class="security-title">Contraseña</h3>
            <p class="security-description" id="passwordStatus">Usted todavía no tiene una contraseña definida.</p>
            <div class="action-buttons">
              <button class="primary-btn" onclick="definePassword()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                DEFINIR CONTRASEÑA
              </button>
              <button class="secondary-btn" onclick="recoverPassword()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                  <polyline points="10 17 15 12 10 7"></polyline>
                  <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>
                RECUPERAR CONTRASEÑA
              </button>
            </div>
          </div>
          <div class="security-section" style="margin-top:40px;">
            <h3 class="security-title">Gestión de sesiones</h3>
            <p class="security-description">Usted tiene <span id="sessionCount">1</span> sesiones activas</p>
            <div class="action-buttons">
              <button class="primary-btn" onclick="viewSessions()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="2" y="6" width="20" height="8" rx="1"></rect>
                  <path d="M17 14v7"></path>
                  <path d="M7 14v7"></path>
                  <path d="M17 3v3"></path>
                  <path d="M7 3v3"></path>
                </svg>
                VER SESIONES
              </button>
              <button class="danger-btn" onclick="closeAllSessions()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                CERRAR TODAS LAS SESIONES
              </button>
            </div>
          </div>
          <div class="security-section" style="margin-top:40px;">
            <h3 class="security-title">Autenticación de dos factores</h3>
            <p class="security-description">Protege tu cuenta con un código adicional</p>
            <div class="action-buttons">
              <button class="success-btn" onclick="enableTwoFactor()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 9.9-1"></path>
                </svg>
                VERIFICACIÓN EN DOS PASOS  
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- MÉTODOS DE PAGO -->
      <div class="profile-section" id="metodosPago">
        <div class="profile-header">
          <h1 class="profile-title">Tarjetas de crédito</h1>
          <button class="primary-btn" onclick="showCardForm()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
              <line x1="1" y1="10" x2="23" y2="10"></line>
              <line x1="10" y1="20" x2="14" y2="20"></line>
            </svg>
            AÑADIR TARJETA
          </button>
        </div>
        <div class="profile-card">
          <div class="card-list" id="cardList"></div>
          <div class="empty-state" id="emptyCardState">
            <div class="empty-icon">
              <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                <line x1="1" y1="10" x2="23" y2="10"></line>
              </svg>
            </div>
            <p class="empty-text">¡AÚN NO TIENES NINGÚN MÉTODO DE PAGO REGISTRADO!</p>
            <p class="empty-subtext">Agrega una tarjeta para pagar tus compras más rápido</p>
            <div class="action-buttons" style="justify-content:center; margin-top:30px;">
              <button class="primary-btn" onclick="showCardForm()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                  <line x1="1" y1="10" x2="23" y2="10"></line>
                  <path d="M4 16s1-1 4-1 5 2 8 2 4-1 4-1"></path>
                </svg>
                AÑADIR TARJETA
              </button>
            </div>
          </div>
          <div class="profile-card" id="cardFormContainer" style="display:none; margin-top: 30px;">
            <h2 style="font-size:24px; font-weight:700; color:var(--text-dark); margin-bottom:40px;">NUEVA TARJETA</h2>
            <p style="font-size:16px; color:var(--text-secondary); margin-bottom:30px;">INGRESA LOS DATOS DE TU TARJETA:</p>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:start;">
              <div>
                <form id="cardForm">
                  <div style="display:flex; flex-direction:column; gap:20px;">
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Número de la tarjeta</label>
                      <input type="text" class="form-input" id="cardNumber" placeholder="" maxlength="19" style="background:white;">
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Número impreso en la tarjeta</label>
                      <input type="text" class="form-input" id="cardName" placeholder="" style="background:white;">
                    </div>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                      <div class="form-group">
                        <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Válido hasta</label>
                        <input type="text" class="form-input" id="cardExpiry" placeholder="MM/AA" maxlength="5" style="background:white;">
                      </div>
                      <div class="form-group">
                        <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Código de seguridad</label>
                        <input type="text" class="form-input" id="cardCVV" placeholder="" maxlength="4" style="background:white;">
                      </div>
                    </div>
                  </div>
                  <h3 style="font-size:18px; font-weight:600; color:var(--text-dark); margin:40px 0 24px;">DIRECCIÓN DE FACTURACIÓN</h3>
                  <div style="display:flex; flex-direction:column; gap:20px;">
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">País</label>
                      <select class="form-input" id="billingCountry" style="background:white;">
                        <option value="colombia" selected>Colombia</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Departamento</label>
                      <select class="form-input" id="billingState" style="background:white;">
                        <option value="">Departamento</option>
                        <option value="antioquia">Antioquia</option>
                        <option value="cundinamarca">Cundinamarca</option>
                        <option value="valle">Valle del Cauca</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Municipio</label>
                      <select class="form-input" id="billingCity" style="background:white;">
                        <option value="">Municipio</option>
                        <option value="medellin">Medellín</option>
                        <option value="bogota">Bogotá</option>
                        <option value="cali">Cali</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Código postal</label>
                      <input type="text" class="form-input" id="billingPostal" placeholder="" style="background:white;">
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Calle</label>
                      <input type="text" class="form-input" id="billingStreet" placeholder="" style="background:white;">
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Información adicional (ej.: apto. 201)</label>
                      <input type="text" class="form-input" id="billingInfo" placeholder="Opcional" style="background:white;">
                    </div>
                    <div class="form-group">
                      <label class="form-label" style="font-size:13px; text-transform:none; font-weight:500;">Barrio</label>
                      <input type="text" class="form-input" id="billingNeighborhood" placeholder="Opcional" style="background:white;">
                    </div>
                    <div class="info-box" style="display:flex; gap:12px; padding:16px; background:#fff3cd; border-radius:8px; border-left:4px solid #856404;">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#856404" stroke-width="2" style="flex-shrink:0;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                      </svg>
                      <p style="margin:0; font-size:13px; line-height:1.5;">Puede que se le cargue una pequeña cantidad para autorizar la tarjeta. El monto se revertirá de forma automática en 3 a 5 días hábiles.</p>
                    </div>
                    <div class="action-buttons">
                      <button type="button" class="primary-btn" onclick="saveCard()">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                          <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        GUARDAR TARJETA
                      </button>
                      <button type="button" class="secondary-btn" onclick="cancelCardForm()">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <line x1="18" y1="6" x2="6" y2="18"></line>
                          <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        CANCELAR
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div style="position:sticky; top:140px;">
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
                  <div class="card-number" id="displayCardNumber">•••• •••• •••• ••••</div>
                  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-top:auto;">
                    <div style="flex:1;">
                      <div class="card-holder" id="displayCardHolder">NOMBRE</div>
                    </div>
                    <div style="text-align:right;">
                      <div class="card-expiry-label" style="font-size:11px; opacity:0.8;">Válida hasta</div>
                      <div class="card-expiry" id="displayCardExpiry">••/••</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- FAVORITOS -->
      <div class="profile-section" id="favoritos">
        <div class="profile-header">
          <h1 class="profile-title">Mis Favoritos</h1>
          <div class="action-buttons">
            <button class="secondary-btn" onclick="refreshFavorites()">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="1 4 1 10 7 10"></polyline>
                <polyline points="23 20 23 14 17 14"></polyline>
                <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
              </svg>
              ACTUALIZAR
            </button>
            <button class="danger-btn" onclick="clearAllFavorites()">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
              </svg>
              LIMPIAR TODO
            </button>
          </div>
        </div>
        <div class="profile-card">
          <div class="favorites-grid" id="favoritesGrid"></div>
          <div class="empty-state" id="emptyFavoritesState">
            <div class="empty-icon">
              <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </div>
            <p class="empty-text">¡AÚN NO TIENES PRODUCTOS FAVORITOS!</p>
            <p class="empty-subtext">Guarda tus productos favoritos para comprarlos más tarde</p>
            <div class="action-buttons" style="justify-content:center; margin-top:30px;">
              <button class="primary-btn" onclick="window.location.href='<?= APP_URL ?>/'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                EXPLORAR PRODUCTOS
              </button>
            </div>
          </div>
        </div>
      </div>

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
          <li><a href="<?= APP_URL ?>/documentos/Pedidos_envios">Pedidos y Envíos</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Politicas_devolucion">Devoluciones y Cambios</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Preguntas">Preguntas Frecuentes</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Guia_Tallas">Guía de Tallas</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Terminos">Términos y Condiciones</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Legal</h3>
        <ul class="footer-links">
          <li><a href="<?= APP_URL ?>/documentos/Politicas_Priv">Políticas de Privacidad</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Terminos">Términos y Condiciones</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Politicas_Env">Políticas de Envío</a></li>
          <li><a href="<?= APP_URL ?>/documentos/Politicas_devolucion">Políticas de Devolución</a></li>
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

  <!-- JavaScript externo -->
  <script src="<?= APP_URL ?>/assets/js/perfil.js"></script>
</body>
</html>