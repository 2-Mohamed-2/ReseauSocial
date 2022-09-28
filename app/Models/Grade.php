<?php

namespace App\Models;

use App\Models\Membre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
