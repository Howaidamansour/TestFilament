<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Branch extends Model
{
    use HasFactory; 
    protected $fillable = [
        'name',
        'city_id',
       'adddress'
    ];


    protected $cast = [
        'adddress' => 'json'
    ];

    public function city () {
        return $this->belongsTo(City::class);
    }

    public function product () {
        return $this->hasMany(ProductBranches::class);
    }
}
