<?php
return [
    ['method' => 'GET', 'path' => '/', 'controller' => 'HomeController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/auth/login', 'controller' => 'AuthController', 'action' => 'showLogin'],
    ['method' => 'POST', 'path' => '/auth/login', 'controller' => 'AuthController', 'action' => 'login'],
    ['method' => 'POST', 'path' => '/auth/register', 'controller' => 'AuthController', 'action' => 'register'],
    ['method' => 'POST', 'path' => '/auth/forgot-password', 'controller' => 'AuthController', 'action' => 'forgotPassword'],
    ['method' => 'POST', 'path' => '/auth/google', 'controller' => 'AuthController', 'action' => 'googleLogin'],
    ['method' => 'GET', 'path' => '/auth/logout', 'controller' => 'AuthController', 'action' => 'logout'],
    ['method' => 'GET', 'path' => '/perfil', 'controller' => 'PerfilController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/compra', 'controller' => 'CompraController', 'action' => 'index'],
    ['method' => 'POST', 'path' => '/procesar-compra', 'controller' => 'CompraController', 'action' => 'procesar'],
    ['method' => 'GET', 'path' => '/factura', 'controller' => 'FacturaController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/seguimiento', 'controller' => 'SeguimientoController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/debug-session', 'controller' => 'DebugController', 'action' => 'session'],
    // Panel de administración
    ['method' => 'GET', 'path' => '/admin', 'controller' => 'Admin\\DashboardController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/admin/pedidos', 'controller' => 'Admin\\PedidosController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/admin/usuarios', 'controller' => 'Admin\\UsuariosController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/admin/repartidores', 'controller' => 'Admin\\RepartidorController', 'action' => 'index'],
    ['method' => 'GET', 'path' => '/perfil', 'controller' => 'PerfilController', 'action' => 'index'],

    // Clientes (admin)
['method' => 'GET', 'path' => '/admin/clientes', 'controller' => 'Admin\\ClientesController', 'action' => 'index'],
['method' => 'POST', 'path' => '/admin/clientes/actualizar-rol', 'controller' => 'Admin\\ClientesController', 'action' => 'updateRole'],

    // Agregar rutas POST para acciones de gestión...
];

