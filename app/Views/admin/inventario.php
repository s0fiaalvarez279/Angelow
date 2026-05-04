<?php
// Verificar autenticación y rol de administrador
if (!isset($_SESSION['user']) || ($_SESSION['user']['rol'] ?? '') !== 'administrador') {
    header('Location: ' . APP_URL . '/auth/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - ANGELOW</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/inventario.css">
    <!-- Librerías para PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
    <script>const APP_URL = '<?= APP_URL ?>';</script>
    <style>
   
    </style>
</head>
<body>

<header class="angelow-header">
    <a href="<?= APP_URL ?>/" class="logo">
        <img src="<?= APP_URL ?>/assets/imagenes/general/logos.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>INVENTARIO</span>
        </div>
    </a>
    <div class="icon-btn" onclick="window.location.href='<?= APP_URL ?>/'">
        <img src="<?= APP_URL ?>/assets/imagenes/general/volver.png" alt="Inicio" style="width:24px;">  
    </div>
</header>

<main class="main-container">
    <div class="section-header">
        <h2 class="section-title">Gestión de Inventario</h2>
        <div class="action-buttons">
            <button id="exportInventoryBtn" class="btn btn-secondary">Exportar a PDF</button>
            <button id="refreshInventoryBtn" class="btn btn-primary">Actualizar</button>
        </div>
    </div>

    <div class="inventory-filters">
        <div class="filter-group">
            <div class="filter-title">Estado del Stock</div>
            <div class="filter-options">
                <button class="filter-option active" data-inventory-filter="all">Todos</button>
                <button class="filter-option" data-inventory-filter="in-stock">En stock</button>
                <button class="filter-option" data-inventory-filter="low-stock">Stock bajo</button>
                <button class="filter-option" data-inventory-filter="out-of-stock">Sin stock</button>
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-title">Categoría</div>
            <select id="inventoryCategoryFilter" class="filter-select">
                <option value="all">Todas las categorías</option>
            </select>
        </div>
        <div class="filter-group">
            <div class="filter-title">Búsqueda</div>
            <input type="text" id="inventorySearchInput" class="search-input" placeholder="Buscar por nombre o ID...">
        </div>
    </div>

    <div class="inventory-summary">
        <div class="metric-card">
            <div class="metric-header">
                <div>
                    <div class="metric-value" id="totalProductsInventory">0</div>
                    <div class="metric-label">Total Productos</div>
                </div>
                <div class="metric-icon"><i class="fas fa-box"></i></div>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-header">
                <div>
                    <div class="metric-value" id="totalStockInventory">0</div>
                    <div class="metric-label">Unidades Totales</div>
                </div>
                <div class="metric-icon"><i class="fas fa-chart-line"></i></div>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-header">
                <div>
                    <div class="metric-value" id="outOfStockInventory">0</div>
                    <div class="metric-label">Productos Agotados</div>
                </div>
                <div class="metric-icon"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-header">
                <div>
                    <div class="metric-value" id="lowStockInventory">0</div>
                    <div class="metric-label">Stock Bajo</div>
                </div>
                <div class="metric-icon"><i class="fas fa-bell"></i></div>
            </div>
        </div>
    </div>

    <div class="inventory-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock Actual</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="inventoryTableBody">
                <!-- Datos dinámicos -->
            </tbody>
        </table>
    </div>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="<?= APP_URL ?>/assets/imagenes/general/logos.png" alt="ANGELOW">
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

<!-- Modal Editar Stock - Versión mejorada -->
<div class="modal-overlay" id="stockEditModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3><i class="fas fa-edit"></i> Editar Stock</h3>
            <button class="modal-close" onclick="closeStockEditModal()">✕</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label><i class="fas fa-tag"></i> Producto:</label>
                <p id="stockEditProductName" style="font-weight: 700; margin: 5px 0; background: var(--bg-soft); padding: 12px; border-radius: 12px;"></p>
            </div>
            <div class="form-group">
                <label><i class="fas fa-boxes"></i> Stock Actual:</label>
                <p id="stockEditCurrent" style="font-size: 2.2em; font-weight: 800; color: var(--primary); margin: 8px 0; text-align: center;"></p>
            </div>
            <div class="form-group">
                <label><i class="fas fa-exchange-alt"></i> Tipo de Cambio:</label>
                <select id="stockChangeType" class="form-input">
                    <option value="set">⚡ Establecer nuevo valor</option>
                    <option value="add">➕ Agregar unidades</option>
                    <option value="subtract">➖ Quitar unidades</option>
                </select>
            </div>
            <div class="form-group">
                <label><i class="fas fa-sort-amount-up"></i> Cantidad:</label>
                <div class="quantity-control">
                    <button type="button" class="qty-btn" id="decrementQty">−</button>
                    <input type="number" id="stockChangeAmount" class="quantity-input" value="0" min="0" step="1">
                    <button type="button" class="qty-btn" id="incrementQty">+</button>
                </div>
                <small id="qtyLimitHint" style="color: var(--text-secondary); font-size: 12px; display: block; margin-top: 8px;"></small>
            </div>
            <div class="form-group">
                <label><i class="fas fa-comment"></i> Motivo del cambio:</label>
                <textarea id="stockChangeReason" class="form-input" rows="2" placeholder="Ej: Nueva mercancía, devolución, ajuste..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeStockEditModal()">Cancelar</button>
            <button class="btn-save" onclick="updateStock()">Guardar cambios</button>
        </div>
    </div>
</div>

<script src="<?= APP_URL ?>/assets/js/inventario.js"></script>
</body>
</html>