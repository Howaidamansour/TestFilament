<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBranches extends Model
{
    use HasFactory;
    protected $fillable =[
        'branch_id',
        'product_id'
    ];
}
