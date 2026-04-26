<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Envío - ANGELOW</title>
    <link rel="shortcut icon" href="../../IMG/favi.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
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

        .welcome-banner h2 {
            font-size: 32px;
            margin-bottom: 15px;
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
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-2px);
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

        .term-section:last-child {
            border-bottom: none;
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
            line-height: 1.8;
        }

        .term-section ul, .term-section ol {
            margin-left: 25px;
            color: var(--text-secondary);
            line-height: 1.8;
        }

        .term-section li {
            margin-bottom: 10px;
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(94, 157, 230, 0.1), rgba(127, 187, 242, 0.1));
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            border: 2px solid var(--accent);
        }

        .highlight-box h3 {
            color: var(--primary);
            margin-bottom: 15px;
            font-size: 20px;
        }

        .highlight-box p {
            color: var(--text-secondary);
            margin-bottom: 10px;
        }

        .highlight-box ul {
            margin-left: 20px;
            margin-top: 10px;
        }

        .price-table {
            background: var(--bg-soft);
            padding: 30px;
            border-radius: 15px;
            margin: 25px 0;
        }

        .price-table h3 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 22px;
            text-align: center;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: white;
            margin-bottom: 10px;
            border-radius: 10px;
            border-left: 4px solid var(--accent);
        }

        .price-row:hover {
            box-shadow: 0 4px 15px var(--shadow);
            transform: translateX(5px);
            transition: all 0.3s ease;
        }

        .price-location {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 16px;
        }

        .price-amount {
            font-weight: 700;
            color: var(--primary);
            font-size: 18px;
        }

        .price-free {
            color: #4CAF50;
            font-weight: 700;
        }

        .time-table {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }

        .time-card {
            background: var(--bg-soft);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .time-card:hover {
            border-color: var(--accent);
            box-shadow: 0 4px 15px var(--shadow);
            transform: translateY(-5px);
        }

        .time-card h4 {
            color: var(--primary);
            margin-bottom: 15px;
            font-size: 20px;
            text-align: center;
        }

        .time-info {
            text-align: center;
            color: var(--text-secondary);
            line-height: 1.8;
        }

        .time-days {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            display: block;
            margin: 15px 0;
        }

        .process-steps {
            background: var(--bg-soft);
            padding: 30px;
            border-radius: 15px;
            margin: 25px 0;
        }

        .process-steps h3 {
            color: var(--primary);
            margin-bottom: 25px;
            font-size: 22px;
            text-align: center;
        }

        .step-item {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            border-left: 4px solid var(--accent);
            transition: all 0.3s ease;
        }

        .step-item:hover {
            box-shadow: 0 4px 15px var(--shadow);
            transform: translateX(5px);
        }

        .step-number {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
        }

        .step-content h4 {
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 18px;
        }

        .step-content p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .tip-box {
            background: #FFF8E1;
            border-left: 4px solid #FFC107;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .tip-box h4 {
            color: #F57C00;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .tip-box p {
            color: #5D4037;
            line-height: 1.7;
        }

        .important-box {
            background: #FFEBEE;
            border-left: 4px solid #E53935;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .important-box h4 {
            color: #C62828;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .important-box p {
            color: #5D4037;
            line-height: 1.7;
        }

        .success-box {
            background: #E8F5E9;
            border-left: 4px solid #4CAF50;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .success-box h4 {
            color: #2E7D32;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .success-box p {
            color: #1B5E20;
            line-height: 1.7;
        }

        .carrier-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }

        .carrier-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid var(--border-light);
            text-align: center;
            transition: all 0.3s ease;
        }

        .carrier-card:hover {
            border-color: var(--accent);
            box-shadow: 0 4px 15px var(--shadow);
            transform: translateY(-5px);
        }

        .carrier-logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .carrier-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .carrier-info {
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.6;
        }

        footer {
            background: var(--text-dark);
            color: white;
            padding: 40px 20px;
            text-align: center;
            margin-top: auto;
        }

        footer p {
            margin-bottom: 10px;
        }

        .footer-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        html { scroll-behavior: smooth; }

        @media (max-width: 768px) {
            .logo-text span:first-child { font-size: 28px; }
            .logo-img { width: 70px; height: 70px; }
            .terms-header h1 { font-size: 28px; }
            .terms-content { padding: 25px; }
            .term-section h2 { font-size: 20px; }
            .time-table { grid-template-columns: 1fr; }
            .carrier-grid { grid-template-columns: 1fr; }
            .price-row { flex-direction: column; gap: 10px; text-align: center; }
        }
    </style>
