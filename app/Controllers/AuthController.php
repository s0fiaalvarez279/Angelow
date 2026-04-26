<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\UsuarioModel;

class AuthController extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    // Mostrar formulario de login/registro
    public function showLogin() {
        if (isset($_SESSION['user'])) {
            $this->redirect('/');
        }
        $this->view('auth.login');
    }

    // Procesar login con email
    public function login() {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $remember = $data['remember'] ?? false;

        if (!$email || !$password) {
            $this->json(['success' => false, 'message' => 'Completa todos los campos']);
        }

        $user = $this->usuarioModel->findByEmail($email);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            $this->json(['success' => false, 'message' => 'Credenciales incorrectas']);
        }

        // Guardar en sesión
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'nombre' => $user['nombre'],
            'rol' => $user['rol'] ?? 'cliente'   // Asegurar que exista la columna 'rol'
        ];

        // Redirección según el rol
        $redirectUrl = ($_SESSION['user']['rol'] === 'administrador') ? '/admin' : APP_URL . '/';

        $this->json([
            'success' => true,
            'message' => 'Login exitoso',
            'redirect' => $redirectUrl,
            'rol' => $_SESSION['user']['rol']
        ]);
    }

    // Procesar registro con email
    public function register() {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? '';
        $nombre = $data['nombre'] ?? '';
        $password = $data['password'] ?? '';
        $terms = $data['terms'] ?? false;

        if (!$email || !$nombre || !$password || !$terms) {
            $this->json(['success' => false, 'message' => 'Completa todos los campos y acepta términos']);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->json(['success' => false, 'message' => 'Email inválido']);
        }
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
            $this->json(['success' => false, 'message' => 'La contraseña no cumple los requisitos']);
        }
        if ($this->usuarioModel->findByEmail($email)) {
            $this->json(['success' => false, 'message' => 'El email ya está registrado']);
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->usuarioModel->create([
            'email' => $email,
            'nombre' => $nombre,
            'password_hash' => $passwordHash,
            'google_id' => null,
            'rol' => 'cliente'   // Por defecto, cliente
        ]);

        if ($result) {
            $user = $this->usuarioModel->findByEmail($email);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'nombre' => $user['nombre'],
                'rol' => 'cliente'
            ];
            $this->json([
                'success' => true,
                'message' => 'Registro exitoso',
                'redirect' => APP_URL . '/'
            ]);
        } else {
            $this->json(['success' => false, 'message' => 'Error al registrar. Intenta de nuevo']);
        }
    }

    // Procesar login con Google
    public function googleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_data'])) {
            $userData = json_decode($_POST['user_data'], true);
            $email = $userData['email'];
            $nombre = $userData['name'];
            $googleId = $userData['sub'];

            $user = $this->usuarioModel->findByEmail($email);
            if (!$user) {
                $this->usuarioModel->create([
                    'email' => $email,
                    'nombre' => $nombre,
                    'password_hash' => null,
                    'google_id' => $googleId,
                    'rol' => 'cliente'
                ]);
                $user = $this->usuarioModel->findByEmail($email);
            } elseif (!$user['google_id']) {
                $this->usuarioModel->updateGoogleId($email, $googleId);
            }

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'nombre' => $user['nombre'],
                'rol' => $user['rol'] ?? 'cliente'
            ];

            // Redirección según rol
        $redirectUrl = ($_SESSION['user']['rol'] === 'administrador') ? APP_URL . '/admin' : APP_URL . '/';            $this->redirect($redirectUrl);
        } else {
            $this->redirect('/auth/login');
        }
    }

    // Solicitar restablecimiento de contraseña
    public function forgotPassword() {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? '';
        if (!$email) {
            $this->json(['success' => false, 'message' => 'Email requerido']);
        }
        $user = $this->usuarioModel->findByEmail($email);
        if (!$user) {
            $this->json(['success' => false, 'message' => 'No existe cuenta con ese email']);
        }

        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $this->usuarioModel->setResetToken($email, $token, $expires);
        $resetLink = APP_URL . "/auth/reset-password?token=$token";
        // Aquí enviar email real (simulado)
        $this->json(['success' => true, 'message' => "Revisa tu correo (simulado). Enlace: $resetLink"]);
    }

    // Mostrar formulario de reset
    public function showResetForm() {
        $token = $_GET['token'] ?? '';
        $user = $this->usuarioModel->findByResetToken($token);
        if (!$user) {
            echo "Token inválido o expirado";
            exit;
        }
        $this->view('auth.reset-password', ['token' => $token]);
    }

    // Procesar nuevo password
    public function resetPassword() {
        $data = json_decode(file_get_contents('php://input'), true);
        $token = $data['token'] ?? '';
        $password = $data['password'] ?? '';
        $user = $this->usuarioModel->findByResetToken($token);
        if (!$user) {
            $this->json(['success' => false, 'message' => 'Token inválido']);
        }
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->usuarioModel->updatePassword($user['email'], $passwordHash);
        $this->usuarioModel->clearResetToken($user['email']);
        $this->json(['success' => true, 'message' => 'Contraseña actualizada']);
    }

    // Cerrar sesión
    public function logout() {
        $_SESSION = [];
        session_destroy();
        $this->redirect('/auth/login');
    }
}