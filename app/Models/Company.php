<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'legal_company_name',
        'brand_name',
        'legal_company_address',
        'city',
        'zip',
        'business_license',
        'country'
    ];

    public function products(){
        return $this->hasMany(ProductRegistration::class, 'company_id', 'id');
    }

    public function contacts(){
        return $this->hasMany(User::class, 'company_id', 'id');
    }
}
