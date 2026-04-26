<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Tallas - ANGELOW</title>
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

        .term-section ul {
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

        .size-table-container {
            overflow-x: auto;
            margin: 30px 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .size-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .size-table thead {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
        }

        .size-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
            border-bottom: 2px solid var(--border-light);
        }

        .size-table th:first-child {
            border-top-left-radius: 12px;
        }

        .size-table th:last-child {
            border-top-right-radius: 12px;
        }

        .size-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-light);
            color: var(--text-secondary);
            font-size: 14px;
        }

        .size-table tbody tr:hover {
            background: var(--bg-light);
        }

        .size-table tbody tr:last-child td {
            border-bottom: none;
        }

        .size-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        .size-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        .size-label {
            font-weight: 600;
            color: var(--primary);
            font-size: 15px;
        }

        .measurement-guide {
            background: var(--bg-soft);
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
        }

        .measurement-guide h3 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 22px;
        }

        .measurement-item {
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            border-left: 4px solid var(--accent);
        }

        .measurement-item h4 {
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 18px;
        }

        .measurement-item p {
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

        .comparison-table {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .comparison-card {
            background: var(--bg-soft);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .comparison-card:hover {
            border-color: var(--accent);
            box-shadow: 0 4px 15px var(--shadow);
            transform: translateY(-5px);
        }

        .comparison-card h4 {
            color: var(--primary);
            margin-bottom: 15px;
            font-size: 20px;
            text-align: center;
        }

        .comparison-card ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .comparison-card li {
            padding: 10px 0;
            border-bottom: 1px solid var(--border-light);
            color: var(--text-secondary);
        }

        .comparison-card li:last-child {
            border-bottom: none;
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
            .size-table { font-size: 12px; }
            .size-table th, .size-table td { padding: 10px 8px; }
            .comparison-table { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<header>
    <a href="inicio.html" class="logo"> 
        <img src="../../IMG/logo.png" alt="ANGELOW" class="logo-img">
        <div class="logo-text">
            <span>ANGELOW</span>
            <span>GUÍA DE TALLAS</span>
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
        <h2>GUÍA DE TALLAS</h2>
        <p>Encuentra la talla perfecta para tu hijo o hija con nuestras tablas detalladas y consejos prácticos</p>
    </div>

    <div class="terms-header">
        <h1>ENCUENTRA LA TALLA PERFECTA</h1>
        <p>Consulta nuestras tablas de medidas y aprende a tomar las medidas correctamente</p>
    </div>

    <div class="terms-nav">
        <a href="#bebes" class="nav-link active">Bebés</a>
        <a href="#ninas" class="nav-link">Niñas</a>
        <a href="#ninos" class="nav-link">Niños</a>
        <a href="#medidas" class="nav-link">Cómo Medir</a>
        <a href="#consejos" class="nav-link">Consejos</a>
        <a href="#equivalencias" class="nav-link">Equivalencias</a>
    </div>

    <div class="terms-content">

        <div class="highlight-box">
            <h3>Información Importante</h3>
            <p>Todas nuestras medidas están expresadas en centímetros. Las tallas están basadas en la edad promedio, pero cada niño es diferente. Te recomendamos siempre consultar las medidas específicas de altura, pecho, cintura y cadera para asegurar el mejor ajuste.</p>
            <p style="margin-top: 10px;"><strong>Nota:</strong> Si tu hijo o hija está entre dos tallas, te recomendamos elegir la talla mayor para mayor comodidad y durabilidad.</p>
        </div>

        <div class="term-section" id="bebes">
            <h2>TALLAS PARA BEBÉS (0-24 MESES)</h2>
            
            <p>Nuestras prendas para bebés están diseñadas pensando en su comodidad y facilidad de uso. Las tallas se basan en la edad y altura del bebé.</p>

            <div class="size-table-container">
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Talla</th>
                            <th>Edad</th>
                            <th>Altura (cm)</th>
                            <th>Peso (kg)</th>
                            <th>Pecho (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size-label">0-3M</td>
                            <td>0-3 meses</td>
                            <td>50-62</td>
                            <td>3-6</td>
                            <td>40-43</td>
                        </tr>
                        <tr>
                            <td class="size-label">3-6M</td>
                            <td>3-6 meses</td>
                            <td>62-68</td>
                            <td>6-8</td>
                            <td>43-46</td>
                        </tr>
                        <tr>
                            <td class="size-label">6-9M</td>
                            <td>6-9 meses</td>
                            <td>68-74</td>
                            <td>8-9</td>
                            <td>46-48</td>
                        </tr>
                        <tr>
                            <td class="size-label">9-12M</td>
                            <td>9-12 meses</td>
                            <td>74-80</td>
                            <td>9-11</td>
                            <td>48-50</td>
                        </tr>
                        <tr>
                            <td class="size-label">12-18M</td>
                            <td>12-18 meses</td>
                            <td>80-86</td>
                            <td>11-12</td>
                            <td>50-52</td>
                        </tr>
                        <tr>
                            <td class="size-label">18-24M</td>
                            <td>18-24 meses</td>
                            <td>86-92</td>
                            <td>12-14</td>
                            <td>52-54</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tip-box">
                <h4>Consejo para Bebés</h4>
                <p>Los bebés crecen muy rápido durante su primer año. Si tu bebé está cerca de pasar a la siguiente talla o quieres que la prenda dure más tiempo, considera comprar una talla más grande. Las prendas ligeramente grandes son preferibles a las ajustadas en esta etapa.</p>
            </div>

            <div class="measurement-guide">
                <h3>Características Especiales para Bebés</h3>
                <div class="measurement-item">
                    <h4>Bodies y Enterizos</h4>
                    <p>Nuestros bodies tienen broches en la entrepierna para facilitar el cambio de pañal. Los enterizos incluyen broches o cremalleras que permiten cambios rápidos.</p>
                </div>
                <div class="measurement-item">
                    <h4>Pijamas</h4>
                    <p>Diseñados con telas suaves y elásticas que se adaptan al movimiento del bebé. Algunos modelos incluyen pies cerrados para mayor calidez.</p>
                </div>
                <div class="measurement-item">
                    <h4>Conjuntos</h4>
                    <p>Los conjuntos de dos piezas ofrecen versatilidad y comodidad. Perfectos para combinar y usar en diferentes ocasiones.</p>
                </div>
            </div>
        </div>

        <div class="term-section" id="ninas">
            <h2>TALLAS PARA NIÑAS (2-12 AÑOS)</h2>
            
            <p>Las prendas para niñas están disponibles en una amplia variedad de estilos. Consulta la tabla para encontrar la talla correcta según las medidas de tu hija.</p>

            <div class="size-table-container">
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Talla</th>
                            <th>Edad</th>
                            <th>Altura (cm)</th>
                            <th>Pecho (cm)</th>
                            <th>Cintura (cm)</th>
                            <th>Cadera (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size-label">2T</td>
                            <td>2 años</td>
                            <td>92-98</td>
                            <td>54-56</td>
                            <td>51-53</td>
                            <td>56-58</td>
                        </tr>
                        <tr>
                            <td class="size-label">3T</td>
                            <td>3 años</td>
                            <td>98-104</td>
                            <td>56-58</td>
                            <td>53-55</td>
                            <td>58-61</td>
                        </tr>
                        <tr>
                            <td class="size-label">4T</td>
                            <td>4 años</td>
                            <td>104-110</td>
                            <td>58-60</td>
                            <td>55-57</td>
                            <td>61-64</td>
                        </tr>
                        <tr>
                            <td class="size-label">5</td>
                            <td>5 años</td>
                            <td>110-116</td>
                            <td>60-62</td>
                            <td>57-59</td>
                            <td>64-67</td>
                        </tr>
                        <tr>
                            <td class="size-label">6</td>
                            <td>6 años</td>
                            <td>116-122</td>
                            <td>62-65</td>
                            <td>59-61</td>
                            <td>67-70</td>
                        </tr>
                        <tr>
                            <td class="size-label">7</td>
                            <td>7 años</td>
                            <td>122-128</td>
                            <td>65-68</td>
                            <td>61-63</td>
                            <td>70-73</td>
                        </tr>
                        <tr>
                            <td class="size-label">8</td>
                            <td>8 años</td>
                            <td>128-134</td>
                            <td>68-71</td>
                            <td>63-66</td>
                            <td>73-77</td>
                        </tr>
                        <tr>
                            <td class="size-label">10</td>
                            <td>9-10 años</td>
                            <td>134-140</td>
                            <td>71-75</td>
                            <td>66-69</td>
                            <td>77-81</td>
                        </tr>
                        <tr>
                            <td class="size-label">12</td>
                            <td>11-12 años</td>
                            <td>140-152</td>
                            <td>75-80</td>
                            <td>69-72</td>
                            <td>81-86</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="comparison-table">
                <div class="comparison-card">
                    <h4>Vestidos</h4>
                    <ul>
                        <li>Largo hasta la rodilla o más</li>
                        <li>Diseños con cintura elástica</li>
                        <li>Fáciles de poner y quitar</li>
                        <li>Perfectos para ocasiones especiales</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Blusas y Camisetas</h4>
                    <ul>
                        <li>Corte regular y cómodo</li>
                        <li>Manga corta y manga larga</li>
                        <li>Telas suaves y transpirables</li>
                        <li>Fácil combinación</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Pantalones y Faldas</h4>
                    <ul>
                        <li>Cintura elástica ajustable</li>
                        <li>Diferentes largos disponibles</li>
                        <li>Materiales duraderos</li>
                        <li>Bolsillos funcionales</li>
                    </ul>
                </div>
            </div>

            <div class="important-box">
                <h4>Importante: Ajuste de Vestidos</h4>
                <p>Los vestidos tienen un ajuste más holgado en el pecho y cintura para permitir movimiento. Si buscas un ajuste más ceñido, considera elegir una talla menor. Para vestidos de fiesta, recomendamos tomar medidas exactas del pecho y largo deseado.</p>
            </div>
        </div>

        <div class="term-section" id="ninos">
            <h2>TALLAS PARA NIÑOS (2-12 AÑOS)</h2>
            
            <p>Las prendas para niños están diseñadas para ofrecer máxima comodidad y libertad de movimiento, ideales para el juego activo.</p>

            <div class="size-table-container">
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Talla</th>
                            <th>Edad</th>
                            <th>Altura (cm)</th>
                            <th>Pecho (cm)</th>
                            <th>Cintura (cm)</th>
                            <th>Cadera (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size-label">2T</td>
                            <td>2 años</td>
                            <td>92-98</td>
                            <td>54-56</td>
                            <td>51-53</td>
                            <td>55-57</td>
                        </tr>
                        <tr>
                            <td class="size-label">3T</td>
                            <td>3 años</td>
                            <td>98-104</td>
                            <td>56-58</td>
                            <td>53-55</td>
                            <td>57-60</td>
                        </tr>
                        <tr>
                            <td class="size-label">4T</td>
                            <td>4 años</td>
                            <td>104-110</td>
                            <td>58-60</td>
                            <td>55-57</td>
                            <td>60-63</td>
                        </tr>
                        <tr>
                            <td class="size-label">5</td>
                            <td>5 años</td>
                            <td>110-116</td>
                            <td>60-63</td>
                            <td>57-59</td>
                            <td>63-66</td>
                        </tr>
                        <tr>
                            <td class="size-label">6</td>
                            <td>6 años</td>
                            <td>116-122</td>
                            <td>63-66</td>
                            <td>59-61</td>
                            <td>66-69</td>
                        </tr>
                        <tr>
                            <td class="size-label">7</td>
                            <td>7 años</td>
                            <td>122-128</td>
                            <td>66-69</td>
                            <td>61-64</td>
                            <td>69-72</td>
                        </tr>
                        <tr>
                            <td class="size-label">8</td>
                            <td>8 años</td>
                            <td>128-134</td>
                            <td>69-72</td>
                            <td>64-67</td>
                            <td>72-76</td>
                        </tr>
                        <tr>
                            <td class="size-label">10</td>
                            <td>9-10 años</td>
                            <td>134-140</td>
                            <td>72-76</td>
                            <td>67-70</td>
                            <td>76-80</td>
                        </tr>
                        <tr>
                            <td class="size-label">12</td>
                            <td>11-12 años</td>
                            <td>140-152</td>
                            <td>76-81</td>
                            <td>70-74</td>
                            <td>80-85</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="comparison-table">
                <div class="comparison-card">
                    <h4>Camisetas</h4>
                    <ul>
                        <li>Cuello redondo o con botones</li>
                        <li>Manga corta y manga larga</li>
                        <li>Algodón 100% transpirable</li>
                        <li>Diseños variados</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Pantalones</h4>
                    <ul>
                        <li>Cintura con elástico o cordón</li>
                        <li>Jean, drill y tela deportiva</li>
                        <li>Rodillas reforzadas</li>
                        <li>Bolsillos funcionales</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Conjuntos Deportivos</h4>
                    <ul>
                        <li>Materiales elásticos</li>
                        <li>Secado rápido</li>
                        <li>Ideal para actividad física</li>
                        <li>Diseños modernos</li>
                    </ul>
                </div>
            </div>

            <div class="tip-box">
                <h4>Consejo para Pantalones</h4>
                <p>Los pantalones con cintura elástica ajustable ofrecen mayor flexibilidad de talla y pueden durar más tiempo a medida que el niño crece. Si tu hijo está entre tallas, la cintura ajustable te permitirá adaptar la prenda perfectamente.</p>
            </div>
        </div>

        <div class="term-section" id="medidas">
            <h2>CÓMO TOMAR LAS MEDIDAS CORRECTAMENTE</h2>
            
            <p>Tomar las medidas correctas es fundamental para elegir la talla adecuada. Sigue estas instrucciones paso a paso para obtener mediciones precisas.</p>

            <div class="highlight-box">
                <h3>Herramientas Necesarias</h3>
                <ul>
                    <li>Cinta métrica flexible (de costura)</li>
                    <li>Superficie plana contra la pared (para medir altura)</li>
                    <li>Ayuda de otra persona (recomendado)</li>
                    <li>Ropa interior ligera (para mediciones más precisas)</li>
                </ul>
            </div>

            <div class="measurement-guide">
                <h3>Guía de Medición Paso a Paso</h3>
                
                <div class="measurement-item">
                    <h4>1. ALTURA</h4>
                    <p><strong>Cómo medir:</strong> Coloca al niño o niña descalzo, de pie, con la espalda completamente recta contra una pared. Asegúrate de que los talones, glúteos y cabeza toquen la pared. Coloca un libro o regla horizontal sobre la cabeza y marca el punto donde toca la pared. Mide desde el suelo hasta la marca.</p>
                    <p><strong>Consejo:</strong> Es mejor medir por la mañana, cuando la columna está más extendida.</p>
                </div>

                <div class="measurement-item">
                    <h4>2. PECHO</h4>
                    <p><strong>Cómo medir:</strong> Pasa la cinta métrica alrededor de la parte más amplia del pecho, justo debajo de las axilas. La cinta debe estar horizontal y ajustada pero no apretada. El niño debe estar de pie, relajado, con los brazos a los costados y respirando normalmente.</p>
                    <p><strong>Consejo:</strong> No comprimas el pecho con la cinta; debe poder pasar un dedo entre la cinta y el cuerpo.</p>
                </div>

                <div class="measurement-item">
                    <h4>3. CINTURA</h4>
                    <p><strong>Cómo medir:</strong> Mide alrededor de la parte más estrecha del torso, generalmente a la altura del ombligo o ligeramente por encima. Pide al niño que se relaje y no meta la barriga. La cinta debe estar cómoda, sin apretar.</p>
                    <p><strong>Consejo:</strong> La cintura natural suele estar donde el cuerpo se dobla naturalmente al inclinarse hacia un lado.</p>
                </div>

                <div class="measurement-item">
                    <h4>4. CADERA</h4>
                    <p><strong>Cómo medir:</strong> Pasa la cinta métrica alrededor de la parte más ancha de las caderas y glúteos. Asegúrate de que la cinta esté completamente horizontal alrededor del cuerpo. El niño debe estar de pie con los pies juntos.</p>
                    <p><strong>Consejo:</strong> Esta medida es especialmente importante para pantalones y faldas.</p>
                </div>

                <div class="measurement-item">
                    <h4>5. LARGO DE PIERNA (Para pantalones)</h4>
                    <p><strong>Cómo medir:</strong> Mide desde la entrepierna hasta el tobillo, por el interior de la pierna. El niño debe estar de pie y descalzo. Esta medida te ayudará a determinar si el largo del pantalón será apropiado.</p>
                    <p><strong>Consejo:</strong> Considera el tipo de calzado que usará habitualmente con ese pantalón.</p>
                </div>

                <div class="measurement-item">
                    <h4>6. LARGO DE MANGA (Para camisas y chaquetas)</h4>
                    <p><strong>Cómo medir:</strong> Con el brazo ligeramente doblado, mide desde el hombro (donde comienza el brazo) hasta la muñeca. La cinta debe seguir la línea natural del brazo.</p>
                    <p><strong>Consejo:</strong> Para mangas largas, la prenda debe llegar hasta el hueso de la muñeca.</p>
                </div>
            </div>

            <div class="important-box">
                <h4>Importante: Momentos para Medir</h4>
                <p>Toma las medidas cuando el niño esté relajado y de buen ánimo. Evita medir después de las comidas o cuando esté cansado. Las mediciones más precisas se obtienen con ropa interior ligera o directamente sobre la piel (en un ambiente cómodo).</p>
            </div>
        </div>

        <div class="term-section" id="consejos">
            <h2>CONSEJOS PARA ELEGIR LA TALLA CORRECTA</h2>
            
            <div class="highlight-box">
                <h3>Recomendaciones Generales</h3>
                <ul>
                    <li><strong>Compara con prendas actuales:</strong> Revisa las etiquetas de la ropa que le queda bien actualmente y compara las medidas.</li>
                    <li><strong>Considera la temporada:</strong> Si compras ropa para usar en meses futuros, ten en cuenta el crecimiento esperado.</li>
                    <li><strong>Lee las reseñas:</strong> Los comentarios de otros padres pueden indicar si una prenda corre grande, pequeña o es fiel a la talla.</li>
                    <li><strong>Revisa la composición:</strong> Las telas con elastano o lycra ofrecen mayor flexibilidad en el ajuste.</li>
                    <li><strong>Ante la duda, elige la talla mayor:</strong> Es preferible que la ropa quede ligeramente holgada a que quede ajustada.</li>
                </ul>
            </div>

            <div class="measurement-guide">
                <h3>Consejos por Tipo de Prenda</h3>
                
                <div class="measurement-item">
                    <h4>Pijamas</h4>
                    <p>Los pijamas pueden ser un poco más holgados para mayor comodidad durante el sueño. Si tu hijo está entre tallas, elige la mayor. Los pijamas de dos piezas permiten combinar tallas diferentes para la parte superior e inferior si es necesario.</p>
                </div>

                <div class="measurement-item">
                    <h4>Ropa Interior</h4>
                    <p>La ropa interior debe quedar ajustada pero cómoda. No elijas tallas muy grandes, ya que esto puede causar incomodidad. Basándose en la medida de cintura y cadera es la mejor opción.</p>
                </div>

                <div class="measurement-item">
                    <h4>Ropa Deportiva</h4>
                    <p>La ropa deportiva debe permitir movimiento libre. Las telas elásticas se adaptan mejor, pero asegúrate de que no quede demasiado ajustada en pecho y cintura. Para actividades intensas, una talla ligeramente más holgada es mejor.</p>
                </div>

                <div class="measurement-item">
                    <h4>Ropa de Fiesta</h4>
                    <p>Para ocasiones especiales, es importante que la talla sea exacta para un ajuste impecable. Toma todas las medidas con precisión y consulta nuestro servicio de atención si tienes dudas sobre el ajuste de vestidos o trajes formales.</p>
                </div>

                <div class="measurement-item">
                    <h4>Abrigos y Chaquetas</h4>
                    <p>Los abrigos deben tener espacio suficiente para usar con otras prendas debajo. Considera elegir una talla mayor si planeas que use suéteres gruesos debajo. Verifica el largo de manga para asegurar que cubra completamente las muñecas.</p>
                </div>
            </div>

            <div class="tip-box">
                <h4>Crecimiento y Durabilidad</h4>
                <p>Los niños crecen aproximadamente 5-8 cm por año entre los 2 y 10 años. Si compras ropa para usar dentro de algunos meses, considera este crecimiento. Sin embargo, evita comprar prendas excesivamente grandes, ya que la ropa muy holgada puede ser incómoda y poco práctica.</p>
            </div>

            <div class="comparison-table">
                <div class="comparison-card">
                    <h4>Ajuste Perfecto</h4>
                    <ul>
                        <li>Permite movimiento libre</li>
                        <li>No marca ni aprieta</li>
                        <li>Largo apropiado</li>
                        <li>Cómodo todo el día</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Demasiado Pequeño</h4>
                    <ul>
                        <li>Marca en la piel</li>
                        <li>Restringe movimiento</li>
                        <li>Mangas y piernas cortas</li>
                        <li>Difícil de poner/quitar</li>
                    </ul>
                </div>
                <div class="comparison-card">
                    <h4>Demasiado Grande</h4>
                    <ul>
                        <li>Cuelga excesivamente</li>
                        <li>Mangas cubren las manos</li>
                        <li>Riesgo de tropiezos</li>
                        <li>Aspecto descuidado</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="term-section" id="equivalencias">
            <h2>TABLA DE EQUIVALENCIAS INTERNACIONALES</h2>
            
            <p>Si estás familiarizado con tallas de otros países, consulta nuestra tabla de equivalencias para encontrar la talla correspondiente en ANGELOW.</p>

            <div class="size-table-container">
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>ANGELOW (Colombia)</th>
                            <th>USA</th>
                            <th>Europa</th>
                            <th>UK</th>
                            <th>Edad Aprox.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size-label">0-3M</td>
                            <td>0-3M</td>
                            <td>50-62</td>
                            <td>0-3M</td>
                            <td>0-3 meses</td>
                        </tr>
                        <tr>
                            <td class="size-label">3-6M</td>
                            <td>3-6M</td>
                            <td>62-68</td>
                            <td>3-6M</td>
                            <td>3-6 meses</td>
                        </tr>
                        <tr>
                            <td class="size-label">6-12M</td>
                            <td>6-12M</td>
                            <td>68-80</td>
                            <td>6-12M</td>
                            <td>6-12 meses</td>
                        </tr>
                        <tr>
                            <td class="size-label">12-18M</td>
                            <td>12-18M</td>
                            <td>80-86</td>
                            <td>12-18M</td>
                            <td>12-18 meses</td>
                        </tr>
                        <tr>
                            <td class="size-label">18-24M</td>
                            <td>18-24M / 2T</td>
                            <td>86-92</td>
                            <td>18-24M</td>
                            <td>18-24 meses</td>
                        </tr>
                        <tr>
                            <td class="size-label">2T</td>
                            <td>2T</td>
                            <td>92</td>
                            <td>2-3Y</td>
                            <td>2 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">3T</td>
                            <td>3T</td>
                            <td>98</td>
                            <td>3-4Y</td>
                            <td>3 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">4T</td>
                            <td>4T</td>
                            <td>104</td>
                            <td>4-5Y</td>
                            <td>4 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">5</td>
                            <td>5</td>
                            <td>110</td>
                            <td>5-6Y</td>
                            <td>5 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">6</td>
                            <td>6/6X</td>
                            <td>116</td>
                            <td>6-7Y</td>
                            <td>6 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">7</td>
                            <td>7</td>
                            <td>122</td>
                            <td>7-8Y</td>
                            <td>7 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">8</td>
                            <td>8</td>
                            <td>128</td>
                            <td>8-9Y</td>
                            <td>8 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">10</td>
                            <td>10</td>
                            <td>140</td>
                            <td>9-10Y</td>
                            <td>9-10 años</td>
                        </tr>
                        <tr>
                            <td class="size-label">12</td>
                            <td>12</td>
                            <td>152</td>
                            <td>11-12Y</td>
                            <td>11-12 años</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="important-box">
                <h4>Nota Sobre Equivalencias</h4>
                <p>Las equivalencias son aproximadas y pueden variar según la marca y el país de origen. Siempre recomendamos verificar las medidas específicas en centímetros para asegurar el mejor ajuste. Las tallas internacionales son solo una referencia general.</p>
            </div>
        </div>

        <div class="term-section" id="ayuda">
            <h2>NECESITAS AYUDA ADICIONAL</h2>
            
            <div class="highlight-box">
                <h3>Servicio de Asesoría Personalizada</h3>
                <p>Si después de consultar nuestra guía aún tienes dudas sobre qué talla elegir, nuestro equipo está disponible para ayudarte de forma personalizada.</p>
                <p style="margin-top: 15px;"><strong>Cómo contactarnos:</strong></p>
                <ul>
                    <li><strong>Email:</strong> tallas@angelow.com</li>
                    <li><strong>WhatsApp:</strong> +57 (xxx) xxx-xxxx</li>
                    <li><strong>Teléfono:</strong> +57 (xxx) xxx-xxxx</li>
                    <li><strong>Chat en línea:</strong> Disponible en nuestro sitio web</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Horario de atención:</strong> Lunes a Viernes de 8:00 AM a 6:00 PM | Sábados de 9:00 AM a 2:00 PM</p>
            </div>

            <div class="measurement-guide">
                <h3>Información a Proporcionar para Asesoría</h3>
                <p>Para brindarte la mejor recomendación, ten a mano la siguiente información:</p>
                <div class="measurement-item">
                    <h4>Medidas del Niño o Niña</h4>
                    <p>Altura, pecho, cintura y cadera (según las instrucciones de esta guía).</p>
                </div>
                <div class="measurement-item">
                    <h4>Edad y Peso</h4>
                    <p>Estos datos nos ayudan a tener un contexto completo.</p>
                </div>
                <div class="measurement-item">
                    <h4>Tipo de Prenda</h4>
                    <p>Menciona qué tipo de producto te interesa (vestido, pantalón, conjunto, etc.).</p>
                </div>
                <div class="measurement-item">
                    <h4>Preferencia de Ajuste</h4>
                    <p>Indícanos si prefieres un ajuste más holgado o más ceñido.</p>
                </div>
            </div>

            <div class="tip-box">
                <h4>Política de Cambio por Talla</h4>
                <p>Si la talla que elegiste no es la adecuada, no te preocupes. Ofrecemos cambio sin costo adicional durante los primeros 15 días después de recibir tu pedido. La prenda debe estar sin usar, con etiquetas originales y en su empaque. Consulta nuestra política completa de cambios y devoluciones para más detalles.</p>
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
        <a href="preguntas-frecuentes.html">Preguntas Frecuentes</a>
        <a href="contacto.html">Contacto</a>
    </div>
</footer>

<script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();

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