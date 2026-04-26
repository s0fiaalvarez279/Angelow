<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes - ANGELOW</title>
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

        .faq-item {
            background: var(--bg-light);
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
            border: 2px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: var(--accent);
            box-shadow: 0 4px 15px var(--shadow);
        }

        .faq-question {
            padding: 20px 25px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 17px;
            user-select: none;
        }

        .faq-question:hover {
            background: var(--bg-soft);
        }

        .faq-icon {
            font-size: 24px;
            color: var(--primary);
            transition: transform 0.3s ease;
            font-weight: bold;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            padding: 0 25px;
            color: var(--text-secondary);
        }

        .faq-answer-content {
            padding-bottom: 20px;
            line-height: 1.8;
        }

        .faq-item.active .faq-answer {
            max-height: 1000px;
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

        .contact-box {
            background: var(--bg-soft);
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: center;
        }

        .contact-box h3 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 24px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .contact-item strong {
            color: var(--text-dark);
            font-size: 16px;
        }

        .contact-item span {
            color: var(--text-secondary);
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
            .faq-question { font-size: 15px; padding: 15px 20px; }
            .contact-info { gap: 20px; }
        }
    </style>
</head>
<body>

<header>
    <a href="inicio.html" class="logo"> 
        <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>PREGUNTAS FRECUENTES</span>
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
        <h2>PREGUNTAS FRECUENTES</h2>
        <p>Encuentra respuestas rápidas a las dudas más comunes sobre nuestros productos y servicios</p>
    </div>

    <div class="terms-header">
        <h1>¿CÓMO PODEMOS AYUDARTE?</h1>
        <p>Hemos recopilado las preguntas más frecuentes de nuestros clientes para brindarte información clara y útil</p>
    </div>

    <div class="terms-nav">
        <a href="#compras" class="nav-link active">Compras</a>
        <a href="#envios" class="nav-link">Envíos</a>
        <a href="#tallas" class="nav-link">Tallas</a>
        <a href="#devoluciones" class="nav-link">Cambios y Devoluciones</a>
        <a href="#pagos" class="nav-link">Pagos</a>
        <a href="#productos" class="nav-link">Productos</a>
        <a href="#cuenta" class="nav-link">Mi Cuenta</a>
    </div>

    <div class="terms-content">

        <div class="term-section" id="compras">
            <h2>COMPRAS Y PEDIDOS</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo puedo realizar una compra en ANGELOW?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Comprar en ANGELOW es muy fácil y rápido:
                        <br><br>
                        1. <strong>Navega</strong> por nuestro catálogo y selecciona los productos que desees.<br>
                        2. <strong>Elige</strong> la talla y cantidad de cada producto.<br>
                        3. <strong>Agrega</strong> los artículos al carrito de compra.<br>
                        4. <strong>Revisa</strong> tu pedido en el carrito y haz clic en "Finalizar compra".<br>
                        5. <strong>Completa</strong> tus datos de envío y facturación.<br>
                        6. <strong>Selecciona</strong> tu método de pago preferido.<br>
                        7. <strong>Confirma</strong> tu pedido y recibirás un email de confirmación.
                        <br><br>
                        ¡Así de simple! Tu pedido será procesado de inmediato.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo modificar o cancelar mi pedido después de realizarlo?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Sí, pero solo si tu pedido aún no ha sido procesado. Una vez confirmado el pago, tienes un plazo de <strong>2 horas</strong> para solicitar modificaciones o cancelación.
                        <br><br>
                        Para hacerlo, contáctanos inmediatamente a través de:
                        <br>
                         Email: soporte@angelow.com<br>
                        WhatsApp: +57 300 123 4567<br>
                        <br>
                        Si el pedido ya fue despachado, no podrá ser cancelado, pero podrás iniciar un proceso de devolución una vez lo recibas.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Recibiré confirmación de mi pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Por supuesto! Una vez completado el pago, recibirás automáticamente un <strong>correo electrónico de confirmación</strong> con:
                        <br><br>
                         Número de pedido único<br>
                         Resumen de los productos comprados<br>
                         Dirección de envío<br>
                         Total pagado<br>
                         Tiempo estimado de entrega
                        <br><br>
                        Si no recibes este correo en los siguientes 15 minutos, revisa tu carpeta de spam o contáctanos.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Necesito crear una cuenta para comprar?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        No es obligatorio, pero <strong>te lo recomendamos</strong>. Al crear una cuenta podrás:
                        <br><br>
                         Realizar compras más rápidas en el futuro<br>
                         Hacer seguimiento de tus pedidos<br>
                         Guardar productos en tu lista de deseos<br>
                         Guardar múltiples direcciones de envío<br>
                         Recibir ofertas exclusivas y promociones especiales<br>
                         Acceder a tu historial de compras
                        <br><br>
                        También puedes comprar como invitado si prefieres una compra rápida sin registro.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Qué hago si encuentro un error en mi pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Si detectas un error en tu pedido (dirección incorrecta, producto equivocado, etc.) antes de que sea despachado, contáctanos de inmediato y lo solucionaremos.
                        <br><br>
                        Si el error lo detectas después de recibir el pedido, tienes <strong>48 horas</strong> para reportarlo con evidencia fotográfica. Procederemos con cambio o devolución según corresponda.
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="envios">
            <h2> ENVÍOS Y ENTREGAS</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cuánto tiempo tarda en llegar mi pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Los tiempos de entrega varían según tu ubicación:
                        <br><br>
                         <strong>Ciudades principales</strong> (Bogotá, Medellín, Cali, Barranquilla, Cartagena): 2 a 5 días hábiles<br>
                         <strong>Ciudades intermedias</strong>: 4 a 7 días hábiles<br>
                         <strong>Municipios y zonas rurales</strong>: 5 a 10 días hábiles
                        <br><br>
                        Estos tiempos empiezan a contar desde que se confirma el pago y el pedido es despachado. Recibirás un número de guía para hacer seguimiento.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cuánto cuesta el envío?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        El costo de envío depende de tu ubicación y el valor total de tu compra:
                        <br><br>
                         <strong>ENVÍO GRATIS</strong> en compras superiores a $150.000 COP<br>
                         Ciudades principales: $10.000 - $15.000 COP<br>
                         Otras ciudades: $15.000 - $25.000 COP<br>
                         Zonas rurales: $25.000 - $35.000 COP
                        <br><br>
                        El costo exacto se calculará automáticamente antes de finalizar tu compra.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Hacen envíos a todo Colombia?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Sí! Realizamos envíos a <strong>todo el territorio nacional colombiano</strong>, incluyendo zonas rurales y municipios pequeños.
                        <br><br>
                        Trabajamos con empresas de mensajería confiables como Servientrega, Coordinadora e Interrapidísimo para garantizar que tu pedido llegue seguro.
                        <br><br>
                        <em>Nota: Algunas zonas muy apartadas pueden tener tiempos de entrega más largos o costos de envío adicionales.</em>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo hacer seguimiento de mi pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Absolutamente! Una vez tu pedido sea despachado, recibirás:
                        <br><br>
                         Un email con el <strong>número de guía</strong> de envío<br>
                         Un enlace directo para rastrear tu paquete en tiempo real<br>
                        Actualizaciones por WhatsApp (si autorizas este medio)
                        <br><br>
                        También puedes hacer seguimiento desde tu cuenta en nuestra página web en la sección "Mis pedidos".
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Qué pasa si no estoy en casa cuando llega el pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Si no te encuentras en el momento de la entrega, la empresa de mensajería:
                        <br><br>
                        <strong>1.</strong> Dejará un aviso de visita con instrucciones<br>
                         <strong>2</strong>Realizará un segundo intento de entrega (generalmente al día siguiente)<br>
                        <strong>3.</strong>Si no hay respuesta, el paquete quedará en la oficina más cercana para que lo recojas
                        <br><br>
                        <strong>Recomendación:</strong> Asegúrate de proporcionar un número de teléfono actualizado para que el mensajero pueda contactarte antes de la entrega.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo cambiar la dirección de envío después de hacer el pedido?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Solo si el pedido <strong>aún no ha sido despachado</strong>. Contáctanos inmediatamente al email soporte@angelow.com o vía WhatsApp indicando:
                        <br><br>
                        • Número de pedido<br>
                        • Nueva dirección de envío completa<br>
                        <br>
                        Una vez el pedido está en camino, ya no es posible cambiar la dirección debido a políticas de las empresas de mensajería.
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="tallas">
            <h2>TALLAS Y MEDIDAS</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo sé qué talla elegir para mi hijo/a?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        En cada producto encontrarás una <strong>guía de tallas detallada</strong> con medidas en centímetros (altura, pecho, cintura, cadera).
                        <br><br>
                        <strong>Consejos para elegir la talla correcta:</strong><br>
                        - Mide a tu hijo/a siguiendo nuestras instrucciones<br>
                        - Compara las medidas con nuestra tabla de tallas<br>
                        - Para bebés, considera que crecen rápido - puedes elegir una talla más grande<br>
                        -Lee los comentarios de otros clientes sobre el ajuste<br>
                         Si tienes dudas, contáctanos con las medidas y te asesoramos
                        <br><br>
                        También tenemos una <strong>política de cambio flexible</strong> si la talla no es la adecuada.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Las tallas corresponden a la edad del niño?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Sí, nuestras tallas están basadas en rangos de edad <strong>como referencia</strong>:
                        <br><br>
                        • 0-3 meses<br>
                        • 3-6 meses<br>
                        • 6-12 meses<br>
                        • 12-18 meses<br>
                        • 2-3 años<br>
                        • 4-5 años<br>
                        • 6-7 años<br>
                        • 8-10 años<br>
                        • 10-12 años
                        <br><br>
                        Sin embargo, <strong>cada niño es diferente</strong>. Te recomendamos siempre revisar las medidas específicas en centímetros de cada prenda para asegurar el mejor ajuste.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Qué hago si la talla no le queda bien?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡No te preocupes! Ofrecemos <strong>cambio por talla sin costo adicional</strong> durante los primeros 15 días después de recibir tu pedido.
                        <br><br>
                        <strong>Requisitos para cambio de talla:</strong><br>
                         La prenda debe estar en perfecto estado, sin usar<br>
                         Con todas sus etiquetas originales<br>
                         En su empaque original<br>
                        <br>
                        Simplemente contáctanos y te enviaremos las instrucciones para el cambio.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo mido correctamente a mi hijo/a?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Para tomar medidas precisas:
                        <br><br>
                        <strong>Altura:</strong> Mide desde la cabeza hasta los pies con el niño/a descalzo y de pie contra una pared.
                        <br><br>
                        <strong>Pecho:</strong> Mide alrededor de la parte más amplia del pecho, pasando la cinta por debajo de los brazos.
                        <br><br>
                        <strong>Cintura:</strong> Mide alrededor de la parte más estrecha del torso, generalmente por encima del ombligo.
                        <br><br>
                        <strong>Cadera:</strong> Mide alrededor de la parte más amplia de las caderas.
                        <br><br>
                        <em>Tip: Toma las medidas sobre ropa interior ligera para mayor precisión.</em>
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="devoluciones">
            <h2>CAMBIOS Y DEVOLUCIONES</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cuál es la política de devoluciones?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Tienes <strong>15 días calendario</strong> desde la recepción del producto para solicitar un cambio o devolución.
                        <br><br>
                        <strong>Motivos válidos:</strong><br>
                         Producto defectuoso o con fallas<br>
                         Recibiste un producto diferente al pedido<br>
                         La talla no es la adecuada<br>
                         No quedaste satisfecho con el producto
                        <br><br>
                        <strong>Condiciones:</strong><br>
                        • El producto debe estar sin usar<br>
                        • Con etiquetas originales<br>
                        • En su empaque original<br>
                        • Debes presentar evidencia fotográfica del estado del producto
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo solicito un cambio o devolución?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        El proceso es muy simple:
                        <br><br>
                        <strong>1.</strong> Contáctanos por email (devoluciones@angelow.com) o WhatsApp<br>
                        <strong>2.</strong> Proporciona tu número de pedido y motivo del cambio/devolución<br>
                        <strong>3.</strong> Envía fotos del producto y evidencia del problema (si aplica)<br>
                        <strong>4.</strong> Te enviaremos una guía prepagada para devolver el producto<br>
                        <strong>5.</strong> Una vez recibido y verificado, procesamos tu cambio o reembolso
                        <br><br>
                        <strong>Tiempo de procesamiento:</strong> 5 a 10 días hábiles después de recibir el producto.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Quién paga el envío de la devolución?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Depende del motivo de la devolución:
                        <br><br>
                        <strong> ANGELOW asume el costo si:</strong><br>
                        • El producto llegó defectuoso o dañado<br>
                        • Recibiste un producto equivocado<br>
                        • Hubo un error en el despacho por nuestra parte
                        <br><br>
                        <strong>El cliente asume el costo si:</strong><br>
                        • Se arrepintió de la compra<br>
                        • Eligió la talla incorrecta<br>
                        • No le gustó el producto (sin defectos)
                        <br><br>
                        En estos casos, puedes usar nuestra tarifa preferencial de envío o elegir tu propia mensajería.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cuánto tardan en reembolsar mi dinero?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Una vez que recibimos y verificamos el producto devuelto, procesamos el reembolso en un plazo de <strong>5 a 10 días hábiles</strong>.
                        <br><br>
                        El dinero será devuelto al mismo medio de pago que utilizaste:
                        <br><br>
                         <strong>Tarjeta de crédito:</strong> 5-10 días hábiles (según tu banco)<br>
                         <strong>Tarjeta débito:</strong> 3-5 días hábiles<br>
                         <strong>Transferencia/PSE:</strong> 3-5 días hábiles<br>
                         <strong>Efectivo:</strong> Te contactaremos para coordinar
                        <br><br>
                        Recibirás un correo de confirmación una vez el reembolso sea procesado.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo cambiar un producto por otro diferente?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Sí, puedes cambiar el producto por:
                        <br><br>
                         El mismo producto en otra talla o color<br>
                         Un producto diferente de igual o mayor valor<br>
                        <br>
                        Si el nuevo producto tiene un valor <strong>mayor</strong>, deberás pagar la diferencia.<br>
                        Si tiene un valor <strong>menor</strong>, te reembolsamos la diferencia o generamos un saldo a favor para tu próxima compra.
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="pagos">
            <h2>MÉTODOS DE PAGO</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Qué métodos de pago aceptan?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Aceptamos diversos métodos de pago para tu comodidad:
                        <br><br>
                         <strong>Tarjetas de crédito:</strong> Visa, Mastercard, American Express, Diners<br>
                         <strong>Tarjetas débito:</strong> Todas las tarjetas débito de bancos colombianos<br>
                         <strong>PSE:</strong> Pago electrónico desde tu banco<br>
                         <strong>Transferencias bancarias</strong><br>
                         <strong>Efectivo:</strong> Puntos Efecty, Baloto, y otros corresponsales<br>
                         <strong>Pago contra entrega:</strong> Disponible en ciudades principales (con recargo adicional)
                        <br><br>
                        Todos los pagos se procesan de forma segura a través de plataformas certificadas.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Es seguro pagar con tarjeta en su página?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Totalmente seguro! Utilizamos las plataformas de pago más confiables y certificadas de Colombia:
                        <br><br>
                         <strong>Cifrado SSL:</strong> Toda la información viaja encriptada<br>
                         <strong>PCI DSS:</strong> Cumplimos con estándares internacionales de seguridad<br>
                         <strong>Pasarelas certificadas:</strong> PayU, Mercado Pago, Wompi<br>
                         <strong>No almacenamos datos de tarjetas:</strong> La información se procesa directamente con el banco
                        <br><br>
                        Nunca tendremos acceso a los datos completos de tu tarjeta.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo pagar en cuotas?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Sí! Si pagas con tarjeta de crédito, puedes diferir tu compra en cuotas:
                        <br><br>
                         <strong>2 cuotas:</strong> Sin intereses<br>
                         <strong>3 cuotas:</strong> Sin intereses<br>
                         <strong>6, 12, 18 o 24 cuotas:</strong> Con la tasa de interés de tu banco
                        <br><br>
                        Las opciones de financiación varían según tu banco emisor. Estas opciones aparecerán automáticamente durante el proceso de pago.
                        <br><br>
                        <em>Nota: Las cuotas sin intereses están sujetas a la política de cada banco.</em>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Mi pago fue rechazado, ¿qué hago?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Si tu pago fue rechazado, puede deberse a varios motivos:
                        <br><br>
                        <strong>Causas comunes:</strong><br>
                        • Fondos insuficientes en tu cuenta<br>
                        • Límite de compra diario excedido<br>
                        • Datos incorrectos de la tarjeta<br>
                        • Tarjeta bloqueada por el banco<br>
                        • Problemas temporales del sistema bancario
                        <br><br>
                        <strong>Soluciones:</strong><br>
                         Verifica los datos ingresados<br>
                         Contacta a tu banco para verificar el estado de tu tarjeta<br>
                         Intenta con otro método de pago<br>
                         Si el problema persiste, contáctanos para ayudarte
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Emiten factura?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Por supuesto! Todos nuestros pedidos incluyen <strong>factura electrónica</strong>.
                        <br><br>
                         La factura se envía automáticamente a tu correo electrónico una vez confirmado el pago.<br>
                         También puedes descargarla desde tu cuenta en la sección "Mis pedidos".<br>
                        <br>
                        Si necesitas que la factura sea a nombre de una empresa, asegúrate de indicar el <strong>NIT y razón social</strong> antes de confirmar tu compra.
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="productos">
            <h2>PRODUCTOS Y CALIDAD</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Qué tipo de productos venden?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ANGELOW es una tienda especializada en <strong>ropa para niños y niñas de 0 a 12 años</strong>:
                        <br><br>
                         <strong>Bebés (0-24 meses):</strong> Bodies, pijamas, conjuntos, accesorios<br>
                         <strong>Niñas (2-12 años):</strong> Vestidos, faldas, blusas, pantalones, conjuntos<br>
                         <strong>Niños (2-12 años):</strong> Camisetas, pantalones, bermudas, conjuntos deportivos<br>
                         <strong>Accesorios:</strong> Gorras, medias, zapatos, mochilas<br>
                         <strong>Ocasiones especiales:</strong> Ropa para fiestas, bautizos, cumpleaños
                        <br><br>
                        Todos nuestros productos son de excelente calidad, cómodos y con diseños modernos.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Los productos son de buena calidad?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Absolutamente! En ANGELOW nos enfocamos en ofrecer productos de <strong>alta calidad</strong>:
                        <br><br>
                         <strong>Materiales premium:</strong> Algodón suave, telas transpirables<br>
                         <strong>Costuras reforzadas:</strong> Para mayor durabilidad<br>
                         <strong>Diseños cómodos:</strong> Pensados para la movilidad de los niños<br>
                         <strong>Colores resistentes:</strong> No se decoloran con el lavado<br>
                         <strong>Control de calidad:</strong> Cada producto es revisado antes de enviarlo<br>
                         <strong>Garantía:</strong> Si encuentras algún defecto, lo cambiamos sin problema
                        <br><br>
                        Lee las reseñas de nuestros clientes satisfechos en cada producto.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo debo lavar y cuidar las prendas?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Para mantener tus prendas en perfecto estado:
                        <br><br>
                         <strong>Lavado:</strong> Preferiblemente a mano o ciclo delicado en lavadora<br>
                         <strong>Temperatura:</strong> Agua fría o tibia (máximo 30°C)<br>
                         <strong>Detergente:</strong> Suave, sin blanqueadores agresivos<br>
                         <strong>Secado:</strong> Al aire libre, evita la secadora<br>
                         <strong>Planchado:</strong> Temperatura baja, del revés si es posible<br>
                        <br>
                        Cada prenda incluye etiqueta con instrucciones específicas de cuidado.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Tienen productos orgánicos o ecológicos?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Sí! Tenemos una línea especial de productos <strong>eco-friendly</strong>:
                        <br><br>
                         <strong>Algodón orgánico certificado</strong><br>
                         <strong>Materiales reciclados</strong><br>
                         <strong>Tintes naturales sin químicos tóxicos</strong><br>
                         <strong>Producción sostenible</strong><br>
                        <br>
                        Busca el sello "ECO" o "ORGÁNICO" en la descripción de cada producto. Estos productos son ideales para pieles sensibles y para familias conscientes del medio ambiente.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Tienen garantía los productos?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Sí, todos nuestros productos tienen <strong>garantía de 30 días</strong> contra defectos de fabricación:
                        <br><br>
                         Costuras que se deshacen<br>
                         Botones o cierres defectuosos<br>
                         Decoloración anormal<br>
                         Problemas con el material<br>
                        <br>
                        Si detectas algún defecto dentro de los 30 días, contáctanos y te enviaremos un reemplazo o reembolso, ¡sin costo alguno para ti!
                        <br><br>
                        <em>Nota: La garantía no cubre desgaste normal por uso o daños causados por mal manejo.</em>
                    </div>
                </div>
            </div>
        </div>

        <div class="term-section" id="cuenta">
            <h2> MI CUENTA</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo creo una cuenta?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Crear una cuenta es rápido y fácil:
                        <br><br>
                         Haz clic en "Registrarse" en la parte superior del sitio<br>
                        Completa el formulario con tu información básica<br>
                        Crea una contraseña segura<br>
                        Verifica tu correo electrónico<br>
                         ¡Listo! Ya puedes empezar a comprar
                        <br><br>
                        También puedes registrarte durante el proceso de compra.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Olvidé mi contraseña, ¿qué hago?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        No te preocupes, es muy fácil recuperarla:
                        <br><br>
                        Ve a la página de inicio de sesión<br>
                        Haz clic en "¿Olvidaste tu contraseña?"<br>
                        Ingresa tu correo electrónico<br>
                        Recibirás un link para crear una nueva contraseña<br>
                        Sigue las instrucciones del correo
                        <br><br>
                        Si no recibes el correo en 10 minutos, revisa tu carpeta de spam o contáctanos.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo actualizo mi información personal?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Para actualizar tus datos:
                        <br><br>
                         Inicia sesión en tu cuenta<br>
                        Ve a "Mi perfil" o "Configuración"<br>
                         Edita la información que desees cambiar<br>
                         Guarda los cambios
                        <br><br>
                        Puedes actualizar: nombre, correo, teléfono, dirección, contraseña y preferencias de comunicación.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Cómo elimino mi cuenta?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Lamentamos que quieras irte, pero respetamos tu decisión:
                        <br><br>
                        Para eliminar tu cuenta, envíanos un correo a <strong>privacidad@angelow.com</strong> con:
                        <br>
                        • Tu nombre completo<br>
                        • Correo electrónico registrado<br>
                        • Solicitud expresa de eliminación
                        <br><br>
                        Procesaremos tu solicitud en un plazo de <strong>10 días hábiles</strong>.
                        <br><br>
                        <em>Nota: Una vez eliminada tu cuenta, perderás acceso a tu historial de pedidos y saldos a favor.</em>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>¿Puedo tener varias direcciones de envío guardadas?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        ¡Sí! En tu cuenta puedes guardar <strong>múltiples direcciones de envío</strong>:
                        <br><br>
                        Casa<br>
                        Oficina<br>
                         Casa de familiares<br>
                        Direcciones para regalos<br>
                        <br>
                        Esto hace que tus futuras compras sean mucho más rápidas. Simplemente selecciona la dirección deseada al momento del pago.
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-box">
            <h3>¿No encontraste la respuesta que buscabas?</h3>
            <p>Nuestro equipo de atención al cliente está listo para ayudarte</p>
            
            <div class="contact-info">
                <div class="contact-item">
                    <strong>Email</strong>
                    <span>soporte@angelow.com</span>
                </div>
                <div class="contact-item">
                    <strong>WhatsApp</strong>
                    <span>+57 300 123 4567</span>
                </div>
                <div class="contact-item">
                    <strong>Teléfono</strong>
                    <span>+57 300 123 4567</span>
                </div>
                <div class="contact-item">
                    <strong>Horario</strong>
                    <span>Lun - Vie: 8:00 AM - 6:00 PM<br>Sáb: 9:00 AM - 2:00 PM</span>
                </div>
            </div>

            <div class="highlight-box" style="margin-top: 30px; text-align: left;">
                <h3>Respuesta rápida garantizada</h3>
                <p><strong>Email:</strong> Respondemos en menos de 24 horas</p>
                <p><strong>WhatsApp:</strong> Respuesta inmediata en horario laboral</p>
                <p><strong>Teléfono:</strong> Atención en tiempo real</p>
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
        <a href="pedidos-envios.html">Pedidos y Envíos</a>
        <a href="contacto.html">Contacto</a>
    </div>
</footer>

<script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // Funcionalidad de acordeón para preguntas frecuentes
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Cerrar todos los items
            faqItems.forEach(otherItem => {
                otherItem.classList.remove('active');
            });
            
            // Abrir el item clickeado si no estaba activo
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

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

    // Abrir la primera pregunta de cada sección automáticamente (opcional)
    document.querySelectorAll('.term-section').forEach(section => {
        const firstFaq = section.querySelector('.faq-item');
        if (firstFaq) {
            // Comentado para que no se abran automáticamente
            // firstFaq.classList.add('active');
        }
    });
</script>

</body>
</html>