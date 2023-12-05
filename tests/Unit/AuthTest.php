<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class AuthTest extends BaseTestCase
{
    use CreatesApplication;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_API_login_successful()
    {
        $response = $this->post('/api/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                    "success" => true,
            ]);
    }
    public function test_API_login_has_token()
    {
        $response = $this->post('/api/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(200)
        ->assertJsonStructure([
            "data" => [
                "token",
            ],
        ]);

        // Optionally, you can also check that the token is not null
        $responseData = $response->json();
        $this->assertNotNull($responseData['data']['token']);
    }
    public function test_API_logout_success()
    {
        // Assuming you have a User model and the Sanctum authentication is set up
        $responseLogin = $this->post('/api/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);
        
        $tokenJson = $responseLogin->json();
        // dd($tokenJson);
        $token = $tokenJson['data']['token'];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token, // Tambahkan header Authorization
        ])->get('/api/logout');

        $response->assertStatus(200);
    }
}
