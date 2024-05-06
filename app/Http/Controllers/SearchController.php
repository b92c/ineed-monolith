<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreelanceProfessional;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Lógica de busca no banco de dados com paginação
        $professionals = FreelanceProfessional::where('name', 'like', '%' . $query . '%')
            ->orWhere('profession', 'like', '%' . $query . '%')
            ->paginate(10);

        return view('search', ['professionals' => $professionals]);
    }
}
