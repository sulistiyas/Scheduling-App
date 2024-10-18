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
        Schema::create('order_messenger', function (Blueprint $table) {
            $table->id('id_order_messenger');
            $table->integer('id_tbl_messenger');
            $table->integer('id_users');
            $table->string('status_order_messenger');
            $table->string('notes_messenger')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_messenger');
    }
};
