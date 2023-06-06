<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = ['id'];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'username',
        'password',
        'role',
        'genere',
        'telefono',
        'data_nascita',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

    public function getUtente()
    {
        return User::where('role', 'user')->get();
    }

    public function getStaff()
    {
        return User::where('role', 'staff')->get();
    }

    public function getCurrentUser(){
        $user = Auth::user();
        return $user;
    }
}
