<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JokeControllerTest extends TestCase
{
    /**
     * Check if jokes page loads successfully
     */
    public function test_jokes_page_loads_successfully(): void
    {
        // Create user
        $user = \App\Models\User::factory()->create();

        // Simulate logging in
        $this->actingAs($user);
    
        // Hit the route that requires auth
        $response = $this->get('/');
    
        // Assert OK status 
        $response->assertStatus(200);

        // check if the right view is being returned
        $response->assertViewIs('jokes.index');
    }

    public function test_fetch_random_jokes_returns_three_jokes()
    {
        // Get auth token
        $token = config('services.api_token');

        // Send the Authorization: Bearer <token> header
        $response = $this->getJson('/api/get-jokes', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Assert OK status and check how many jokes are returned
        $response
        ->assertStatus(200)
        ->assertJsonCount(3);
    }
}
