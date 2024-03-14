<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telefone',
        'email',
        'mensagem',
        'motivo_contato_id'
    ];
}
