<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function section()
    {
        return $this->belongsToToMany(Section::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'membre_roles')->withTimestamps();
    // }

    public function sessions()
    {
        return $this->hasMany(Session::class);        
    }
}
