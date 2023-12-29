<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class transaksiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_transaksi(): void
    {
        //login as superadmin
        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
        $response = $this->get('/admin/transaksi');

        $response = $this->post(route('transaksis.store'), [
            'tanggal' => '2023-12-20',
            'product_id' => '2',
            'methode_pembayaran_id' => '1',
            'jumlah'=> '4',
            'total_harga' => '40.000',
            'keterangan'=> '',
            'is_complete' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('transaksis.index'));
    }

    public function test_fail_create_transaksi(): void
    {
        //login as superadmin
        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
        $response = $this->get('/admin/transaksi');

        $response = $this->post('/admin/transaksi', [
            'tanggal' => '12/30/2023',
            'product_id' => '',
            'methode_pembayaran_id' => '',
            'jumlah' => '',
            'total_harga' => '40.000',
            'keterangan' => 'asdasd',
            'is_complete' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('transaksis.store'));
    }

    public function test_edit_transaksi()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->patch('/admin/transaksi/2', [
            'is_complete' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('transaksis.index'));

    }

    public function test_view_detail_transaksi()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->get('/admin/transaksi/1');

        $response->assertStatus(200);

    }
}
