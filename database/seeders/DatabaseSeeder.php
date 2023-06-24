<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Produk::create([
            'nama_produk' => 'Pupuk Organik Kaya Nutrisi',
            'berat_produk' => 5.0,
            'harga_produk' => 50000,
            'deskripsi_produk' => 'Pupuk organik dengan kandungan nutrisi lengkap untuk tanaman Anda.',
            'foto_produk' => '/img/produk/produk-1.jpg',
        ]);
            
        Produk::create([
        'nama_produk' => 'Pupuk NPK Mutiara',
        'berat_produk' => 2.5,
        'harga_produk' => 75000,
        'deskripsi_produk' => 'Pupuk dengan komposisi NPK seimbang untuk pertumbuhan optimal tanaman.',
        'foto_produk' => '/img/produk/produk-2.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Kandang Ayam',
        'berat_produk' => 10.0,
        'harga_produk' => 30000,
        'deskripsi_produk' => 'Pupuk organik dari kotoran ayam untuk meningkatkan kesuburan tanah.',
        'foto_produk' => '/img/produk/produk-3.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Daun Super',
        'berat_produk' => 1.0,
        'harga_produk' => 25000,
        'deskripsi_produk' => 'Pupuk cair berkualitas tinggi untuk menyuburkan daun dan merangsang pertumbuhan tanaman.',
        'foto_produk' => '/img/produk/produk-4.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Organik Cair',
        'berat_produk' => 3.0,
        'harga_produk' => 40000,
        'deskripsi_produk' => 'Pupuk cair yang terbuat dari bahan alami untuk memperkaya tanah dan merangsang pertumbuhan akar.',
        'foto_produk' => '/img/produk/produk-5.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Kandang Sapi',
        'berat_produk' => 15.0,
        'harga_produk' => 60000,
        'deskripsi_produk' => 'Pupuk organik yang dihasilkan dari kotoran sapi untuk meningkatkan kesuburan tanah.',
        'foto_produk' => '/img/produk/produk-6.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Mikroorganisme Efektif',
        'berat_produk' => 0.5,
        'harga_produk' => 80000,
        'deskripsi_produk' => 'Pupuk dengan kandungan mikroorganisme yang menguntungkan bagi pertumbuhan tanaman.',
        'foto_produk' => '/img/produk/produk-7.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Pelengkap Buah',
        'berat_produk' => 2.0,
        'harga_produk' => 35000,
        'deskripsi_produk' => 'Pupuk khusus untuk merangsang pembentukan dan pertumbuhan buah pada tanaman.',
        'foto_produk' => '/img/produk/produk-8.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Daun Kuning',
        'berat_produk' => 0.8,
        'harga_produk' => 20000,
        'deskripsi_produk' => 'Pupuk dengan kandungan zat besi untuk mencegah daun tanaman menguning.',
        'foto_produk' => '/img/produk/produk-9.jpg',
        ]);
        
        Produk::create([
        'nama_produk' => 'Pupuk Serbuk Kompos',
        'berat_produk' => 5.0,
        'harga_produk' => 45000,
        'deskripsi_produk' => 'Pupuk organik berupa serbuk kompos untuk meningkatkan kesuburan tanah.',
        'foto_produk' => '/img/produk/produk-10.jpg',
        ]);

        Pegawai::create([
            'nama_pegawai' => 'Manager',
            'notelp_pegawai' => '081234567890',
            'email_pegawai' => 'manager@gmail.com',
            'password_pegawai' => bcrypt('123'),
            'role' => 1,
        ]);

        Pegawai::create([
            'nama_pegawai' => 'Pegawai1',
            'notelp_pegawai' => '081234567890',
            'email_pegawai' => 'pegawai1@gmail.com',
            'password_pegawai' => bcrypt('123'),
            'role' => 2,
        ]);
    }
}
