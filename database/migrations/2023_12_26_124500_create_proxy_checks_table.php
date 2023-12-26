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
        Schema::create('proxy_checks', function (Blueprint $table) {
            $table->id();
            $table->string('ip_port')->comment('ip адрес и порт');
            $table->tinyInteger('type')->nullable()->comment('Тип прокси HTTP, SOCKS и тд');
            $table->string('location')->nullable()->comment('Гео прокси, страна город');
            $table->string('level')->nullable()->comment('Уровень  прокси anonymous, elite и тд');
            $table->boolean('is_available')->index()->comment('Доступность прокси');
            $table->string('timeout')->nullable()->comment('Время отклика');
            $table->string('real_ip')->nullable()->comment('Реальный IP адрес');
            $table->timestamp('created_at');

            $table->foreignId('proxy_check_list_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proxy_checks');
    }
};