</head>
<body>

<header>
    <a href="inicio.html" class="logo"> 
        <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>POLÍTICAS DE ENVÍO</span>
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
        <h2>POLÍTICAS DE ENVÍO</h2>
        <p>Información detallada sobre costos, tiempos y procedimientos de envío a todo Colombia</p>
    </div>

    <div class="terms-header">
        <h1>ENVÍOS A TODO EL PAÍS</h1>
        <p>Conoce nuestros métodos de envío, tiempos de entrega y condiciones de despacho</p>
    </div>

    <div class="terms-nav">
        <a href="#cobertura" class="nav-link active">Cobertura</a>
        <a href="#costos" class="nav-link">Costos</a>
        <a href="#tiempos" class="nav-link">Tiempos</a>
        <a href="#proceso" class="nav-link">Proceso</a>
        <a href="#seguimiento" class="nav-link">Seguimiento</a>
        <a href="#condiciones" class="nav-link">Condiciones</a>
        <a href="#problemas" class="nav-link">Problemas</a>
    </div>

    <div class="terms-content">

        <div class="success-box">
            <h4>Envío Gratis en Compras Superiores a $150.000</h4>
            <p>Disfruta de envío gratuito a cualquier destino en Colombia cuando tu compra supere los ciento cincuenta mil pesos. Esta promoción aplica automáticamente al finalizar tu compra.</p>
        </div>

        <div class="term-section" id="cobertura">
            <h2>1. COBERTURA NACIONAL</h2>
            
            <p>ANGELOW realiza envíos a todo el territorio nacional colombiano, garantizando que nuestros productos lleguen a cada rincón del país.</p>

            <div class="highlight-box">
                <h3>Zonas de Cobertura</h3>
                <p>Nuestro servicio de envío cubre:</p>
                <ul>
                    <li><strong>Ciudades principales:</strong> Bogotá, Medellín, Cali, Barranquilla, Cartagena, Bucaramanga, Pereira, Cúcuta, Manizales, Santa Marta, Ibagué, Villavicencio, Pasto, Armenia, entre otras.</li>
                    <li><strong>Ciudades intermedias:</strong> Todas las capitales de departamento y ciudades con población superior a 50.000 habitantes.</li>
                    <li><strong>Municipios pequeños:</strong> Localidades de menor tamaño con cobertura de nuestros operadores logísticos.</li>
                    <li><strong>Zonas rurales:</strong> Veredas y corregimientos con acceso logístico disponible.</li>
                </ul>
            </div>

            <div class="important-box">
                <h4>Zonas con Restricciones</h4>
                <p>Algunas zonas muy apartadas o de difícil acceso pueden tener limitaciones en tiempos de entrega o requerir costos adicionales. Esto incluye algunas áreas de la Amazonía, Orinoquía y zonas de alta montaña. Te informaremos durante el proceso de compra si tu dirección tiene alguna restricción.</p>
            </div>

            <div class="carrier-grid">
                <div class="carrier-card">
                    <div class="carrier-logo">SERVIENTREGA</div>
                    <div class="carrier-name">Servientrega</div>
                    <div class="carrier-info">Cobertura nacional completa con tiempos de entrega competitivos</div>
                </div>
                <div class="carrier-card">
                    <div class="carrier-logo">COORDINADORA</div>
                    <div class="carrier-name">Coordinadora</div>
                    <div class="carrier-info">Amplia red de distribución en todo el país</div>
                </div>
                <div class="carrier-card">
                    <div class="carrier-logo">INTERRAPIDÍSIMO</div>
                    <div class="carrier-name">Interrapidísimo</div>
                    <div class="carrier-info">Especialistas en envíos rápidos y seguros</div>
                </div>
                <div class="carrier-card">
                    <div class="carrier-logo">DEPRISA</div>
                    <div class="carrier-name">Deprisa</div>
                    <div class="carrier-info">Envíos confiables a nivel nacional</div>
                </div>
            </carrier-grid>

            <p style="margin-top: 20px;">El operador logístico específico para tu pedido será asignado según la disponibilidad, destino y características del envío. Siempre seleccionamos el proveedor más eficiente para garantizar una entrega rápida y segura.</p>
        </div>

        <div class="term-section" id="costos">
            <h2>2. COSTOS DE ENVÍO</h2>
            
            <p>Los costos de envío varían según el destino de entrega y el valor total de la compra. A continuación, detallamos nuestra estructura de precios:</p>

            <div class="price-table">
                <h3>Tarifas por Destino</h3>
                
                <div class="price-row">
                    <span class="price-location">Compras superiores a $150.000</span>
                    <span class="price-amount price-free">ENVÍO GRATIS</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Bogotá D.C.</span>
                    <span class="price-amount">$10.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Medellín</span>
                    <span class="price-amount">$12.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Cali</span>
                    <span class="price-amount">$13.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Barranquilla</span>
                    <span class="price-amount">$14.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Cartagena</span>
                    <span class="price-amount">$15.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Bucaramanga, Pereira, Cúcuta, Manizales</span>
                    <span class="price-amount">$13.000 - $15.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Otras ciudades principales</span>
                    <span class="price-amount">$15.000 - $18.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Ciudades intermedias</span>
                    <span class="price-amount">$18.000 - $22.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Municipios pequeños</span>
                    <span class="price-amount">$22.000 - $28.000 COP</span>
                </div>

                <div class="price-row">
                    <span class="price-location">Zonas rurales y apartadas</span>
                    <span class="price-amount">$28.000 - $40.000 COP</span>
                </div>
            </div>

            <div class="tip-box">
                <h4>Cálculo Automático</h4>
                <p>El costo exacto de envío se calculará automáticamente al ingresar tu dirección de destino durante el proceso de compra. Podrás ver el monto final antes de confirmar tu pedido.</p>
            </div>

            <div class="highlight-box">
                <h3>Factores que Afectan el Costo</h3>
                <ul>
                    <li><strong>Destino:</strong> La ubicación geográfica es el principal factor en el costo de envío.</li>
                    <li><strong>Peso y volumen:</strong> Pedidos de mayor tamaño pueden tener tarifas adicionales.</li>
                    <li><strong>Valor declarado:</strong> Productos de mayor valor requieren seguro adicional incluido.</li>
                    <li><strong>Zona de entrega:</strong> Áreas urbanas vs. rurales tienen tarifas diferenciadas.</li>
                </ul>
            </div>

            <p style="margin-top: 20px;"><strong>Nota importante:</strong> Todos los envíos incluyen seguro básico hasta por el valor del producto. No hay costos ocultos; el precio que ves al finalizar la compra es el precio final que pagas.</p>
        </div>

        <div class="term-section" id="tiempos">
            <h2>3. TIEMPOS DE ENTREGA</h2>
            
            <p>Los tiempos de entrega son estimados y comienzan a contar desde el momento en que el pedido es despachado (no desde la confirmación de compra). Estos tiempos son calculados en días hábiles, excluyendo sábados, domingos y festivos.</p>

            <div class="time-table">
                <div class="time-card">
                    <h4>Ciudades Principales</h4>
                    <span class="time-days">2-5</span>
                    <div class="time-info">
                        días hábiles
                        <br><br>
                        Bogotá, Medellín, Cali, Barranquilla, Cartagena, Bucaramanga
                    </div>
                </div>

                <div class="time-card">
                    <h4>Ciudades Intermedias</h4>
                    <span class="time-days">4-7</span>
                    <div class="time-info">
                        días hábiles
                        <br><br>
                        Capitales de departamento y ciudades medianas
                    </div>
                </div>

                <div class="time-card">
                    <h4>Municipios Pequeños</h4>
                    <span class="time-days">5-10</span>
                    <div class="time-info">
                        días hábiles
                        <br><br>
                        Localidades de menor tamaño con cobertura logística
                    </div>
                </div>

                <div class="time-card">
                    <h4>Zonas Rurales</h4>
                    <span class="time-days">7-15</span>
                    <div class="time-info">
                        días hábiles
                        <br><br>
                        Áreas apartadas y de difícil acceso
                    </div>
                </div>
            </div>

            <div class="important-box">
                <h4>Factores que Pueden Afectar los Tiempos</h4>
                <p>Los tiempos de entrega son estimados y pueden verse afectados por circunstancias externas como:</p>
                <ul style="margin-top: 10px;">
                    <li>Condiciones climáticas adversas (lluvias, derrumbes, inundaciones)</li>
                    <li>Temporadas de alta demanda (Navidad, Día de la Madre, Black Friday)</li>
                    <li>Paros o restricciones de movilidad</li>
                    <li>Festividades locales o nacionales</li>
                    <li>Situaciones de orden público</li>
                    <li>Restricciones viales o cierres de carreteras</li>
                </ul>
            </div>

            <div class="highlight-box">
                <h3>Tiempo de Procesamiento</h3>
                <p>Antes del envío, los pedidos pasan por un proceso de preparación:</p>
                <ul>
                    <li><strong>Verificación de pago:</strong> 1-2 horas (pagos electrónicos inmediatos)</li>
                    <li><strong>Preparación del pedido:</strong> 1-2 días hábiles</li>
                    <li><strong>Empaque y etiquetado:</strong> Incluido en preparación</li>
                    <li><strong>Entrega al transportador:</strong> Mismo día de preparación</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Tiempo total:</strong> Los tiempos de entrega mencionados incluyen el procesamiento del pedido más el tiempo de transporte.</p>
            </div>

            <div class="tip-box">
                <h4>Planifica tus Compras</h4>
                <p>Si necesitas el producto para una fecha específica, te recomendamos realizar tu compra con al menos 10 días de anticipación. Para zonas rurales o apartadas, considera un margen de 20 días.</p>
            </div>
        </div>

        <div class="term-section" id="proceso">
            <h2>4. PROCESO DE ENVÍO</h2>
            
            <p>Nuestro proceso de envío está diseñado para ser transparente y eficiente. Conoce cada etapa desde que realizas tu pedido hasta que llega a tus manos.</p>

            <div class="process-steps">
                <h3>Etapas del Proceso de Envío</h3>

                <div class="step-item">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Confirmación del Pedido</h4>
                        <p>Una vez completado el pago, recibirás un correo electrónico de confirmación con el número de pedido único y el resumen de tu compra. Guarda este correo para futuras referencias.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Verificación de Pago</h4>
                        <p>Nuestro sistema verifica automáticamente el pago. Los pagos con tarjeta y PSE son inmediatos. Los pagos en efectivo pueden tardar hasta 24 horas en confirmarse.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Preparación del Pedido</h4>
                        <p>Nuestro equipo recoge los productos de tu pedido del almacén, verifica que todo esté correcto y en perfecto estado. Revisamos talla, color y cantidad de cada artículo.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Empaque Seguro</h4>
                        <p>Empacamos cuidadosamente tu pedido utilizando materiales de calidad que protegen los productos durante el transporte. Cada paquete es sellado y etiquetado correctamente.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h4>Despacho y Guía</h4>
                        <p>Entregamos tu paquete al operador logístico y generamos el número de guía de seguimiento. Recibirás un correo con este número y un enlace para rastrear tu envío en tiempo real.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h4>Tránsito</h4>
                        <p>Tu paquete está en camino. El operador logístico lo transporta a través de su red de distribución hasta llegar a la ciudad de destino. Puedes hacer seguimiento en línea.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">7</div>
                    <div class="step-content">
                        <h4>Última Milla</h4>
                        <p>El paquete llega a la oficina de distribución local. Un mensajero es asignado para realizar la entrega en tu dirección. Puede contactarte telefónicamente antes de la entrega.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">8</div>
                    <div class="step-content">
                        <h4>Entrega Final</h4>
                        <p>El mensajero entrega tu paquete en la dirección registrada. Debes presentar tu documento de identidad. Verifica que el paquete esté sellado antes de firmar la recepción.</p>
                    </div>
                </div>
            </div>

            <div class="success-box">
                <h4>Comunicación Constante</h4>
                <p>Durante todo el proceso, mantenemos comunicación contigo a través de correos electrónicos automáticos que te informan sobre cada cambio de estado de tu pedido. También puedes contactarnos en cualquier momento si tienes preguntas.</p>
            </div>
        </div>

        <div class="term-section" id="seguimiento">
            <h2>5. SEGUIMIENTO DE ENVÍOS</h2>
            
            <p>Ofrecemos seguimiento completo de tu pedido desde el momento en que sale de nuestras instalaciones hasta que llega a tus manos.</p>

            <div class="highlight-box">
                <h3>Cómo Hacer Seguimiento</h3>
                <p>Una vez tu pedido sea despachado, tendrás acceso a múltiples formas de rastrearlo:</p>
                <ul>
                    <li><strong>Correo electrónico:</strong> Recibirás el número de guía y un enlace directo de seguimiento.</li>
                    <li><strong>Página web de ANGELOW:</strong> Ingresa a tu cuenta y ve a "Mis Pedidos".</li>
                    <li><strong>Sitio web del transportador:</strong> Usa el número de guía en la página del operador logístico.</li>
                    <li><strong>WhatsApp:</strong> Envíanos tu número de pedido para consultar el estado.</li>
                    <li><strong>Aplicación móvil del transportador:</strong> Algunos operadores tienen apps con seguimiento en tiempo real.</li>
                </ul>
            </div>

            <div class="process-steps">
                <h3>Estados de Seguimiento</h3>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>Pedido Recibido</h4>
                        <p>Tu pedido ha sido confirmado y está en proceso de preparación en nuestras instalaciones.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>En Preparación</h4>
                        <p>Estamos recogiendo y empacando los productos de tu pedido.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>Despachado</h4>
                        <p>Tu paquete ha sido entregado al operador logístico y está en camino.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>En Tránsito</h4>
                        <p>Tu paquete está siendo transportado hacia la ciudad de destino.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>En Centro de Distribución</h4>
                        <p>Tu paquete ha llegado a la oficina local y será asignado a un mensajero.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>En Reparto</h4>
                        <p>Un mensajero está en ruta para entregar tu paquete. Puede contactarte pronto.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">•</div>
                    <div class="step-content">
                        <h4>Entregado</h4>
                        <p>Tu paquete ha sido entregado exitosamente. Disfruta tus productos ANGELOW.</p>
                    </div>
                </div>
            </div>

            <div class="tip-box">
                <h4>Actualizaciones del Estado</h4>
                <p>El estado de seguimiento se actualiza cada vez que tu paquete pasa por un punto de control en la red logística. Esto puede tomar algunas horas, especialmente durante tránsitos largos. Si el estado no se actualiza por más de 48 horas, contáctanos.</p>
            </div>
        </div>

        <div class="term-section" id="condiciones">
            <h2>6. CONDICIONES DE ENTREGA</h2>
            
            <p>Para garantizar una entrega exitosa, es importante conocer y cumplir con las siguientes condiciones:</p>

            <div class="highlight-box">
                <h3>Requisitos para la Entrega</h3>
                <ul>
                    <li><strong>Dirección completa y correcta:</strong> Incluye dirección exacta, barrio, ciudad, departamento y referencias importantes (conjunto, torre, apartamento).</li>
                    <li><strong>Teléfono de contacto:</strong> Proporciona un número activo donde el mensajero pueda contactarte.</li>
                    <li><strong>Persona mayor de edad:</strong> Quien reciba debe ser mayor de 18 años y presentar documento de identidad.</li>
                    <li><strong>Verificar el paquete:</strong> Inspecciona que el paquete esté sellado antes de firmar la recepción.</li>
                </ul>
            </div>

            <div class="term-section">
                <h3>Intentos de Entrega</h3>
                <p>Si no estás disponible en el momento de la entrega:</p>
                <ul>
                    <li><strong>Primer intento:</strong> El mensajero intentará la entrega en la dirección registrada.</li>
                    <li><strong>Segundo intento:</strong> Si no hay respuesta, dejará un aviso y realizará un segundo intento al día siguiente.</li>
                    <li><strong>Tercer intento:</strong> En caso de no lograr contacto, realizará un último intento.</li>
                    <li><strong>Disponible en oficina:</strong> Después de tres intentos, el paquete quedará disponible para recoger en la oficina del transportador más cercana durante 5 días hábiles.</li>
                    <li><strong>Devolución:</strong> Si no se recoge en 5 días, el paquete será devuelto a ANGELOW.</li>
                </ul>
            </div>

            <div class="important-box">
                <h4>Cambio de Dirección</h4>
                <p>Una vez el pedido ha sido despachado, NO es posible cambiar la dirección de entrega. Si necesitas modificar la dirección, debe ser antes del despacho. Contáctanos inmediatamente si cometiste un error al registrar tu dirección.</p>
            </div>

            <div class="term-section">
                <h3>Entrega a Terceros</h3>
                <p>Si no puedes recibir personalmente el pedido, este puede ser entregado a:</p>
                <ul>
                    <li>Familiar o amigo en tu domicilio</li>
                    <li>Personal de seguridad del conjunto o edificio (con autorización previa)</li>
                    <li>Cualquier persona mayor de edad que se encuentre en la dirección registrada</li>
                </ul>
                <p style="margin-top: 10px;"><strong>Importante:</strong> La persona que reciba debe presentar documento de identidad y firmará la guía de recepción. Una vez firmada, se considera entregado el pedido.</p>
            </div>

            <div class="tip-box">
                <h4>Recomendaciones para una Entrega Exitosa</h4>
                <p>Proporciona referencias detalladas de tu dirección (cerca de, frente a, al lado de). Indica el mejor horario para recibir el paquete. Mantén tu teléfono disponible los días cercanos a la entrega. Si vives en conjunto cerrado, informa al personal de seguridad que esperas un paquete.</p>
            </div>
        </div>

        <div class="term-section" id="problemas">
            <h2>7. PROBLEMAS CON EL ENVÍO</h2>
            
            <p>Si experimentas algún problema con tu envío, estamos aquí para ayudarte a resolverlo rápidamente.</p>

            <div class="highlight-box">
                <h3>Situaciones Comunes y Soluciones</h3>
            </div>

            <div class="process-steps">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Retraso en la Entrega</h4>
                        <p><strong>Qué hacer:</strong> Si tu pedido no llega en el tiempo estimado, primero verifica el estado de seguimiento. Si han pasado más de 3 días del tiempo máximo estimado, contáctanos con tu número de pedido y guía de envío. Investigaremos inmediatamente con el operador logístico.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Paquete Dañado</h4>
                        <p><strong>Qué hacer:</strong> Si el paquete llega con daños visibles, NO lo aceptes y repórtalo inmediatamente al mensajero. Si ya lo recibiste y después detectas daños, tienes 24 horas para reportarlo con fotos del empaque y productos. Te enviaremos un reemplazo sin costo.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Producto Incorrecto o Faltante</h4>
                        <p><strong>Qué hacer:</strong> Verifica tu pedido al momento de recibirlo. Si falta algún producto o recibiste un artículo diferente al pedido, contáctanos dentro de las 48 horas con fotos y número de pedido. Enviaremos el producto correcto o faltante inmediatamente.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Dirección Incorrecta</h4>
                        <p><strong>Qué hacer:</strong> Si ingresaste una dirección incorrecta, contáctanos inmediatamente. Si el paquete aún no ha sido despachado, podemos corregirla. Si ya está en tránsito, intentaremos coordinar con el transportador, pero puede implicar costos adicionales.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h4>Paquete No Reclamado</h4>
                        <p><strong>Qué hacer:</strong> Si no pudiste recibir el paquete y está en la oficina del transportador, tienes 5 días hábiles para recogerlo presentando tu documento de identidad y el número de guía. Después de este tiempo, será devuelto y podrías incurrir en costos de reenvío.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h4>Paquete Extraviado</h4>
                        <p><strong>Qué hacer:</strong> Si el seguimiento muestra que el paquete está perdido o no hay actualizaciones por más de 7 días, contáctanos inmediatamente. Abriremos una investigación formal con el operador. Si se confirma el extravío, te reembolsaremos o reenviaremos el pedido.</p>
                    </div>
                </div>
            </div>

            <div class="important-box">
                <h4>Tiempos de Respuesta ante Incidencias</h4>
                <p>Respondemos a todos los reportes de problemas en un máximo de 24 horas hábiles. Las investigaciones con operadores logísticos pueden tomar de 3 a 5 días hábiles. Te mantendremos informado durante todo el proceso de resolución.</p>
            </div>

            <div class="highlight-box">
                <h3>Cómo Reportar un Problema</h3>
                <p>Para reportar cualquier incidencia con tu envío, contacta a través de:</p>
                <ul>
                    <li><strong>Email:</strong> envios@angelow.com</li>
                    <li><strong>WhatsApp:</strong> +57 (xxx) xxx-xxxx</li>
                    <li><strong>Teléfono:</strong> +57 (xxx) xxx-xxxx</li>
                    <li><strong>Chat en línea:</strong> Disponible en nuestro sitio web</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Información necesaria:</strong> Número de pedido, número de guía, descripción detallada del problema y fotos (si aplica).</p>
            </div>

            <div class="success-box">
                <h4>Garantía de Satisfacción</h4>
                <p>Tu satisfacción es nuestra prioridad. Si no quedas conforme con tu experiencia de envío, trabajaremos contigo para encontrar una solución que te deje satisfecho. Esto puede incluir reenvío, reembolso o compensación según el caso.</p>
            </div>
        </div>

        <div class="term-section" id="adicional">
            <h2>8. INFORMACIÓN ADICIONAL</h2>
            
            <div class="highlight-box">
                <h3>Días y Horarios de Despacho</h3>
                <p>Los pedidos se procesan y despachan en los siguientes horarios:</p>
                <ul>
                    <li><strong>Lunes a Viernes:</strong> Pedidos confirmados antes de las 2:00 PM se despachan el mismo día</li>
                    <li><strong>Pedidos después de las 2:00 PM:</strong> Se despachan al siguiente día hábil</li>
                    <li><strong>Fines de semana y festivos:</strong> Los pedidos se procesan el siguiente día hábil</li>
                </ul>
            </div>

            <div class="term-section">
                <h3>Temporadas de Alta Demanda</h3>
                <p>Durante fechas especiales como Navidad, Día de la Madre, Black Friday y otras festividades, los tiempos de procesamiento y entrega pueden extenderse debido al alto volumen de pedidos. Te recomendamos:</p>
                <ul>
                    <li>Realizar tus compras con mayor anticipación</li>
                    <li>Verificar los tiempos estimados actualizados en la página de producto</li>
                    <li>Contactarnos si necesitas el pedido para una fecha específica</li>
                </ul>
            </div>

            <div class="term-section">
                <h3>Embalaje Ecológico</h3>
                <p>En ANGELOW nos preocupamos por el medio ambiente. Utilizamos materiales de embalaje reciclables y biodegradables siempre que es posible. Te invitamos a reciclar o reutilizar las cajas y materiales de empaque de tu pedido.</p>
            </div>

            <div class="tip-box">
                <h4>Compras para Regalo</h4>
                <p>Si tu compra es un regalo, puedes solicitar empaque especial y tarjeta de dedicatoria sin costo adicional. Indica esta preferencia en las notas del pedido al momento de la compra. No incluiremos factura con precio en envíos marcados como regalo.</p>
            </div>

            <div class="term-section">
                <h3>Modificaciones a las Políticas</h3>
                <p>ANGELOW se reserva el derecho de modificar estas políticas de envío en cualquier momento. Los cambios entrarán en vigor desde su publicación en el sitio web. Las modificaciones no afectarán pedidos ya realizados, que se regirán por las condiciones vigentes al momento de la compra.</p>
                <p style="margin-top: 15px;"><strong>Última actualización:</strong> <span id="lastUpdate"></span></p>
            </div>
        </div>

    </div>

</div>

<footer>
    <p>&copy; <span id="currentYear"></span> ANGELOW - Tienda Online de Ropa Infantil</p>
    <p>Todos los derechos reservados</p>
    
    <div class="footer-links">
        <a href="politica-privacidad.html">Política de Privacidad</a>
        <a href="terminos.html">Términos y Condiciones</a>
        <a href="preguntas-frecuentes.html">Preguntas Frecuentes</a>
        <a href="guia-tallas.html">Guía de Tallas</a>
        <a href="contacto.html">Contacto</a>
    </div>
</footer>

<script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();
    
    // Fecha de última actualización
    const lastUpdateDate = new Date().toLocaleDateString('es-CO', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
    document.getElementById('lastUpdate').textContent = lastUpdateDate;

    // Smooth scroll para los enlaces de navegación
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                
                // Actualizar clase active
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // Actualizar enlace activo al hacer scroll
    window.addEventListener('scroll', () => {
        let current = '';
        const sections = document.querySelectorAll('.term-section');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
</script>

</body>
</html>