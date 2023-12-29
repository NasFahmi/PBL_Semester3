<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class loginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_login_page()
    {

        $response = $this->get('/login');

        $response->assertStatus(200);

    }
    public function test_login_as_superadmin()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs(User::where('nama', 'pawonkoe')->first());

    }
    public function test_login_as_admin()
    {

        $response = $this->post('/login', [
            'nama' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs(User::where('nama', 'admin')->first());
    }
    public function test_login_fail()
    {

        $response = $this->post('/login', [
            'nama' => 'fahmi',
            'password' => 'genteng',
        ]);
        $response->assertStatus(302);
        
    }

    public function test_logout()
    {
        // Log in as admin
        $response = $this->post('/login', [
            'nama' => 'admin',
            'password' => 'admin',
        ]);
        $response->assertStatus(302);

        // Logout
        $response = $this->get(route('logout'));
        $this->assertGuest();

        // Check that the user is redirected to the login page after logout
        $response->assertRedirect('/login');
    }

}

