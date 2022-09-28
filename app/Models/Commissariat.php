<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commissariat extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function sections() 
    {
        return $this->hasMany(Section::class);
    }


}
