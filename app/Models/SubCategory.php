<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $fillable = ['category_id', 'name'];
    public $timestamps = false;

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function products(): hasMany
    {
        return $this->hasMany(Product::class);
    }

    public function image(): morphMany
    {
        return $this->morphMany(Image::class, 'image');
    }
}
