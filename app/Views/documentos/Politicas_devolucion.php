<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Devoluciones y Cambios - ANGELOW</title>
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

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 30px;
            flex: 1;
        }

        .banner {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            color: white;
            text-align: center;
        }

        .header-section {
            text-align: center;
            margin-bottom: 50px;
        }

        .header-section h1 {
            font-size: 38px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .nav {
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

        .nav a {
            padding: 12px 25px;
            background: var(--bg-soft);
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
        }

        .nav a.active {
            background: var(--primary);
            color: white;
        }

        .content {
            background: var(--white);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 8px 25px var(--shadow);
        }

        .section {
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid var(--border-light);
        }

        .section h2 {
            color: var(--primary);
            font-size: 24px;
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 5px solid var(--accent);
        }

        .section p {
            color: var(--text-secondary);
            margin-bottom: 15px;
        }

        .section ul, .section ol {
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
            <span>DEVOLUCIONES Y CAMBIOS</span>
        </div>
    </a>
</header>

<div class="container">

    <div class="banner">
        <h2>POLÍTICAS DE DEVOLUCIONES Y CAMBIOS</h2>
        <p>Lineamientos aplicables a todos los productos adquiridos a través de nuestros canales oficiales.</p>
    </div>

    <div class="header-section">
        <h1>GESTIÓN DE CAMBIOS Y DEVOLUCIONES</h1>
        <p>Vigente para compras realizadas en www.angelow.com</p>
    </div>

    <div class="nav">
        <a href="#plazo" class="active">Plazo</a>
        <a href="#condiciones">Condiciones</a>
        <a href="#procedimiento">Procedimiento</a>
        <a href="#reembolsos">Reembolsos</a>
        <a href="#excepciones">Excepciones</a>
        <a href="#garantia">Garantía</a>
    </div>

    <div class="content">

        <div class="section" id="plazo">
            <h2>1. PLAZO PARA SOLICITAR CAMBIO O DEVOLUCIÓN</h2>
            <p>El cliente podrá solicitar cambio o devolución dentro de los treinta (30) días calendario siguientes a la fecha de recepción del producto.</p>
            <p>Transcurrido este plazo, no se aceptarán solicitudes salvo en casos de garantía por defecto de fabricación.</p>
        </div>

        <div class="section" id="condiciones">
            <h2>2. CONDICIONES GENERALES</h2>
            <ul>
                <li>El producto debe encontrarse en estado original.</li>
                <li>No debe presentar señales de uso, lavado o alteración.</li>
                <li>Debe conservar etiquetas y empaques originales.</li>
                <li>Se debe presentar comprobante de compra.</li>
            </ul>
        </div>

        <div class="section" id="procedimiento">
            <h2>3. PROCEDIMIENTO</h2>
            <ol>
                <li>Solicitar el cambio o devolución a través de los canales oficiales.</li>
                <li>Indicar número de pedido y motivo de la solicitud.</li>
                <li>Enviar el producto según las instrucciones proporcionadas.</li>
                <li>Esperar validación del área de calidad.</li>
            </ol>
            <p>La validación podrá tardar entre tres (3) y cinco (5) días hábiles desde la recepción del producto.</p>
        </div>

        <div class="section" id="reembolsos">
            <h2>4. REEMBOLSOS</h2>
            <p>En caso de proceder la devolución, el reembolso se realizará por el mismo medio de pago utilizado en la compra.</p>
            <p>El tiempo de procesamiento dependerá de la entidad financiera y podrá oscilar entre cinco (5) y quince (15) días hábiles.</p>
        </div>

        <div class="section" id="excepciones">
            <h2>5. EXCEPCIONES</h2>
            <ul>
                <li>Productos personalizados no admiten devolución.</li>
                <li>Artículos en promoción pueden estar sujetos a condiciones especiales.</li>
                <li>No se aceptarán devoluciones por desgaste natural.</li>
            </ul>
        </div>

        <div class="section" id="garantia">
            <h2>6. GARANTÍA POR DEFECTO DE FABRICACIÓN</h2>
            <p>Los productos cuentan con garantía de noventa (90) días por defectos de fabricación.</p>
            <p>La garantía cubre fallas estructurales del producto y no daños ocasionados por uso inadecuado.</p>
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
