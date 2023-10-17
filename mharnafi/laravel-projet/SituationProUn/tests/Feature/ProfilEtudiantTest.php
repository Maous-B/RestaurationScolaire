<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfilEtudiantTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_accede_profil(): void
    {

        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/info');

        $response->assertStatus(200);
    }
}
