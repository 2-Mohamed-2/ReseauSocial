<?php

namespace App\Models;

use App\Models\Residence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inconnu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function residences()
    {
        return $this->hasMany(Residence::class);
    }
}
