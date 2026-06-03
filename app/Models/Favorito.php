<?php
namespace App\Models;

use App\Core\Model;

class Favorito extends Model
{
    protected $table = 'favoritos';

    /**
     * Obtiene los IDs de productos favoritos de un usuario
     */
    public function getByUsuario($usuarioId)
    {
        $sql = "SELECT producto_id FROM {$this->table} WHERE usuario_id = :usuario_id ORDER BY fecha_agregado DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':usuario_id' => $usuarioId]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_column($rows, 'producto_id');
    }

    /**
     * Verifica si un producto ya está en favoritos
     */
    public function existe($usuarioId, $productoId)
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':usuario_id' => $usuarioId, ':producto_id' => $productoId]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Agrega un favorito
     */
    public function agregar($usuarioId, $productoId)
    {
        $sql = "INSERT INTO {$this->table} (usuario_id, producto_id, fecha_agregado) VALUES (:usuario_id, :producto_id, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':usuario_id' => $usuarioId, ':producto_id' => $productoId]);
    }

    /**
     * Elimina un favorito
     */
    public function eliminar($usuarioId, $productoId)
    {
        $sql = "DELETE FROM {$this->table} WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':usuario_id' => $usuarioId, ':producto_id' => $productoId]);
    }
}