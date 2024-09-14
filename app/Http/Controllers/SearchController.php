<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FreelanceProfessionalService;

class SearchController extends Controller
{
    protected $professionalService;

    public function __construct(FreelanceProfessionalService $professionalService)
    {
        $this->professionalService = $professionalService;
    }

    public function search(Request $request): mixed
    {
        return view('search', ['professionals' => $this->professionalService->search($request)]);
    }
}
