<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRegistrationComments extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_registration_id',
        'user_id',
        'comments',
        'name'
    ];
}
