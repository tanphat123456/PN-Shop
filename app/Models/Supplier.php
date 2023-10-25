<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable= [
        "id",
        "name",
        "description",
        "email",
        "phone_number",
        "logo",
        "address",
        "status",
        "created_at",
        "updated_at",
];
}
