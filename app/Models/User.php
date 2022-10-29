<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Session;
use App\Models\Commissariat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commissariat()
    {
        return $this->belongsToToMany(Commissariat::class);
    }

    public function section()
    {
        return $this->belongsToToMany(Section::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users')->withTimestamps();
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);        
    }

}
