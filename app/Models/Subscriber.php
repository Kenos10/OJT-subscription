<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'pid'];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'pid');
    }    
}