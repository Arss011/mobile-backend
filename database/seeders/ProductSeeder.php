<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nama' => 'Produk A',
            'harga' => 100000,
            'stok' => 50,
        ]);

        Product::create([
            'nama' => 'Produk B',
            'harga' => 150000,
            'stok' => 30,
        ]);

        Product::create([
            'nama' => 'Produk C',
            'harga' => 200000,
            'stok' => 20,
        ]);

        Product::create([
            'nama' => 'Produk D',
            'harga' => 120000,
            'stok' => 40,
        ]);

        Product::create([
            'nama' => 'Produk E',
            'harga' => 180000,
            'stok' => 25,
        ]);
    }
}
