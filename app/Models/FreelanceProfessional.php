<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceProfessional extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "vip",
        "profession",
        "service_price",
        "charges_by",
        "phone",
        "email",
        "cpf",
        "street",
        "number",
        "neighborhood",
        "zip_code",
        "city",
        "state",
        "country",
    ];
}
