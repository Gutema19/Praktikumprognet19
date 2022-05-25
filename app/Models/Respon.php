<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    use HasFactory;

    
    protected $guarded = [];    

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
