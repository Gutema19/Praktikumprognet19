<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticableTrait;


    protected $table = 'admins';
    protected $guard = 'admin';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function notifications(){
        return $this->morphMany(AdminNotification::class, 'notifiable' )->orderBy('created_at', 'desc');
    }
}