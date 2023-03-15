<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentaddresses', function (Blueprint $table) {
            $table->id();
            $table->text("addr");
            $table->unsignedBigInteger("studentid");
            $table->foreign("studentid")->references("studentid")->on("student");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentaddresses');
    }
};
