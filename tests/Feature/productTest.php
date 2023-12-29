<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class productTest extends TestCase
{
    /**
     * A basic feature test example.
     *      */
    public function test_view_product(): void
    {
        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
        $response = $this->get('/admin/product');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->get('/admin/product/create');
        $response->assertStatus(200);

        $response = $this->post('/admin/product', [
            'nama_product' => 'rambak oyi',
            'harga' => '9000',
            'deskripsi' => 'ini desk',
            'link_shopee' => 'ini link',
            'stok' => '3',
            'spesifikasi_product' => 'ini spek',
            'tersedia' => '1',
            'varian' => ['ini varian 1', 'Varian2'],
            'image' => [
                UploadedFile::fake()->image('image1.jpg'),
                UploadedFile::fake()->image('image2.jpg'),
            ],
        ]);

        $response->assertRedirect(route('products.index'));
    }

    public function test_edit_product()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->patch('/admin/product/1',[
            'nama_product' => 'product ter edit',
            'harga' => '9000',
            'deskripsi' => 'ini desk',
            'link_shopee' => 'ini link',
            'stok' => '38',
            'spesifikasi_product' => 'ini spek',
            'tersedia' => '1',
            'varian' => ['ini varian 1', 'Varian2'],
            'image' => [
                UploadedFile::fake()->image('image1.jpg'),
                UploadedFile::fake()->image('image2.jpg'),
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));

    }
    public function test_detail_product()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->get('/admin/product/1');
        $response->assertStatus(200);

    }

    public function test_hapus_product()
    {

        $response = $this->post('/login', [
            'nama' => 'pawonkoe',
            'password' => 'pawonkoe',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');

        $response = $this->delete('/admin/product/1');
        $response->assertStatus(302);
        $response->assertRedirect('/admin/product');

    }
}

