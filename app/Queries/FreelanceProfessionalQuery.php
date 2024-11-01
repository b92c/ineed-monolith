<?php

declare(strict_types=1);

namespace App\Queries;

use Illuminate\Database\Capsule\Manager as Capsule;

class FreelanceProfessionalQuery
{
    public function getByProfessionAndCity(string $professionalType, int $city)
    {
        $query = Capsule::table('freelance_professionals')
        ->where('city', '=', $city);
        if (!empty($professionalType)) {
            $query->where('profession', 'like', '%' . $professionalType . '%');
        }
        return $query->paginate(10);

    }

    public function getCityId(string $cityType): int
    {
        return Capsule::table('city')->where('name', 'like', '%' . $cityType . '%')->first()->id;
    }
}
