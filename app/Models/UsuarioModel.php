<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
    $sql = "INSERT INTO usuarios (email, nombre, password_hash, google_id, rol) 
            VALUES (:email, :nombre, :password_hash, :google_id, :rol)";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute($data);
}

    public function updatePassword($email, $passwordHash) {
        $stmt = $this->db->prepare("UPDATE usuarios SET password_hash = :pwd WHERE email = :email");
        return $stmt->execute(['pwd' => $passwordHash, 'email' => $email]);
    }

    public function setResetToken($email, $token, $expires) {
        $stmt = $this->db->prepare("UPDATE usuarios SET reset_token = :token, reset_expires = :expires WHERE email = :email");
        return $stmt->execute(['token' => $token, 'expires' => $expires, 'email' => $email]);
    }

    public function findByResetToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE reset_token = :token AND reset_expires > NOW()");
        $stmt->execute(['token' => $token]);
        return $stmt->fetch();
    }

    public function clearResetToken($email) {
        $stmt = $this->db->prepare("UPDATE usuarios SET reset_token = NULL, reset_expires = NULL WHERE email = :email");
        return $stmt->execute(['email' => $email]);
    }

    public function updateGoogleId($email, $googleId) {
        $stmt = $this->db->prepare("UPDATE usuarios SET google_id = :google_id WHERE email = :email");
        return $stmt->execute(['google_id' => $googleId, 'email' => $email]);
    }

    public function getAll() {
    $stmt = $this->db->query("SELECT id, nombre, email, telefono, rol, fecha_registro FROM usuarios ORDER BY id DESC");
    return $stmt->fetchAll();
}

public function updateRol($id, $rol) {
    $stmt = $this->db->prepare("UPDATE usuarios SET rol = :rol WHERE id = :id");
    return $stmt->execute(['rol' => $rol, 'id' => $id]);
}
}