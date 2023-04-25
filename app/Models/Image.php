<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = ['id', 'type','type_id', 'url'];
    public $timestamps = false;

    public function image(): morphTo
    {
        return $this->morphTo();
    }
}
