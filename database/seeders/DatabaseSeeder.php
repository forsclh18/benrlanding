<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ========== 1. USERS ==========
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@rzfsoftware.com',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin RZF',
                'email' => 'admin@rzfsoftware.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@rzfsoftware.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 2. SERVICES ==========
        DB::table('services')->insert([
            [
                'name' => 'Aplikasi Kasir & Keuangan',
                'description' => 'Solusi POS dan manajemen keuangan untuk UMKM dengan fitur planogram dan maxdisplay yang memudahkan pengelolaan stok dan transaksi.',
                'icon' => 'fa-credit-card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Custom Aplikasi',
                'description' => 'Pembuatan aplikasi sesuai kebutuhan spesifik bisnis Anda. Mulai dari sistem inventory, HRD, hingga manajemen pelanggan.',
                'icon' => 'fa-code',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konsultasi IT',
                'description' => 'Pendampingan pengembangan sistem dari awal hingga launch. Kami membantu merencanakan dan mengimplementasikan solusi IT terbaik.',
                'icon' => 'fa-headset',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 3. PORTFOLIOS ==========
        DB::table('portfolios')->insert([
            [
                'title' => 'Aplikasi Kasir Pro',
                'category' => 'Aplikasi Kasir',
                'description' => 'Aplikasi kasir modern untuk minimarket dan retail dengan fitur scan barcode, laporan real-time, dan manajemen stok.',
                'image' => 'portfolios/kasir-pro.jpg',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'RZF Minimarket',
                'category' => 'Aplikasi Kasir',
                'description' => 'Sistem POS khusus minimarket dengan fitur member, diskon otomatis, dan laporan laba rugi.',
                'image' => null,
                'image_url' => 'https://picsum.photos/400/300?random=1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Financial Manager',
                'category' => 'Aplikasi Keuangan',
                'description' => 'Aplikasi manajemen keuangan untuk UKM yang mencatat pemasukan, pengeluaran, dan menghasilkan laporan keuangan otomatis.',
                'image' => null,
                'image_url' => 'https://picsum.photos/400/300?random=2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laundry Management System',
                'category' => 'Custom Aplikasi',
                'description' => 'Sistem manajemen laundry dengan fitur tracking pesanan, manajemen pelanggan, dan laporan harian.',
                'image' => null,
                'image_url' => 'https://picsum.photos/400/300?random=3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 4. TEAMS ==========
        DB::table('teams')->insert([
            [
                'name' => 'Rizki Firmansyah',
                'position' => 'CEO & Founder',
                'image' => null,
                'image_url' => 'https://randomuser.me/api/portraits/men/1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zahra Fitriani',
                'position' => 'Lead Developer',
                'image' => null,
                'image_url' => 'https://randomuser.me/api/portraits/women/1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmad Faizal',
                'position' => 'UI/UX Designer',
                'image' => null,
                'image_url' => 'https://randomuser.me/api/portraits/men/2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Nurjanah',
                'position' => 'Project Manager',
                'image' => null,
                'image_url' => 'https://randomuser.me/api/portraits/women/2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 5. MESSAGES (contoh) ==========
        DB::table('messages')->insert([
            [
                'name' => 'Customer Test',
                'email' => 'customer@example.com',
                'phone' => '08123456789',
                'message' => 'Saya tertarik dengan layanan aplikasi kasir. Mohon informasi lebih lanjut.',
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 6. TESTIMONIALS ==========
        DB::table('testimonials')->insert([
            [
                'client_name' => 'Ahmad Rizal',
                'client_position' => 'Owner - Toko Berkah Jaya',
                'client_photo' => 'https://randomuser.me/api/portraits/men/10.jpg',
                'message' => 'Aplikasi kasir dari RZF Software sangat membantu usaha saya. Stok barang jadi lebih teratur, laporan penjualan real-time, dan transaksi jadi lebih cepat.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Siti Nurhaliza',
                'client_position' => 'Owner - Laundry Cepat Bersih',
                'client_photo' => 'https://randomuser.me/api/portraits/women/10.jpg',
                'message' => 'Sistem laundry dari RZF Software sangat profesional. Fitur manajemen pelanggan dan laporan keuangan memudahkan saya mengelola bisnis.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Budi Santoso',
                'client_position' => 'Owner - Resto Padang Raya',
                'client_photo' => 'https://randomuser.me/api/portraits/men/11.jpg',
                'message' => 'Resto POS dari RZF Software sangat membantu mengelola pesanan pelanggan. Laporan penjualan per menu memudahkan saya mengetahui menu terlaris.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 7. PROFILES ==========
        DB::table('profiles')->insert([
            [
                'company_name' => 'RZF Software',
                'tagline' => 'Professional Application Developer',
                'description' => 'RZF Software adalah perusahaan yang bergerak di bidang pengembangan aplikasi profesional, dengan spesialisasi pada aplikasi kasir & keuangan serta pembuatan custom aplikasi sesuai kebutuhan bisnis klien. Berlokasi di Kuningan, Jawa Barat, kami melayani klien dari berbagai skala bisnis di seluruh Indonesia.',
                'vision' => 'Menjadi penyedia solusi software terdepan di Indonesia yang inovatif, terpercaya, dan memberikan dampak positif bagi perkembangan bisnis klien.',
                'mission' => "1. Mengembangkan aplikasi berkualitas tinggi dengan teknologi terkini\n2. Memberikan solusi tepat guna untuk efisiensi bisnis klien\n3. Membangun kemitraan jangka panjang dengan customer service terbaik\n4. Terus berinovasi mengikuti perkembangan teknologi",
                'address' => 'Jl. Raya Darma Dusun Gunungluhur Desa, Waduk Darma, Kec. Darma, Kab. Kuningan, Jawa Barat 45562',
                'phone' => '(0232) 123456',
                'email' => 'info@rzfsoftware.com',
                'cta_heading' => 'Butuh Aplikasi untuk Bisnis Anda?',
                'cta_btn_text' => 'Hubungi Kami',
                'logo' => 'logo/rzf-logo.png',
                'favicon' => 'favicon.ico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 8. SLIDERS ==========
        DB::table('sliders')->insert([
            [
                'title' => 'Welcome to RZF Software',
                'subtitle' => 'Professional Application Developer',
                'text' => 'Solusi Aplikasi Kasir & Keuangan Terpercaya',
                'btn_link' => '#contact',
                'image' => 'https://picsum.photos/1920/600?random=10',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Custom Aplikasi',
                'subtitle' => 'We Build Quality Software',
                'text' => 'Sesuai Kebutuhan Bisnis Anda',
                'btn_link' => '#product',
                'image' => 'https://picsum.photos/1920/600?random=11',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trusted by 50+ Businesses',
                'subtitle' => 'Solusi IT untuk UMKM',
                'text' => 'Dari Kuningan untuk Indonesia',
                'btn_link' => '#contact',
                'image' => 'https://picsum.photos/1920/600?random=12',
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 9. BUSINESS IMAGES ==========
        DB::table('business_images')->insert([
            [
                'image' => null,
                'image_url' => 'https://picsum.photos/800/600?random=20',
                'alt_text' => 'Office RZF Software',
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => null,
                'image_url' => 'https://picsum.photos/800/600?random=21',
                'alt_text' => 'Tim Developer RZF',
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => null,
                'image_url' => 'https://picsum.photos/800/600?random=22',
                'alt_text' => 'Aplikasi Kasir RZF',
                'position' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ========== 10. BUSINESS CONTENTS ==========
        DB::table('business_contents')->insert([
            [
                'heading' => 'Solusi IT Untuk Bisnis Anda',
                'description' => 'RZF Software adalah perusahaan yang bergerak di bidang pengembangan aplikasi profesional, dengan spesialisasi pada aplikasi kasir & keuangan serta pembuatan custom aplikasi sesuai kebutuhan bisnis klien.',
                'btn_text' => 'Hubungi Kami',
                'btn_link' => '#contact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}