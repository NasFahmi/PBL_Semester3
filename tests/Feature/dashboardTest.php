<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class dashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_dashboard_admin(): void
    {

        $response = $this->post('/login', [
            'nama' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $redirectedResponse = $this->get('/admin/dashboard');

        $redirectedResponse->assertViewIs('pages.admin.dashboard');
        dump($redirectedResponse->original->getData());

        $redirectedResponse->assertViewHas('data', function ($data) {
            return isset($data['nama_product']) && $data['nama_product'] === 'rambak oyi' && $data['stok'] === '3';
        });

        // $response->assertSeeText('Dash');
    }
    
}
