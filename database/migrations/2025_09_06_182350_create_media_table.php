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
        Schema::create('media', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('date_produced')->nullable();
            $table->string('tags')->nullable();
            $table->string('src_path')->nullable();
            $table->string('hls_master')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('mime_type')->nullable();

            $table->unsignedBigInteger('media_status_id')->default(1);
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->longText('reject_comments')->nullable();

            $table->unsignedBigInteger('type_id')->default(1);// upload|Live|vod
            // $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('visibility_id')->default(1); // Public|unlisted|private
            $table->boolean('is_recordable')->default(true);
            $table->boolean('is_streamable')->default(true);
            $table->boolean('allow_comments')->default(true);
            $table->boolean('allow_download')->default(true);

            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('approved_by')->nullable();
            $table->dateTime('approved_on')->nullable();

            $table->string('stream_key')->nullable()->comment('hashed stream key');
            $table->unsignedBigInteger('live_stream_status_id')->default(1); // scheduled|starting|live|ended|failed
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
