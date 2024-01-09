<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class Branch extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia ;
    protected $fillable = [
        'name',
        'city_id',
       'adddress',
     
    ];


    protected $casts = [
        'adddress' => 'json',
        'name' => 'json'
    ];
    public $translatable = ['name'];

    public function city () {
        return $this->belongsTo(City::class);
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'product_branches')->withTimestamps();
    }
}
