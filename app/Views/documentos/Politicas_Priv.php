<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad - ANGELOW</title>
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

        .legal-reference {
            background: var(--bg-soft);
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            border-left: 4px solid var(--primary);
        }

        .legal-reference strong {
            color: var(--primary);
            display: block;
            margin-bottom: 8px;
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
        }
    </style>
</head>
<body>

<header>
    <a href="inicio.html" class="logo"> 
        <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>PRIVACIDAD Y DATOS</span>
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
        <h2>POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS</h2>
        <p>Protegemos la información de nuestros clientes y sus familias con los más altos estándares de seguridad</p>
    </div>

    <div class="terms-header">
        <h1>COMPROMISO CON TU PRIVACIDAD</h1>
        <p>En cumplimiento de la normativa colombiana vigente para la protección de datos personales</p>
    </div>

    <div class="terms-nav">
        <a href="#responsable" class="nav-link active">Responsable</a>
        <a href="#datos" class="nav-link">Datos Recopilados</a>
        <a href="#finalidad" class="nav-link">Finalidad</a>
        <a href="#menores" class="nav-link">Protección Menores</a>
        <a href="#derechos" class="nav-link">Tus Derechos</a>
        <a href="#seguridad" class="nav-link">Seguridad</a>
        <a href="#legal" class="nav-link">Marco Legal</a>
    </div>

    <div class="terms-content">

        <div class="term-section" id="responsable">
            <h2>1. RESPONSABLE DEL TRATAMIENTO DE DATOS</h2>
            <p><strong>ANGELOW</strong> - Tienda Online de Ropa Infantil, identificada con NIT [Número], domiciliada en [Dirección], Colombia, actúa como responsable del tratamiento de los datos personales recopilados a través de www.angelow.com</p>
            
            <div class="highlight-box">
                <h3>Contacto para Datos Personales</h3>
                <p><strong>Email:</strong> privacidad@angelow.com</p>
                <p><strong>Teléfono:</strong> +57 (xxx) xxx-xxxx</p>
                <p><strong>Horario:</strong> Lunes a Viernes, 8:00 AM - 6:00 PM</p>
            </div>

            <p>Nuestra política de tratamiento de datos está disponible en todo momento y puede ser consultada en esta página o solicitada directamente a nuestros canales de atención.</p>
        </div>

        <div class="term-section" id="datos">
            <h2>2. DATOS PERSONALES RECOPILADOS</h2>
            <p>Para ofrecer nuestros servicios, ANGELOW puede recopilar los siguientes tipos de información:</p>
            
            <h3 style="color: var(--text-dark); margin-top: 25px; margin-bottom: 15px;">Datos del titular (padre, madre o tutor legal):</h3>
            <ul>
                <li>Nombre completo y documento de identidad</li>
                <li>Correo electrónico y número de teléfono</li>
                <li>Dirección de envío y facturación</li>
                <li>Información de pago (procesada de forma segura por terceros)</li>
            </ul>

            <h3 style="color: var(--text-dark); margin-top: 25px; margin-bottom: 15px;">Datos del menor (opcional):</h3>
            <ul>
                <li>Nombre y edad (únicamente para personalización de productos)</li>
                <li>Tallas y preferencias de productos</li>
            </ul>

            <div class="legal-reference">
                <strong>Base Legal:</strong>
                <p>La recopilación de estos datos se realiza previo consentimiento informado, libre, expreso e inequívoco del titular, conforme a la Ley 1581 de 2012.</p>
            </div>
        </div>

        <div class="term-section" id="finalidad">
            <h2>3. FINALIDAD DEL TRATAMIENTO</h2>
            <p>Los datos personales recopilados serán utilizados para las siguientes finalidades:</p>
            
            <ol>
                <li><strong>Procesamiento de pedidos:</strong> Gestionar compras, pagos, envíos y entregas.</li>
                <li><strong>Atención al cliente:</strong> Responder consultas, solicitudes de cambio o devolución.</li>
                <li><strong>Comunicaciones comerciales:</strong> Enviar información sobre promociones, nuevos productos y novedades (previa autorización).</li>
                <li><strong>Mejora del servicio:</strong> Análisis de preferencias para optimizar nuestra oferta.</li>
                <li><strong>Cumplimiento legal:</strong> Atender requerimientos de autoridades competentes.</li>
                <li><strong>Seguridad:</strong> Prevenir fraudes y proteger la integridad de la plataforma.</li>
            </ol>

            <p style="margin-top: 20px;">El cliente puede oponerse al uso de sus datos con fines comerciales en cualquier momento, sin que esto afecte el procesamiento de su pedido.</p>
        </div>

        <div class="term-section" id="menores">
            <h2>4. PROTECCIÓN ESPECIAL DE DATOS DE MENORES</h2>
            
            <div class="highlight-box">
                <h3>Compromiso con la Infancia</h3>
                <p>ANGELOW reconoce que los datos de niñas, niños y adolescentes gozan de protección especial en Colombia y se compromete a tratarlos con el máximo cuidado y respeto.</p>
            </div>

            <p><strong>Principios de protección:</strong></p>
            <ul>
                <li>Solo recopilamos datos de menores cuando es estrictamente necesario (tallas, preferencias de productos).</li>
                <li>Nunca solicitamos datos sensibles de menores.</li>
                <li>El tratamiento de datos de menores requiere autorización previa y expresa del padre, madre o representante legal.</li>
                <li>Los datos de menores se conservan únicamente durante el tiempo necesario para cumplir la finalidad autorizada.</li>
                <li>No compartimos ni vendemos datos de menores a terceros con fines comerciales.</li>
            </ul>

            <div class="legal-reference">
                <strong>Marco Legal - Protección de Menores:</strong>
                <p><strong>Ley 1098 de 2006 (Código de Infancia y Adolescencia):</strong> Establece que el tratamiento de datos de menores debe respetar el interés superior del niño y requerir autorización de los representantes legales.</p>
            </div>

            <p style="margin-top: 20px;"><strong>Derecho de los padres:</strong> Los representantes legales tienen derecho a conocer, actualizar, rectificar y suprimir los datos de sus hijos menores de edad en cualquier momento.</p>
        </div>

        <div class="term-section" id="derechos">
            <h2>5. DERECHOS DEL TITULAR DE LOS DATOS</h2>
            <p>Como titular de datos personales, usted tiene los siguientes derechos reconocidos por la legislación colombiana:</p>
            
            <ol>
                <li><strong>Conocer, actualizar y rectificar</strong> sus datos personales cuando sean parciales, inexactos, incompletos, fraccionados o induzcan a error.</li>
                <li><strong>Solicitar prueba</strong> de la autorización otorgada para el tratamiento de datos.</li>
                <li><strong>Ser informado</strong> sobre el uso que se ha dado a sus datos personales.</li>
                <li><strong>Revocar la autorización</strong> y/o solicitar la supresión de los datos cuando el tratamiento no respete los principios, derechos y garantías constitucionales y legales.</li>
                <li><strong>Acceder de forma gratuita</strong> a sus datos personales objeto de tratamiento.</li>
                <li><strong>Presentar quejas</strong> ante la Superintendencia de Industria y Comercio (SIC) por infracciones a la normativa de protección de datos.</li>
            </ol>

            <div class="legal-reference">
                <strong>Ley 1581 de 2012 - Protección de Datos Personales:</strong>
                <p>Esta ley establece las disposiciones generales para la protección de datos personales en Colombia y garantiza el derecho de habeas data reconocido en el artículo 15 de la Constitución Política.</p>
            </div>

            <div class="highlight-box">
                <h3>Cómo ejercer tus derechos</h3>
                <p>Para ejercer cualquiera de estos derechos, envía una solicitud a <strong>privacidad@angelow.com</strong> indicando:</p>
                <ul style="margin-top: 10px;">
                    <li>Nombre completo y documento de identidad</li>
                    <li>Descripción clara de los derechos que desea ejercer</li>
                    <li>Dirección de correo electrónico para recibir respuesta</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Tiempo de respuesta:</strong> Máximo 15 días hábiles a partir de la recepción de la solicitud.</p>
            </div>
        </div>

        <div class="term-section" id="seguridad">
            <h2>6. MEDIDAS DE SEGURIDAD</h2>
            <p>ANGELOW implementa medidas técnicas, administrativas y físicas de seguridad para proteger los datos personales contra pérdida, alteración, acceso no autorizado o uso indebido:</p>
            
            <ul>
                <li><strong>Cifrado SSL/TLS:</strong> Todas las transacciones y transmisiones de datos se realizan mediante protocolos seguros.</li>
                <li><strong>Acceso restringido:</strong> Solo personal autorizado y capacitado puede acceder a la información personal.</li>
                <li><strong>Respaldos periódicos:</strong> Realizamos copias de seguridad regularmente para prevenir pérdida de información.</li>
                <li><strong>Actualización constante:</strong> Nuestros sistemas de seguridad se actualizan periódicamente para prevenir vulnerabilidades.</li>
                <li><strong>Alianzas seguras:</strong> Trabajamos únicamente con proveedores de pago y logística certificados.</li>
            </ul>

            <p style="margin-top: 20px;">A pesar de estas medidas, ningún sistema es completamente infalible. En caso de detectar alguna brecha de seguridad que afecte sus datos, seremos transparentes y le informaremos de inmediato.</p>
        </div>

        <div class="term-section" id="compartir">
            <h2>7. COMPARTIR INFORMACIÓN CON TERCEROS</h2>
            <p>ANGELOW no vende ni alquila datos personales a terceros. Sin embargo, podemos compartir información con:</p>
            
            <ul>
                <li><strong>Proveedores de servicios logísticos:</strong> Para realizar envíos y entregas.</li>
                <li><strong>Pasarelas de pago:</strong> Para procesar transacciones de forma segura.</li>
                <li><strong>Autoridades competentes:</strong> Cuando sea requerido por ley o para proteger nuestros derechos legales.</li>
            </ul>

            <p style="margin-top: 20px;">Todos nuestros aliados comerciales están obligados contractualmente a proteger la información personal con el mismo nivel de seguridad que nosotros aplicamos.</p>
        </div>

        <div class="term-section" id="cookies">
            <h2>8. USO DE COOKIES Y TECNOLOGÍAS SIMILARES</h2>
            <p>Nuestro sitio web utiliza cookies y tecnologías similares para mejorar la experiencia del usuario, recordar preferencias y analizar el tráfico del sitio.</p>
            
            <p><strong>Tipos de cookies que utilizamos:</strong></p>
            <ul>
                <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento básico del sitio.</li>
                <li><strong>Cookies de rendimiento:</strong> Nos ayudan a entender cómo los usuarios interactúan con el sitio.</li>
                <li><strong>Cookies de funcionalidad:</strong> Permiten recordar tus preferencias y configuraciones.</li>
            </ul>

            <p style="margin-top: 20px;">Puedes configurar tu navegador para rechazar cookies, aunque esto puede afectar algunas funcionalidades del sitio.</p>
        </div>

        <div class="term-section" id="conservacion">
            <h2>9. TIEMPO DE CONSERVACIÓN DE DATOS</h2>
            <p>Los datos personales se conservarán durante el tiempo necesario para cumplir las finalidades para las cuales fueron recopilados:</p>
            
            <ul>
                <li><strong>Datos de clientes activos:</strong> Mientras la relación comercial esté vigente.</li>
                <li><strong>Datos de transacciones:</strong> 5 años, conforme a obligaciones contables y tributarias.</li>
                <li><strong>Datos de marketing:</strong> Hasta que el titular retire su consentimiento.</li>
                <li><strong>Datos de menores:</strong> Se eliminarán una vez cumplida la finalidad autorizada, salvo obligación legal de conservación.</li>
            </ul>

            <div class="legal-reference">
                <strong>Decreto 1074 de 2015:</strong>
                <p>Reglamenta la Ley 1581 de 2012 y establece que los responsables del tratamiento deben conservar la información bajo las condiciones de seguridad necesarias durante el tiempo razonablemente necesario.</p>
            </div>
        </div>

        <div class="term-section" id="legal">
            <h2>10. MARCO LEGAL COLOMBIANO</h2>
            <p>Esta Política de Privacidad se rige y cumple con las siguientes normas colombianas:</p>

            <div class="legal-reference">
                <strong>Ley 1581 de 2012 - Protección de Datos Personales</strong>
                <p>Establece las disposiciones generales para la protección de datos personales en Colombia, desarrollando el derecho constitucional de habeas data. Define principios, derechos del titular, deberes de los responsables y encargados del tratamiento.</p>
            </div>

            <div class="legal-reference">
                <strong>Decreto 1074 de 2015 (Decreto Único Reglamentario del Sector Comercio)</strong>
                <p>Compila y reglamenta la Ley 1581 de 2012. Establece los procedimientos para el ejercicio de derechos, características de la autorización, transferencia de datos a terceros países y el Registro Nacional de Bases de Datos (RNBD).</p>
            </div>

            <div class="legal-reference">
                <strong>Ley 1098 de 2006 - Código de Infancia y Adolescencia</strong>
                <p>Garantiza a los niños, niñas y adolescentes su pleno desarrollo en un ambiente de felicidad, amor y comprensión. Establece que el tratamiento de datos de menores requiere autorización previa de sus representantes legales y debe respetar el interés superior del niño.</p>
            </div>

            <div class="legal-reference">
                <strong>Ley 1480 de 2011 - Estatuto del Consumidor</strong>
                <p>Protege los derechos de los consumidores en Colombia, incluyendo el derecho a la información, seguridad y protección contra publicidad engañosa. Establece responsabilidades para productores y proveedores en el comercio electrónico.</p>
            </div>

            <p style="margin-top: 25px;"><strong>Autoridad de Control:</strong> La Superintendencia de Industria y Comercio (SIC) es la entidad encargada de velar por el cumplimiento de la normativa de protección de datos personales en Colombia.</p>
            
            <div class="highlight-box">
                <h3>Superintendencia de Industria y Comercio (SIC)</h3>
                <p><strong>Página web:</strong> www.sic.gov.co</p>
                <p><strong>Línea de atención:</strong> (+57-601) 587 0000</p>
                <p><strong>Dirección:</strong> Carrera 13 No. 27 - 00, Bogotá D.C.</p>
            </div>
        </div>

        <div class="term-section" id="modificaciones">
            <h2>11. MODIFICACIONES A LA POLÍTICA</h2>
            <p>ANGELOW se reserva el derecho de modificar esta Política de Privacidad en cualquier momento para adaptarla a cambios legislativos, operativos o tecnológicos.</p>
            
            <p>Cualquier modificación sustancial será notificada a los usuarios a través de:</p>
            <ul>
                <li>Publicación en el sitio web www.angelow.com</li>
                <li>Correo electrónico a los clientes registrados</li>
                <li>Aviso visible en la plataforma</li>
            </ul>

            <p style="margin-top: 20px;"><strong>Fecha de última actualización:</strong> <span id="lastUpdate"></span></p>
        </div>

        <div class="term-section" id="aceptacion">
            <h2>12. ACEPTACIÓN DE LA POLÍTICA</h2>
            <p>Al utilizar nuestro sitio web y proporcionar sus datos personales, usted declara haber leído, comprendido y aceptado los términos de esta Política de Privacidad.</p>
            
            <p>Si no está de acuerdo con algún aspecto de esta política, le recomendamos no proporcionar sus datos personales y abstenerse de utilizar nuestros servicios.</p>

            <div class="highlight-box">
                <h3>Consentimiento Informado</h3>
                <p>Al realizar una compra o registrarse en ANGELOW, usted otorga su consentimiento libre, previo, expreso e informado para el tratamiento de sus datos personales conforme a esta política y a la normativa colombiana vigente.</p>
            </div>
        </div>

    </div>

</div>

<footer>
    <p>&copy; <span id="currentYear"></span> ANGELOW - Tienda Online de Ropa Infantil</p>
    <p>Todos los derechos reservados</p>
    
    <div class="footer-links">
        <a href="#responsable">Política de Privacidad</a>
        <a href="terminos.html">Términos y Condiciones</a>
        <a href="pedidos-envios.html">Pedidos y Envíos</a>
        <a href="contacto.html">Contacto</a>
    </div>
    
    <p style="margin-top: 20px; font-size: 14px; opacity: 0.8;">
        En cumplimiento de la Ley 1581 de 2012 y normativa colombiana vigente
    </p>
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