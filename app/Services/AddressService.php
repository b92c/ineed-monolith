<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;
use App\Queries\AddressQuery;

class AddressService
{
    /** @var AddressQuery $addressQuery */
    protected $addressQuery;

    public function __construct(AddressQuery $addressQuery)
    {
        $this->addressQuery = $addressQuery;
    }

    public function getCityAndStateId(Request $request): array
    {
        return $this->addressQuery->getCityAndStateId($request->city, $request->state);
        
    }
}
