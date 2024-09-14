<?php

use App\Models\FreelanceProfessional;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    // Cria um profissional para testes
    FreelanceProfessional::factory()->create(['name' => 'John Doe', 'profession' => 'Developer']);
    FreelanceProfessional::factory()->create(['name' => 'Jane Smith', 'profession' => 'Designer']);
});

it('returns search results for the query', function () {
    $response = $this->get('/search?q=John');

    $response->assertSuccessful();
    $response->assertSee('John Doe');
    $response->assertDontSee('Jane Smith');
});

it('returns no results for a query that does not match', function () {
    $response = $this->get('/search?q=NotFound');

    $response->assertSuccessful();
    $response->assertSee('No results found');  // Supondo que você tenha essa mensagem no seu view
});
