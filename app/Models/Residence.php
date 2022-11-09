<?php

namespace App\Models;

use App\Models\Inconnu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Residence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inconnu(){

        return $this->belongsTo(Inconnu::class);
    }
}
