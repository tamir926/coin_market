<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("user_name")->nullable();
            $table->string("user_email")->nullable();
            $table->string("user_phone")->nullable();
            $table->unsignedBigInteger("watt_quantity");
            $table->integer("watt_unit_price");
            $table->unsignedBigInteger("watt_amount");
            $table->string("invoice_no");
            $table->unsignedTinyInteger("status")->default(0);
            $table->unsignedTinyInteger("watt_status")->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_orders');
    }
}
