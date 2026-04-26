<?php
session_start();

// Cargar configuraciones
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';

// Autoload simple (sin Composer aún)
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

// Cargar helpers
foreach (glob(__DIR__ . '/../app/Helpers/*.php') as $helperFile) {
    require_once $helperFile;
}

// Enrutador
require_once __DIR__ . '/../config/routes.php';
$router = new App\Core\Router();
require_once __DIR__ . '/../app/Core/Router.php'; // ya lo incluye el autoload? mejor así:
// En realidad, como usamos autoload, no hace falta. Pero Router debe existir.

// Mejor usar el Router de la carpeta Core
$router = new App\Core\Router();

// Cargar rutas desde config/routes.php
$routes = require __DIR__ . '/../config/routes.php';
foreach ($routes as $route) {
    $router->add($route['method'], $route['path'], $route['controller'], $route['action']);
}

// Ejecutar
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);