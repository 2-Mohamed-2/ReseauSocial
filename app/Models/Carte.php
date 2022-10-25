<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'cartes';

    // public function Inconnus()
    // {
    //     return $this->hasMany(Inconnu::class);
    // }
  
}
