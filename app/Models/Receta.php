<?php

namespace App\Models;

class Receta
{
    public $id;
    public $nombre;
    public $ingredientes;
    public $instrucciones;
    public $tiempo_preparacion;
    public $dificultad;
    public $categoria;
    public $created_at;
    public $updated_at;
    
    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->nombre = $data['nombre'] ?? '';
        $this->ingredientes = $data['ingredientes'] ?? [];
        $this->instrucciones = $data['instrucciones'] ?? '';
        $this->tiempo_preparacion = $data['tiempo_preparacion'] ?? '';
        $this->dificultad = $data['dificultad'] ?? 'Fácil';
        $this->categoria = $data['categoria'] ?? 'Plato Principal';
        $this->created_at = $data['created_at'] ?? now();
        $this->updated_at = $data['updated_at'] ?? now();
    }
    
    public function toArray()
    {
        return [
            'nombre' => $this->nombre,
            'ingredientes' => $this->ingredientes,
            'instrucciones' => $this->instrucciones,
            'tiempo_preparacion' => $this->tiempo_preparacion,
            'dificultad' => $this->dificultad,
            'categoria' => $this->categoria,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}