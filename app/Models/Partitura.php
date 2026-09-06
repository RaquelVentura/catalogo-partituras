<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partitura extends Model
{
    protected $table = 'partituras';
    protected $primaryKey = 'idpartitura';

    protected $fillable = [
        'titulo',
        'nombre',
        'categoria_id',
        'autor_id',
        'audio_id', 
        'documento_id',
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'idcategoria');
    }
    public function autor(){
        return $this->belongsTo(Autor::class, 'autor_id', 'idautor');
    }
    public function audio(){
        return $this->belongsTo(Audio::class, 'audio_id', 'idaudio');
    }
    public function documento(){
        return $this->belongsTo(Documento::class, 'documento_id', 'iddocumento');
    }
}
