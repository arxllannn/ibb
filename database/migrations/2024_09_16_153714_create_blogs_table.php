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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('category_id');
            $table->integer('created_by');
            $table->integer('is_archived')->default(0);
            $table->timestamps();
            $table->softDeletes(); // This enables soft deletes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
