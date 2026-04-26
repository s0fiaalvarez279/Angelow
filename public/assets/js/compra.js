document.addEventListener('DOMContentLoaded', () => {
    cargarCarrito();
    seleccionarOpcionesPorDefecto();
    actualizarAnioFooter();
    cargarDatosUsuario(); // Cargar datos del usuario si está logueado
});

let carrito = [];
let descuentoAplicado = 0;
let codigoDescuento = "";
let costoEnvio = 0;
let datosUsuario = {};

// Cargar datos del usuario desde la sesión (inyectados por PHP)
function cargarDatosUsuario() {
    // Los datos del usuario están disponibles globalmente desde el HTML
    if (window.usuario && window.usuario.nombre) {
        datosUsuario = window.usuario;
        document.getElementById('nombre').value = datosUsuario.nombre || '';
        document.getElementById('apellidos').value = datosUsuario.apellido || '';
        document.getElementById('email').value = datosUsuario.email || '';
        document.getElementById('cedula').value = datosUsuario.cedula || '';
        document.getElementById('telefono').value = datosUsuario.telefono || '';
    }
}

//  NOTIFICACIONES 
function showToast(mensaje, tipo = 'info') {
    const contenedor = document.getElementById('toastContainer');
    if (!contenedor) return;
    const toast = document.createElement('div');
    toast.className = `toast ${tipo}`;
    toast.innerHTML = `<span>${mensaje}</span>`;
    contenedor.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

//  CÁLCULO DE DESCUENTOS 
function calcularDescuento(codigo, subtotal) {
    const tabla = {
        'BIENVENIDA10': subtotal * 0.10,
        'ANGELOW20': subtotal * 0.20,
        'DESCUENTO5': subtotal * 0.05
    };
    return tabla[codigo] || 0;
}

//  CARGAR CARRITO 
function cargarCarrito() {
    const store = localStorage.getItem('cart');
    if (store) {
        try {
            carrito = JSON.parse(store);
        } catch(e) {
            carrito = [];
        }
    } else {
        carrito = [];
    }
    renderizarResumen();
}

//  RENDERIZAR RESUMEN CON LAS IMÁGENES REALES DEL CARRITO 
function renderizarResumen() {
    const contenedor = document.getElementById('summaryItems');
    if (!contenedor) return;
    if (carrito.length === 0) {
        contenedor.innerHTML = '<div class="empty-cart">No hay productos en el carrito</div>';
        actualizarTotales();
        return;
    }
    let html = '';
    carrito.forEach(item => {
        const precio = item.price || item.precio || 0;
        const cantidad = item.quantity || item.cantidad || 1;
        const nombre = item.name || item.nombre || 'Producto';
        const imagen = item.imgs?.[0] || item.imagen || item.image || '';
        const talla = item.selectedSize || item.talla || 'Única';
        html += `
            <div class="summary-item">
                ${imagen ? `<img src="${imagen.startsWith('http') ? imagen : window.APP_URL + '/' + imagen}" alt="${nombre}" onerror="this.style.display='none'">` : '<div class="no-image">Sin imagen</div>'}
                <div class="summary-item-info">
                    <h4>${nombre}</h4>
                    <p>Cantidad: ${cantidad} | Talla: ${talla}</p>
                    <div class="summary-item-price">COP $${(precio * cantidad).toLocaleString()}</div>
                </div>
            </div>
        `;
    });
    contenedor.innerHTML = html;
    actualizarTotales();
}

//  ACTUALIZAR TOTALES 
function actualizarTotales() {
    let subtotal = carrito.reduce((sum, p) => sum + (p.price || p.precio || 0) * (p.quantity || p.cantidad || 1), 0);
    let total = subtotal - descuentoAplicado + costoEnvio;
    if (total < 0) total = 0;
    document.getElementById('summarySubtotal').innerText = `COP $${subtotal.toLocaleString()}`;
    document.getElementById('summaryShipping').innerText = costoEnvio === 0 ? "Gratis" : `COP $${costoEnvio.toLocaleString()}`;
    const descRow = document.getElementById('discountRow');
    if (descuentoAplicado > 0) {
        descRow.style.display = 'flex';
        document.getElementById('discountCode').innerText = codigoDescuento;
        document.getElementById('summaryDiscount').innerText = `- COP $${descuentoAplicado.toLocaleString()}`;
    } else {
        descRow.style.display = 'none';
    }
    document.getElementById('summaryTotal').innerText = `COP $${total.toLocaleString()}`;
}

//  CUPÓN 
window.applyPromo = function() {
    const input = document.getElementById('promoInput');
    if (!input) return;
    const code = input.value.trim().toUpperCase();
    if (!code) {
        showToast('Ingresa un código', 'warning');
        return;
    }
    let subtotal = carrito.reduce((sum, p) => sum + (p.price || p.precio || 0) * (p.quantity || p.cantidad || 1), 0);
    const desc = calcularDescuento(code, subtotal);
    if (desc > 0) {
        descuentoAplicado = desc;
        codigoDescuento = code;
        localStorage.setItem('promoCode', code);
        showToast(`Cupón ${code} aplicado: -$${desc.toLocaleString()}`, 'success');
    } else {
        showToast('Código inválido', 'error');
        descuentoAplicado = 0;
        codigoDescuento = "";
        localStorage.removeItem('promoCode');
    }
    actualizarTotales();
};

//  ENVÍO 
window.selectShipping = function(element) {
    document.querySelectorAll('.shipping-option').forEach(opt => opt.classList.remove('selected'));
    element.classList.add('selected');
    const radio = element.querySelector('input[type="radio"]');
    if (radio) radio.checked = true;
    const tipo = element.getAttribute('data-shipping') || element.querySelector('input').value;
    costoEnvio = (tipo === 'express') ? 15000 : 0;
    actualizarTotales();
};

//  PAGO 
window.selectPayment = function(element) {
    document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('selected'));
    element.classList.add('selected');
    const radio = element.querySelector('input[type="radio"]');
    if (radio) radio.checked = true;
};

