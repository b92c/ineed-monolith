<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;
use App\Queries\FreelanceProfessionalQuery;

class FreelanceProfessionalService
{
    /** @var FreelanceProfessionalQuery $professionalQuery */
    protected $professionalQuery;

    public function __construct(FreelanceProfessionalQuery $professionalQuery)
    {
        $this->professionalQuery = $professionalQuery;
    }

    public function search(Request $request): mixed
    {
        $professionalType = $request->input('professional');
        $cityType = $request->input('city');

        if (empty($professionalType) || empty($cityType)) {
            return [];
        }

        $cityId = $this->professionalQuery->getCityId($cityType);
        
        if (empty($cityId)) {
            return [];
        }

        return $this->professionalQuery->getByProfessionAndCity($professionalType, $cityId);

    }
}
