<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
        'image',
        'branch_id'
    ];

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function image () {
        return $this->hasMany(Image::class);
    }

    public function branch () {
        return $this->belongsTo(Branch::class);
    }
}
