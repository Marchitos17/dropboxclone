<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto1',
        'foto2',
        'numero_ordine',
        'fotografo',
    ];

}
