<?php

namespace App\Queries;

use App\Models\FreelanceProfessional;
use Illuminate\Database\Capsule\Manager as Capsule;

class FreelanceProfessionalQuery
{
    public function getByProfessionAndCity(string $professionalType, int $city)
    {
        return Capsule::table('freelance_professionals')
        ->where('profession', 'like', '%' . $professionalType . '%')
        ->where('city', '=', $city)
        ->paginate(10);
    }

    public function getCityId(string $cityType): int
    {
        return Capsule::table('city')->where('name', 'like', '%' . $cityType . '%')->first()->id;
    }
}
