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
        Schema::create('order_driver', function (Blueprint $table) {
            $table->id('id_order_driver');
            $table->integer('id_users');
            $table->integer('id_driver');
            $table->string('status_order_driver');
            $table->string('notes_driver')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_driver');
    }
};
