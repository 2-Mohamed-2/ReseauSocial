<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function commissariat()
    {
        return $this->belongsTo(Commissariat::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
