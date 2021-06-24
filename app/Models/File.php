<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    
    protected $fillable = [
        'name', 
        'original_name',
        'url',
        'user_id',
        'description',
    ];

    use HasFactory;
    
    public function fileable()
    {
        return $this->morphTo();
    }
}