//  OPCIONES POR DEFECTO 
function seleccionarOpcionesPorDefecto() {
    const normal = document.querySelector('.shipping-option[data-shipping="normal"]');
    if (normal) window.selectShipping(normal);
    const pse = document.querySelector('.payment-option[data-payment="pse"]');
    if (pse) window.selectPayment(pse);
}

//  NAVEGACIÓN ENTRE PASOS 
window.goToStep = function(step) {
    if (step === 2) {
        const email = document.getElementById('email').value;
        const nombre = document.getElementById('nombre').value;
        const apellidos = document.getElementById('apellidos').value;
        const cedula = document.getElementById('cedula').value;
        const telefono = document.getElementById('telefono').value;
        const terms = document.getElementById('acceptTerms').checked;
        if (!email || !nombre || !apellidos || !cedula || !telefono) {
            showToast('Completa identificación', 'error');
            return;
        }
        if (!terms) {
            showToast('Acepta términos', 'error');
            return;
        }
    }
    if (step === 3) {
        const depto = document.getElementById('departamento').value;
        const city = document.getElementById('municipio').value;
        const dir = document.getElementById('direccion').value;
        const barrio = document.getElementById('barrio').value;
        if (!depto || !city || !dir || !barrio) {
            showToast('Completa datos de envío', 'error');
            return;
        }
    }

    document.querySelectorAll('.step-content').forEach(c => c.classList.remove('active'));
    document.getElementById(`content${step}`).classList.add('active');

    for (let i = 1; i <= 3; i++) {
        const stepDiv = document.getElementById(`step${i}`);
        if (i <= step) {
            stepDiv.classList.add('completed');
            if (i === step) stepDiv.classList.add('active');
            else stepDiv.classList.remove('active');
        } else {
            stepDiv.classList.remove('active', 'completed');
        }
    }
    const line = document.getElementById('progressLine');
    if (line) {
        const width = ((step - 1) / 2) * 100;
        line.style.width = `${width}%`;
    }

    if (step === 3) actualizarTotales();
};

