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
        Schema::create('media_comments', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('media_id')->nullable();
            $table->longText('text')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_comments');
    }
};
