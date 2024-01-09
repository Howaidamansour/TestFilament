<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
      
        'branch_id',
       
        'ar_name',
        'ar_description', 	
    ];

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function image () {
        return $this->hasMany(Image::class);
    }

    public function branches () {
        return $this->belongsToMany(Branch::class, 'product_branches')->withTimestamps();
    }
    public $translatable = ['name'];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'images' => 'array',
        'images_name' => 'array',

    ];
}
