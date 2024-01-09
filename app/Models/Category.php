<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia ;
    protected $fillable = [
        'name',
        'image',
        'ar_name'
    ];

protected $casts = [
        'name' => 'json'
    ];
    public $translatable = ['name'];
}