//  COMPLETAR COMPRA (envía al controlador MVC y redirige a factura)
window.completePurchase = async function() {
    // Validaciones previas
    if (!document.getElementById('acceptTerms')?.checked) {
        showToast('Debes aceptar los términos y condiciones', 'error');
        return;
    }
    const email = document.getElementById('email').value;
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const cedula = document.getElementById('cedula').value;
    const telefono = document.getElementById('telefono').value;
    if (!email || !nombre || !apellidos || !cedula || !telefono) {
        showToast('Completa identificación', 'error');
        window.goToStep(1);
        return;
    }
    const depto = document.getElementById('departamento').value;
    const city = document.getElementById('municipio').value;
    const dir = document.getElementById('direccion').value;
    const barrio = document.getElementById('barrio').value;
    if (!depto || !city || !dir || !barrio) {
        showToast('Completa envío', 'error');
        window.goToStep(2);
        return;
    }

    showToast('Procesando compra...', 'info');

    // Obtener carrito actual (asegurando el formato correcto)
    const cartActual = JSON.parse(localStorage.getItem('cart') || '[]');
    if (cartActual.length === 0) {
        showToast('El carrito está vacío', 'error');
        return;
    }

    let subtotal = 0;
    const productos = cartActual.map(item => {
        const precio = item.price || item.precio || 0;
        const cant = item.quantity || item.cantidad || 1;
        subtotal += precio * cant;
        return {
            nombre: item.name || item.nombre,
            precio: precio,
            cantidad: cant,
            talla: item.selectedSize || item.talla || 'Única',
            referencia: item.referencia || 'GEN-001',
            color: item.color || 'Standard',
            imagen: item.imgs?.[0] || item.imagen || item.image || ''
        };
    });
    const total = subtotal - descuentoAplicado + costoEnvio;
    const metodoEnvio = document.querySelector('input[name="shipping"]:checked')?.value || 'normal';
    const metodoPago = document.querySelector('input[name="payment"]:checked')?.value || 'mercadopago';
    const infoAdicional = document.getElementById('infoAdicional').value || '';
    const destinatario = document.getElementById('destinatario').value || `${nombre} ${apellidos}`;

    const orderData = {
        cliente: { email, nombre, apellidos, cedula, telefono },
        envio: { 
            departamento: depto, 
            municipio: city, 
            direccion: dir, 
            barrio, 
            info_adicional: infoAdicional, 
            destinatario,
            metodo_envio: metodoEnvio
        },
        productos,
        metodo_pago: metodoPago,
        descuento: descuentoAplicado,
        codigo_descuento: codigoDescuento || null,
        total
    };

    try {
        // Enviar al endpoint del controlador
        const response = await fetch(`${window.APP_URL}/procesar-compra`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(orderData)
        });

        const result = await response.json();

        if (result.success) {
            // Guardar datos de la factura en sessionStorage para la página de factura
            const facturaData = {
                numero: result.numero_factura,
                fecha: new Date().toLocaleDateString('es-CO'),
                metodoPago: metodoPago === 'mercadopago' ? 'Mercado Pago' : 'PSE / Botón de Pago',
                direccion: `${dir}, ${barrio}, ${city}, ${depto}`,
                destinatario: destinatario,
                metodoEnvio: metodoEnvio === 'express' ? 'Envío Express · 1 día hábil (Coordinadora)' : 'Envío Normal · 2-5 días',
                subtotal: subtotal,
                envio: costoEnvio,
                descuento: descuentoAplicado,
                codigoDescuento: codigoDescuento,
                total: total,
                productos: productos.map(p => ({
                    nombre: p.nombre,
                    talla: p.talla,
                    cantidad: p.cantidad,
                    precioUnitario: p.precio
                }))
            };
            sessionStorage.setItem('facturaData', JSON.stringify(facturaData));

            // Limpiar carrito y cupón
            localStorage.removeItem('cart');
            localStorage.removeItem('promoCode');
            carrito = [];
            descuentoAplicado = 0;
            codigoDescuento = "";

            // Mostrar pantalla de éxito
            document.getElementById('orderNumber').textContent = result.numero_factura;
            document.getElementById('orderEmail').textContent = email;
            document.querySelectorAll('.step-content').forEach(c => c.classList.remove('active'));
            document.getElementById('contentSuccess').classList.add('active');
            const progress = document.querySelector('.progress-container');
            if (progress) progress.style.display = 'none';

            showToast(`✅ Compra completada. Pedido #${result.numero_factura}`, 'success');
        } else {
            showToast(result.message || 'Error al procesar la compra', 'error');
        }
    } catch (error) {
        console.error('Error en la compra:', error);
        showToast('Error de conexión con el servidor', 'error');
    }
};

function actualizarAnioFooter() {
    const yearSpan = document.getElementById('currentYear');
    if (yearSpan) yearSpan.textContent = new Date().getFullYear();
}