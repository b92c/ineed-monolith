<?php

declare(strict_types=1);

namespace App\Queries;

use Illuminate\Database\Capsule\Manager as Capsule;

class AddressQuery
{
    public function getCityAndStateId(string $cityName, string $stateName): array
    {
        $city = Capsule::table('city')->where('name', 'like', '%' . $cityName . '%')->first();
        $state = Capsule::table('state')->where('name', 'like', '%' . $stateName . '%')->first();
        
        return ['city' => $city->id, 'state' => $state->id];
    }
}
