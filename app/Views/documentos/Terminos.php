<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - ANGELOW</title>
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
            --success: #10b981;
            --warning: #f59e0b;
        }
        
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        body { 
            font-family: 'Inter', system-ui, sans-serif; 
            background: var(--bg-light); 
            color: var(--text-dark); 
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER - Mismo estilo que inicio.html */
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
            flex-wrap: wrap; 
            gap: 15px;
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
            box-shadow: 0 4px 20px var(--shadow); 
        }
        
        .logo-text { 
            display: flex; 
            flex-direction: column; 
        }
        
        .logo-text span:first-child { 
            font-size: 36px; 
            font-weight: 900; 
            letter-spacing: -1px; 
            color: var(--primary); 
        }
        
        .logo-text span:last-child { 
            font-size: 16px; 
            font-weight: 600; 
            color: var(--text-secondary); 
            letter-spacing: 1.5px; 
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .icon-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--bg-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            text-decoration: none;
        }
        
        .icon-btn:hover {
            background: var(--primary);
            transform: scale(1.1);
        }
        
        .icon-btn:hover img {
            filter: brightness(0) invert(1);
        }

        /* CONTENIDO PRINCIPAL */
        .terms-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 30px;
            flex: 1;
        }

        .terms-header {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 30px;
            border-bottom: 2px solid var(--border-light);
        }

        .terms-header h1 {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .terms-header .subtitle {
            font-size: 20px;
            color: var(--text-secondary);
            max-width: 800px;
            margin: 0 auto;
        }

        /* Banner de bienvenida */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23ffffff" opacity="0.1" d="M20,20 Q40,5 60,20 T100,20 L100,80 Q80,95 60,80 T20,80 Z"/></svg>');
            background-size: 300px;
        }

        .welcome-banner h2 {
            font-size: 32px;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .welcome-banner p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Información de la empresa */
        .company-info {
            background: var(--white);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            border: 1px solid var(--border-light);
        }

        .company-info h2 {
            color: var(--primary);
            font-size: 28px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .company-info h2::before {
            content: '🏢';
            font-size: 24px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 25px;
        }

        .info-item {
            padding: 20px;
            background: var(--bg-soft);
            border-radius: 15px;
            border-left: 4px solid var(--primary);
        }

        .info-item h3 {
            color: var(--text-dark);
            font-size: 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item p {
            color: var(--text-secondary);
            font-size: 15px;
            line-height: 1.6;
        }

        /* Canales de atención */
        .contact-highlight {
            background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);
            border-radius: 15px;
            padding: 25px;
            margin: 40px 0;
            border: 2px solid var(--primary);
        }

        .contact-highlight h3 {
            color: var(--primary);
            font-size: 22px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contact-highlight h3::before {
            content: '📞';
            font-size: 24px;
        }

        .contact-channels {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .contact-channel {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: var(--white);
            border-radius: 12px;
            border: 1px solid var(--border-light);
            transition: transform 0.3s ease;
        }

        .contact-channel:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px var(--shadow);
        }

        .contact-channel i {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
        }

        .contact-info h4 {
            color: var(--text-dark);
            margin-bottom: 5px;
            font-size: 16px;
        }

        .contact-info p {
            color: var(--text-secondary);
            font-size: 14px;
            margin: 0;
        }

        /* Navegación de términos */
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
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .nav-link.active {
            background: var(--primary);
            color: white;
            border-color: var(--accent);
        }

        .nav-link::before {
            font-size: 16px;
        }

        .nav-link[href="#aceptacion"]::before { content: '📝'; }
        .nav-link[href="#servicios"]::before { content: '🛍️'; }
        .nav-link[href="#requisitos"]::before { content: '👶'; }
        .nav-link[href="#privacidad"]::before { content: '🔒'; }
        .nav-link[href="#compras"]::before { content: '💳'; }
        .nav-link[href="#devoluciones"]::before { content: '↩️'; }
        .nav-link[href="#garantias"]::before { content: '⭐'; }

        /* Contenido de términos */
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
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .term-section h2 {
            color: var(--primary);
            font-size: 26px;
            margin-bottom: 20px;
            padding-left: 20px;
            border-left: 5px solid var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .term-section h3 {
            color: var(--text-dark);
            font-size: 20px;
            margin: 25px 0 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .term-section p {
            color: var(--text-secondary);
            font-size: 16px;
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .term-section ul, .term-section ol {
            margin: 15px 0 15px 30px;
            color: var(--text-secondary);
        }

        .term-section li {
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 1.6;
        }

        .term-section li strong {
            color: var(--text-dark);
        }

        /* Secciones destacadas */
        .highlight {
            background: var(--bg-soft);
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            border-left: 4px solid var(--accent);
        }

        .highlight strong {
            color: var(--primary);
            font-weight: 700;
        }

        .warning-box {
            background: #FFF3CD;
            border: 2px solid #FFC107;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }

        .warning-box h4 {
            color: #856404;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .warning-box h4::before {
            content: '⚠️';
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 50px 30px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 25px;
            margin: 60px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23ffffff" opacity="0.1" d="M30,30 Q50,15 70,30 T100,30 L100,70 Q80,85 60,70 T30,70 Z"/></svg>');
            background-size: 200px;
        }

        .cta-section h2 {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .cta-section p {
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .btn {
            padding: 15px 35px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: white;
            color: var(--primary);
            border: 2px solid white;
        }

        .btn-primary:hover {
            background: transparent;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.2);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }

        /* FOOTER - Mismo estilo que inicio.html */
        footer {
            background: var(--text-dark);
            color: white;
            padding: 60px 20px 30px;
            margin-top: auto;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .footer-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        .footer-logo img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
            background: var(--bg-soft);
        }

        .footer-logo-text {
            font-size: 32px;
            font-weight: 900;
            color: var(--primary);
        }

        .footer-section h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--accent);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            display: inline-block;
            color: #cbd5e1;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 4px 0;
            position: relative;
        }

        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(5px);
        }

        .footer-links a::before {
            content: "›";
            position: absolute;
            left: -15px;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            color: var(--accent);
        }

        .footer-links a:hover::before {
            opacity: 1;
            transform: translateX(-3px);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #94a3b8;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .terms-container {
                padding: 0 20px;
            }
            
            .terms-content {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 12px 16px;
                gap: 12px;
                flex-direction: column;
            }

            .logo {
                gap: 12px;
            }

            .logo-img {
                width: 56px;
                height: 56px;
            }

            .logo-text span:first-child {
                font-size: 22px;
            }

            .logo-text span:last-child {
                font-size: 12px;
            }

            .terms-header h1 {
                font-size: 32px;
            }

            .terms-header .subtitle {
                font-size: 16px;
            }

            .welcome-banner {
                padding: 30px 20px;
            }

            .welcome-banner h2 {
                font-size: 26px;
            }

            .company-info {
                padding: 20px;
            }

            .company-info h2 {
                font-size: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .terms-nav {
                padding: 20px;
            }

            .nav-link {
                padding: 10px 20px;
                font-size: 14px;
                flex: 1;
                min-width: 140px;
                justify-content: center;
            }

            .term-section h2 {
                font-size: 22px;
            }

            .term-section h3 {
                font-size: 18px;
            }

            .contact-channels {
                grid-template-columns: 1fr;
            }

            .cta-section {
                padding: 40px 20px;
            }

            .cta-section h2 {
                font-size: 26px;
            }

            .cta-section p {
                font-size: 16px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 480px) {
            .terms-content {
                padding: 20px;
            }
            
            .term-section {
                margin-bottom: 30px;
                padding-bottom: 30px;
            }

            .nav-link {
                min-width: 120px;
                font-size: 13px;
                padding: 8px 15px;
            }
        }

        /* Scroll suave */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <a href="inicio.html" class="logo">
             <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
            <div class="logo-text">
                <span>ANGELOW</span>
                <span>TÉRMINOS Y CONDICIONES</span>
            </div>
        </a>

        <div class="header-icons">
            <a href="inicio.html" class="icon-btn" title="Volver al inicio">
                <img src="https://img.icons8.com/ios-filled/50/home.png" alt="Inicio" style="width:24px; filter: brightness(0) saturate(100%) hue-rotate(210deg);">
            </a>
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="terms-container">
        <!-- Banner de bienvenida -->
        <div class="welcome-banner">
            <h2>TÉRMINOS Y CONDICIONES</h2>
            <p>Ropa infantil con amor, estilo y transparencia. Conoce nuestras políticas para una experiencia segura y confiable.</p>
        </div>

        <!-- Encabezado -->
        <div class="terms-header">
            <h1>TÉRMINOS Y CONDICIONES DE ANGELOW</h1>
            <p class="subtitle">Comercialización de artículos de ropa infantil por www.angelow.com</p>
        </div>

        <!-- Información de la empresa -->
        <div class="company-info">
            <h2>INFORMACIÓN LEGAL DE ANGELOW</h2>
            <div class="info-grid">
                <div class="info-item">
                    <h3>Empresa</h3>
                    <p>ANGELOW Colombia S.A.S., sociedad legalmente constituida bajo las leyes de la República de Colombia, especializada en moda infantil de alta calidad.</p>
                </div>
                <div class="info-item">
                    <h3>Ubicación</h3>
                    <p>Medellín, Colombia. Carrera 45 #20-35, Piso 3, Medellín, Antioquia. Centro de distribución y atención al cliente.</p>
                </div>
                <div class="info-item">
                    <h3>Datos Legales</h3>
                    <p>NIT: 901.234.567-8 • Cámara de Comercio de Medellín: 123456 • RUT: 901234567-8-9</p>
                </div>
            </div>

            <!-- Canales de atención -->
            <div class="contact-highlight">
                <h3>CANALES DE ATENCIÓN AL CLIENTE</h3>
                <p style="color: var(--text-secondary); margin-bottom: 15px;">Estamos para ayudarte en cada paso. Contáctanos por cualquiera de estos canales:</p>
                
                <div class="contact-channels">
                    <div class="contact-channel">
                        <i>💬</i>
                        <div class="contact-info">
                            <h4>Chat en línea</h4>
                            <p>En nuestra App o sitio web • 24/7 para consultas</p>
                        </div>
                    </div>
                    <div class="contact-channel">
                        <i>📱</i>
                        <div class="contact-info">
                            <h4>WhatsApp Business</h4>
                            <p>+57 313 595 1664 • Respuesta en minutos</p>
                        </div>
                    </div>
                    <div class="contact-channel">
                        <i>📧</i>
                        <div class="contact-info">
                            <h4>Correo electrónico</h4>
                            <p>servicio@angelow.com • Soporte especializado</p>
                        </div>
                    </div>
                    <div class="contact-channel">
                        <i>🕒</i>
                        <div class="contact-info">
                            <h4>Horario de atención</h4>
                            <p>Lun-Vie: 9:00-21:00 • Sáb: 10:00-18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navegación rápida -->
        <div class="terms-nav" id="termsNav">
            <a href="#aceptacion" class="nav-link active">Aceptación</a>
            <a href="#servicios" class="nav-link">Servicios</a>
            <a href="#requisitos" class="nav-link">Requisitos</a>
            <a href="#privacidad" class="nav-link">Privacidad</a>
            <a href="#compras" class="nav-link">Compras</a>
            <a href="#devoluciones" class="nav-link">Devoluciones</a>
            <a href="#garantias" class="nav-link">Garantías</a>
        </div>

        <!-- Contenido de términos -->
        <div class="terms-content">
            <!-- Sección 1: Aceptación -->
            <div class="term-section" id="aceptacion">
                <h2>1. ACEPTACIÓN DE TÉRMINOS</h2>
                <p>Al acceder o utilizar nuestros servicios en <strong>www.angelow.com</strong>, aplicación móvil o cualquier plataforma asociada, usted acepta estar sujeto a estos Términos y Condiciones, nuestra Política de Privacidad y las políticas específicas de producto.</p>
                
                <div class="highlight">
                    <p><strong>IMPORTANTE:</strong> Si eres menor de edad, estos términos deben ser aceptados por tu padre, madre o tutor legal. Nos especializamos en ropa infantil y valoramos la seguridad de los más pequeños.</p>
                </div>
                
                <h3>1.1. Modificaciones</h3>
                <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Las versiones actualizadas se publicarán en nuestro sitio web con fecha de última modificación. Te notificaremos sobre cambios importantes que puedan afectar tus derechos.</p>
            </div>

            <!-- Sección 2: Nuestros Servicios -->
            <div class="term-section" id="servicios">
                <h2> 2. NUESTROS SERVICIOS</h2>
                <p>ANGELOW es una plataforma especializada en <strong>moda infantil premium</strong> que ofrece:</p>
                
                <ul>
                    <li><strong>Colecciones exclusivas:</strong> Ropa para bebés, niños y niñas de 0 a 12 años</li>
                    <li><strong>Compras seguras:</strong> Proceso de compra con encriptación SSL de 256-bit</li>
                    <li><strong> Guía de tallas:</strong> Sistema de medición preciso y asesoramiento personalizado</li>
                    <li><strong> Logística confiable:</strong> Envíos a todo Colombia con seguimiento en tiempo real</li>
                    <li><strong>Comunidad:</strong> Contenido educativo sobre cuidado infantil y moda</li>
                </ul>
                
                <div class="warning-box">
                    <h4>Materiales y Seguridad</h4>
                    <p>Todos nuestros productos cumplen con los más altos estándares de seguridad infantil. Utilizamos materiales hipoalergénicos, sin componentes tóxicos y con certificaciones internacionales de calidad textil.</p>
                </div>
            </div>

            <!-- Sección 3: Requisitos de uso -->
            <div class="term-section" id="requisitos">
                <h2>3. REQUISITOS DE USO</h2>
                
                <h3>3.1. Edad y Capacidad</h3>
                <p>Para realizar compras en ANGELOW, debes:</p>
                <ul>
                    <li>Tener al menos <strong>18 años de edad</strong></li>
                    <li>Ser padre, madre o tutor legal del menor para quien compras</li>
                    <li>Contar con capacidad legal para celebrar contratos</li>
                    <li>Proporcionar información veraz y completa</li>
                </ul>
                
                <h3>3.2. Cuenta de Usuario</h3>
                <p>Al crear una cuenta aceptas:</p>
                <ul>
                    <li>Mantener tu información actualizada</li>
                    <li>Proteger tus credenciales de acceso</li>
                    <li>Notificarnos sobre uso no autorizado</li>
                    <li>No crear múltiples cuentas fraudulentas</li>
                </ul>
            </div>

            <!-- Sección 4: Privacidad -->
            <div class="term-section" id="privacidad">
                <h2>4. PRIVACIDAD Y PROTECCIÓN DE DATOS</h2>
                <p>En ANGELOW protegemos la privacidad de tus datos y especialmente la de los niños. Nuestra política completa está disponible en <a href="politicas-privacidad.html" style="color: var(--primary); text-decoration: none; font-weight: 600;">Políticas de Privacidad</a>.</p>
                
                <h3>4.1. Datos que recopilamos</h3>
                <ul>
                    <li><strong>Datos de contacto:</strong> Para envío y facturación</li>
                    <li><strong>Medidas del niño/a:</strong> Para recomendaciones de talla</li>
                    <li><strong>Preferencias:</strong> Para personalizar tu experiencia</li>
                    <li><strong>Datos de pago:</strong> Procesados de forma segura por pasarelas certificadas</li>
                </ul>
                
                <div class="highlight">
                    <p><strong>Compromiso con la infancia:</strong> Nunca comercializamos datos de menores. Toda información relacionada con niños se maneja con estrictos protocolos de seguridad y solo con fines de servicio.</p>
                </div>
            </div>

            <!-- Sección 5: Compras -->
            <div class="term-section" id="compras">
                <h2> 5. PROCESO DE COMPRA</h2>
                
                <h3>5.1. Realización del pedido</h3>
                <p>El proceso de compra incluye:</p>
                <ol>
                    <li>Selección de productos y tallas</li>
                    <li>Verificación de disponibilidad en tiempo real</li>
                    <li>Confirmación de dirección de envío</li>
                    <li>Selección de método de pago seguro</li>
                    <li>Confirmación por correo electrónico</li>
                </ol>
                
                <h3> 5.2. Precios y Pagos</h3>
                <ul>
                    <li>Los precios incluyen IVA (19%)</li>
                    <li>Los costos de envío se calculan según ubicación</li>
                    <li>Aceptamos: Tarjetas crédito/débito, PSE, Nequi, Daviplata</li>
                    <li>Los pagos se procesan en COP (Pesos Colombianos)</li>
                </ul>
                
                <h3>5.3. Envíos</h3>
                <p>Realizamos envíos a todo Colombia mediante aliados logísticos certificados. Los tiempos estimados son:</p>
                <ul>
                    <li><strong>Medellín:</strong> 1-2 días hábiles</li>
                    <li><strong>Otras ciudades principales:</strong> 3-5 días hábiles</li>
                    <li><strong>Municipios:</strong> 5-10 días hábiles</li>
                </ul>
            </div>

            <!-- Sección 6: Devoluciones -->
            <div class="term-section" id="devoluciones">
                <h2>6. DEVOLUCIONES Y CAMBIOS</h2>
                
                <h3>6.1. Política de 30 días</h3>
                <p>Aceptamos devoluciones y cambios hasta 30 días después de la recepción, siempre que:</p>
                <ul>
                    <li>El producto esté en estado original</li>
                    <li>Conserve todas las etiquetas</li>
                    <li>No haya sido usado o lavado</li>
                    <li>Se presente la factura original</li>
                </ul>
                
                <h3>6.2. Proceso de cambio</h3>
                <ol>
                    <li>Solicita el cambio en tu cuenta o contactándonos</li>
                    <li>Empaca el producto con cuidado</li>
                    <li>Programamos recogida gratuita</li>
                    <li>Procesamos el cambio en 3-5 días hábiles</li>
                </ol>
                
                <div class="highlight">
                    <p><strong>Productos personalizados:</strong> Los artículos con nombres bordados o personalizaciones especiales no son sujetos a devolución, excepto por defectos de fabricación.</p>
                </div>
            </div>

            <!-- Sección 7: Garantías -->
            <div class="term-section" id="garantias">
                <h2>7. GARANTÍAS Y CALIDAD</h2>
                
                <h3>7.1. Garantía de fabricación</h3>
                <p>Todos nuestros productos tienen garantía contra defectos de fabricación por 90 días a partir de la recepción. Cubrimos:</p>
                <ul>
                    <li>Costuras deshechas</li>
                    <li>Cremalleras defectuosas</li>
                    <li>Teñido irregular</li>
                    <li>Materiales no conformes</li>
                </ul>
                
                <h3>7.2. Cuidado de las prendas</h3>
                <p>Para garantizar la durabilidad, recomendamos:</p>
                <ul>
                    <li>Lavado a mano o máquina en ciclo suave</li>
                    <li>Uso de detergentes neutros</li>
                    <li>Secado a la sombra</li>
                    <li>Planchado a temperatura media</li>
                </ul>
                
                <div class="warning-box">
                    <h4>Excepciones de garantía</h4>
                    <p>La garantía no cubre daños por mal uso, lavado incorrecto, alteraciones no autorizadas o desgaste normal por el uso.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2>¿TIENES DUDAS SOBRE NUESTROS TÉRMINOS?</h2>
            <p>Nuestro equipo está listo para ayudarte a entender nuestras políticas y resolver cualquier inquietud sobre compras, tallas o garantías.</p>
            
            <div class="cta-buttons">
                <a href="inicio.html" class="btn btn-primary">Volver a la Tienda</a>
                <a href="contacto.html" class="btn btn-secondary">Contactar Soporte</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="img/logo.png" alt="ANGELOW">
                <div class="footer-logo-text">ANGELOW</div>
                <p>Ropa infantil de calidad con amor y estilo</p>
            </div>
            
            <div class="footer-section">
                <h3>Contacto</h3>
                <ul class="footer-links">
                    <li><a href="tel:+573135951664">+57 313 595 1664</a></li>
                    <li><a href="mailto:info@angelow.com">info@angelow.com</a></li>
                    <li><a href="#">Medellín, Colombia</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Legal</h3>
                <ul class="footer-links">
                    <li><a href="politicas-privacidad.html">Políticas de Privacidad</a></li>
                    <li><a href="terminos-condiciones.html" style="color: var(--accent);">Términos y Condiciones</a></li>
                    <li><a href="politicas-envios.html">Políticas de Envío</a></li>
                    <li><a href="politicas-devoluciones.html">Políticas de Devolución</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <span id="currentYear"></span> ANGELOW. Todos los derechos reservados. | Moda infantil con corazón</p>
        </div>
    </footer>

    <script>
        // Año actual en el footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Navegación activa al hacer scroll
        const sections = document.querySelectorAll('.term-section');
        const navLinks = document.querySelectorAll('.nav-link');

        function updateActiveNav() {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                
                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', updateActiveNav);

        // Inicializar activo
        updateActiveNav();

        // Scroll suave mejorado
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>