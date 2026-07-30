<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Watch extends Model
{
    use SoftDeletes;
protected $fillable = ['model', 'brand', 'price', 'stock', 'description', 'image'];
}