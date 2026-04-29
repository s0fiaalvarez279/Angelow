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
    
    // Documentos legales y de soporte
    ['method' => 'GET', 'path' => '/documentos/Pedidos_envios', 'controller' => 'DocumentoController', 'action' => 'pedidosEnvios'],
    ['method' => 'GET', 'path' => '/documentos/Politicas_devolucion', 'controller' => 'DocumentoController', 'action' => 'politicasDevolucion'],
    ['method' => 'GET', 'path' => '/documentos/Preguntas', 'controller' => 'DocumentoController', 'action' => 'preguntas'],
    ['method' => 'GET', 'path' => '/documentos/Guia_Tallas', 'controller' => 'DocumentoController', 'action' => 'guiaTallas'],
    ['method' => 'GET', 'path' => '/documentos/Terminos', 'controller' => 'DocumentoController', 'action' => 'terminos'],
    ['method' => 'GET', 'path' => '/documentos/Politicas_Priv', 'controller' => 'DocumentoController', 'action' => 'politicasPrivacidad'],  
    ['method' => 'GET', 'path' => '/documentos/Politicas_Env', 'controller' => 'DocumentoController', 'action' => 'politicasEnv'],
    
        // ==============================================
    // NUEVAS RUTAS PARA CAMBIO DE CONTRASEÑA
    // ==============================================
    ['method' => 'GET', 'path' => '/auth/change-password', 'controller' => 'AuthController', 'action' => 'showChangePassword'],
    ['method' => 'POST', 'path' => '/auth/change-password', 'controller' => 'AuthController', 'action' => 'changePassword'],
    ['method' => 'GET', 'path' => '/auth/reset-password', 'controller' => 'AuthController', 'action' => 'showResetForm'],
    ['method' => 'POST', 'path' => '/auth/reset-password', 'controller' => 'AuthController', 'action' => 'resetPassword'],  
];