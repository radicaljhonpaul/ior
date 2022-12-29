<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_url',
        'product_image',
        'sku',
        // 'product_material_composition',
        // 'product_barcode',
        // 'product_barcode_image',
        // 'product_barcode_type',
        'hs_code',
        'asin',
        // 'product_packaging_material_list',
        'status',
        'product_label',
        'product_label_type',
        'product_label_text',
        'certificate_country_of_origin_product',
        'country_of_origin',
        'company_id',
        'product_categories_id',
        'net_weight',
        // 'volume',
        // 'msrp',
        // 'is_product_heat_sensitive',
        // 'precautions',
        // 'how_to_use',
        // 'dimension_of_product_cm',
        // 'dimension_of_product_packaging_cm',
        'product_packaging_image'
    ];
}
