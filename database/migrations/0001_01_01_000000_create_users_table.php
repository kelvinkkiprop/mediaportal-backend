<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('picture')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('verification_code')->nullable();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('county_id')->nullable();
            $table->unsignedBigInteger('constituency_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->date('dob')->nullable();
            $table->longText('bio')->nullable();
            $table->boolean('receive_notifications')->default(true);

            $table->string('referral_code')->unique()->nullable();
            $table->foreignId('referred_by_id')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
