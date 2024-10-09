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
        Schema::create('detail_order_driver', function (Blueprint $table) {
            $table->id('id_detail_order_driver');
            $table->integer('id_order_driver')->nullable()->index('fk_tbl_detail_order_messenger_to_order_messenger');
            $table->string('item_type');
            $table->string('order_pick_up_date');
            $table->string('order_pick_up_time');
            $table->string('note_sender')->nullable();
            $table->string('order_arrive_date');
            $table->string('order_arrive_time');
            $table->string('client');
            $table->string('destination_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_order_driver');
    }
};
