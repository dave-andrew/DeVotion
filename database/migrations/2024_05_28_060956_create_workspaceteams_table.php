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

            // Add foreign key constraints
            $table->foreign('workspace_id')
                  ->references('id')
                  ->on('workspaces')
                  ->onDelete('cascade');

            $table->foreign('teamspace_id')
                  ->references('id')
                  ->on('teamspaces')
                  ->onDelete('cascade');

            // Add composite primary key
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
