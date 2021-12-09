<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kycs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedTinyInteger("status")->default(0);
            $table->string("firstname");
            $table->string("lastname");
            $table->string("regnum");
            $table->string("phone");
            $table->date("birthday")->nullable();
            $table->string("country");
            $table->string("city");
            $table->string("address");
            $table->string("doc_type");
            $table->string("doc_one")->nullable();
            $table->string("doc_two")->nullable();
            $table->string("doc_three")->nullable();
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
        Schema::dropIfExists('user_kycs');
    }
}
