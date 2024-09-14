<?php

namespace App\Queries;

use App\Models\FreelanceProfessional;
use Illuminate\Database\Capsule\Manager as Capsule;

class FreelanceProfessionalQuery
{
    public function getByProfessionAndCity(string $professionalType, string $city)
    {
        return Capsule::table('freelance_professionals')
        ->where('profession', 'like', '%' . $professionalType . '%')
        ->where('city', '=', 1)
        ->paginate(10);
    }
}
