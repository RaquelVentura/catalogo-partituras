<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';
    protected $primaryKey = 'idaudio';

    protected $fillable = [
        'url'
    ];
}
