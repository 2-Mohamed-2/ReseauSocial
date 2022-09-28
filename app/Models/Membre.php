<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membre extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
