<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class preorderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_preorder_page(): void
    {
        $response = $this->post('/login', [
            'nama' => 'admin',
            'password' => 'admin',
        ]);

        $response = $this->get(route('preorders.index'));

        $response->assertStatus(200);
    }

    public function test_create_preorder(): void
    {
        $response = $this->post('/login', [
            'nama' => 'admin',
            'password' => 'admin',
        ]);

        $response = $this->get(route('preorders.index'));
        $response = $this->post('/admin/preorder', [
            'tanggal' => '2023-12-30',
            'jumlah' => '3',
            'total' => '30000',
            'nama' => 'fahmi',
            'email' => '75fahmi@gmail.com',
            'alamat' => 'setail',
            'telepon' => '081234123412',
            'tanggal_dp' => '2023-12-26',
            'jumlah_dp' => '15000'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('preorders.index'));
    }

    public function test_edit_preorder(): void
    {
        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response = $this->get(route('preorders.index'));
        $response = $this->patch('/admin/preorder/1', [
            'is_complete' => '1'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('preorders.index'));
    }
    public function test_view_detail_preorder()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->get('/admin/preorder/1');

        $response->assertStatus(200);

    }
}
