<?php

namespace Tests\Unit;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;

class DashboardTest extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_Api_dashboard_succes_get_data():void
    {
        // buat user
        $user = UserFactory::new()->create();
        // login user
        $loginResponse = $this->post('/api/login', [
            'username' => $user->nama,
            'password' => 'admin', // Sesuaikan dengan kata sandi default yang digunakan dalam factory Anda
        ]);
        // rubah response to json
        $tokenJson = $loginResponse->json();
        // ambil token
        // dd($tokenJson);
        $token = $tokenJson['data']['token'];
        // dd($token);
         $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/dashboard');
        $response->assertStatus(200)
        ->assertJson(
            [
                'success'=>true,
            ]
        );
    }
}
