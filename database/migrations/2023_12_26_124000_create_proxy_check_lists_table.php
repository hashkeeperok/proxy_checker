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
        Schema::create('proxy_check_lists', function (Blueprint $table) {
            $table->id();
            $table->string('check_time')->nullable();
            $table->unsignedInteger('count');
            $table->json('proxy_list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proxy_check_lists');
    }
};
