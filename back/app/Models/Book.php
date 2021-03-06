<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
       'titile',
       'description'
    ];

    protected $hidden =[
       'created_at',
       'update_at'
    ];
}
