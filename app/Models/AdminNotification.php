<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;
    protected $table = 'admin_notifications';
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        // 'read_at',
    ];

    protected $guarded =['read_at'];
}