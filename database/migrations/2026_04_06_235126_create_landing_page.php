<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ========== TABEL UNTUK SESSION (WAJIB) ==========
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // 1. Tabel users (admin)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->enum('role', ['admin', 'super_admin', 'user',])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Tabel services 
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('icon', 100)->nullable();
            $table->timestamps();
        });

        // 3. Tabel portfolios
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('category', 100)->nullable();
            $table->text('description');
            $table->string('image', 255)->nullable();
            $table->string('image_url', 255)->nullable();
            $table->timestamps();
        });

        // 4. Tabel teams (TIM yang ada di web RZF Software)
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('image', 255)->nullable();
             $table->string('image_url', 255)->nullable();
            $table->timestamps();
        });

        // 5. Tabel messages (PESAN dari form kontak)
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 20)->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        // 6. Tabel testimonials 
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 100);
            $table->string('client_position', 100)->nullable();
            $table->string('client_photo', 255)->nullable();
            $table->text('message');
            $table->integer('rating')->default(5);
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100)->default('RZF Software');
            $table->string('tagline', 200)->nullable();
            $table->text('description')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cta_heading', 200)->nullable();
            $table->string('cta_btn_text', 50)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->timestamps();
        });


        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('subtitle', 200);
            $table->text('text')->nullable();
            $table->string('btn_link', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 9. Tabel business_images 
        Schema::create('business_images', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255)->nullable();
             $table->string('image_url')->nullable();
            $table->string('alt_text', 100)->nullable();
            $table->integer('position')->default(0);
            $table->timestamps();
        });

        // 10. Tabel business_contents 
        Schema::create('business_contents', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 200)->default('Solusi IT Untuk Bisnis Anda');
            $table->text('description')->nullable();
            $table->string('btn_text', 50)->default('Hubungi Kami');
            $table->string('btn_link', 255)->default('#contact');
            $table->timestamps();
        });

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('services');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};