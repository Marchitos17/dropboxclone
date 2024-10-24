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
        'foto3',
        'foto4',
        'foto5',
        'foto6',
        'foto7',
        'foto8',
        'foto9',
        'foto10',
        'numero_ordine',
        'fotografo',
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }
}
