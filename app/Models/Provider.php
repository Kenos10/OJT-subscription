<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['pname', 'pnum'];

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class, 'pid');
    }    
}

