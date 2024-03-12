<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//classe para inplementação de softdeletes
use Illuminate\Database\Eloquent\SoftDeletes;
class Fornecedor extends Model
{
    use HasFactory;
    // chamamos a classe softdeletes
    use SoftDeletes;
    
    protected $table = 'fornecedors';
    protected $fillable = ['name', 'site', 'uf', 'email'];






}
