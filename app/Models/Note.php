<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'text',
        'theme_id',
        'user_id',
        'is_active',
    ];

    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }
}
