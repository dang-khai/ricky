<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['id', 'category_id', 'subCategory_id', 'name', 'description', 'price'];
    public $timestamps = false;

    public function image(): morphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): belongsTo
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart');
    }

}
