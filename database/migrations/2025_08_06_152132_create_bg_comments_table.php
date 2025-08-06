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
        Schema::create('bg_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('bg_post_id')->constrained('bg_posts')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bg_comments');
    }
};
