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
        Schema::create('notedetails', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->string('content')->nullable();
            $table->string('type');
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('notedetails');
    }
};
