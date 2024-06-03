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
        Schema::create('workspaceteams', function (Blueprint $table) {
            $table->uuid('workspace_id');
            $table->uuid('teamspace_id');
            $table->timestamps();

            $table->foreign('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
            $table->foreign('teamspace_id')->references('id')->on('teamspaces')->cascadeOnDelete();

            $table->primary(['workspace_id', 'teamspace_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspaceteams');
    }
};
