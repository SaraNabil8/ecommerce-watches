<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Watch extends Model
{
    use SoftDeletes;
protected $fillable = ['model', 'brand', 'price', 'stock', 'description', 'image','category_id'];
public function category(): BelongsTo{
    return $this->belongsTo(Category::class);
}
}