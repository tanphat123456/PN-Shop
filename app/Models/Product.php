<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= [
                "id",
                "supplier_id",
                "supplier_name",
                "product_name",
                "description",
                "quantity",
                "amount",
                "discount_amount",
                "discount_percent",
                "status",
                "size",
                "color",
                "image_urls",
                "created_at",
                "updated_at",
    ];
}
