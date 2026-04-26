<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Pedidos y Envíos - ANGELOW</title>
    <link rel="shortcut icon" href="../../IMG/favi.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* TODO EL ESTILO SE MANTIENE EXACTAMENTE IGUAL */
        :root { 
            --primary: #5E9DE6;
            --accent: #7FBBF2;
            --bg-light: #F8FBFE;
            --bg-soft: #EDF4FC;
            --text-dark: #1E3A8A;
            --text-secondary: #4B6A9B;
            --white: #ffffff;
            --shadow: rgba(94, 157, 230, 0.12);
            --border-light: #E0E7F5;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { 
            font-family: 'Inter', system-ui, sans-serif; 
            background: var(--bg-light); 
            color: var(--text-dark); 
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            position: sticky; 
            top: 0; 
            z-index: 100; 
            background: var(--white);
            border-bottom: 1px solid var(--border-light); 
            padding: 18px 30px;
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            box-shadow: 0 2px 15px var(--shadow);
        }

        .logo { 
            display: flex; 
            align-items: center; 
            gap: 20px; 
            text-decoration: none;
        }

        .logo-img { 
            width: 90px; 
            height: 90px; 
            object-fit: contain; 
            border-radius: 50%; 
            background: var(--bg-soft); 
        }

        .logo-text span:first-child { 
            font-size: 36px; 
            font-weight: 900; 
            color: var(--primary); 
        }

        .logo-text span:last-child { 
            font-size: 16px; 
            font-weight: 600; 
            color: var(--text-secondary); 
        }

        .terms-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 30px;
            flex: 1;
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            color: white;
            text-align: center;
        }

        .terms-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .terms-header h1 {
            font-size: 38px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .terms-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 40px;
            background: var(--white);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px var(--shadow);
            justify-content: center;
        }

        .nav-link {
            padding: 12px 25px;
            background: var(--bg-soft);
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
        }

        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .terms-content {
            background: var(--white);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 8px 25px var(--shadow);
        }

        .term-section {
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid var(--border-light);
        }

        .term-section h2 {
            color: var(--primary);
            font-size: 24px;
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 5px solid var(--accent);
        }

        .term-section p {
            color: var(--text-secondary);
            margin-bottom: 15px;
        }

        .term-section ul, .term-section ol {
            margin-left: 25px;
            color: var(--text-secondary);
        }

        footer {
            background: var(--text-dark);
            color: white;
            padding: 40px 20px;
            text-align: center;
            margin-top: auto;
        }

        html { scroll-behavior: smooth; }
    </style>
</head>
<body>

<header>
    <a href="inicio.html" class="logo"> 
        <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>PEDIDOS Y ENVÍOS</span>
        </div>
    </a>

    <div class="header-icons">
            <a href="inicio.html" class="icon-btn" title="Volver al inicio">
                <img src="https://img.icons8.com/ios-filled/50/home.png" alt="Inicio" style="width:24px; filter: brightness(0) saturate(100%) hue-rotate(210deg);">
            </a>
        </div>
</header>

<div class="terms-container">

    <div class="welcome-banner">
        <h2>POLÍTICAS DE PEDIDOS Y ENVÍOS</h2>
        <p>Información clara y detallada sobre el proceso de compra, despacho y entrega de productos.</p>
    </div>

    <div class="terms-header">
        <h1>GESTIÓN DE PEDIDOS Y ENVÍOS</h1>
        <p>Aplicable a todas las compras realizadas a través de www.angelow.com</p>
    </div>

    <div class="terms-nav">
        <a href="#pedido" class="nav-link active">Realización del Pedido</a>
        <a href="#confirmacion" class="nav-link">Confirmación</a>
        <a href="#procesamiento" class="nav-link">Procesamiento</a>
        <a href="#envio" class="nav-link">Envíos</a>
        <a href="#entrega" class="nav-link">Entrega</a>
        <a href="#incidencias" class="nav-link">Incidencias</a>
    </div>

    <div class="terms-content">

        <div class="term-section" id="pedido">
            <h2>1. REALIZACIÓN DEL PEDIDO</h2>
            <p>Para efectuar un pedido, el cliente debe seleccionar los productos deseados, verificar tallas, cantidades y características, y agregarlos al carrito de compra.</p>
            <p>Antes de confirmar el pedido, se debe revisar cuidadosamente la información de envío, datos personales y método de pago seleccionado. La confirmación implica la aceptación total de las condiciones comerciales vigentes.</p>
        </div>

        <div class="term-section" id="confirmacion">
            <h2>2. CONFIRMACIÓN DEL PEDIDO</h2>
            <p>Una vez realizado el pago, el sistema enviará un correo electrónico de confirmación con el número de pedido y el resumen de la compra.</p>
            <p>El cliente debe conservar dicho comprobante para cualquier consulta o solicitud relacionada con el proceso de envío o garantía.</p>
        </div>

        <div class="term-section" id="procesamiento">
            <h2>3. PROCESAMIENTO</h2>
            <p>Los pedidos se procesan en días hábiles. El tiempo estimado de preparación es de 1 a 2 días hábiles después de la confirmación del pago.</p>
            <p>En caso de presentarse inconvenientes con inventario o validación de pago, el cliente será notificado oportunamente para definir la solución correspondiente.</p>
        </div>

        <div class="term-section" id="envio">
            <h2>4. ENVÍOS</h2>
            <p>Los envíos se realizan a todo el territorio nacional mediante operadores logísticos autorizados.</p>
            <ul>
                <li>Ciudades principales: 2 a 5 días hábiles.</li>
                <li>Municipios y zonas apartadas: 5 a 10 días hábiles.</li>
            </ul>
            <p>Los tiempos son estimados y pueden variar por factores externos como condiciones climáticas o restricciones logísticas.</p>
        </div>

        <div class="term-section" id="entrega">
            <h2>5. ENTREGA DEL PRODUCTO</h2>
            <p>La entrega se realizará en la dirección registrada por el cliente. Es responsabilidad del comprador asegurar que la información proporcionada sea correcta y completa.</p>
            <p>En caso de ausencia en el domicilio, el operador logístico podrá realizar intentos adicionales según su política interna.</p>
        </div>

        <div class="term-section" id="incidencias">
            <h2>6. INCIDENCIAS Y RECLAMOS</h2>
            <p>Si el pedido llega incompleto, en mal estado o con errores, el cliente debe reportarlo dentro de las primeras 48 horas posteriores a la entrega.</p>
            <p>Para presentar una reclamación, se debe enviar evidencia fotográfica y número de pedido a través de los canales oficiales de atención.</p>
        </div>

    </div>

</div>

<footer>
    <p>&copy; <span id="currentYear"></span> ANGELOW. Todos los derechos reservados.</p>
</footer>

<script>
document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

</body>
</html>
