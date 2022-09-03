<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('repositories')) {
            Schema::create('repositories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('description');
                $table->string('assigned_to');
                $table->string('status');
                $table->string('logo');
                $table->unsignedBigInteger('client_id');
                $table->unsignedBigInteger('priority_id');
                $table->unsignedBigInteger('type_id');
                $table->timestamps();
            });
            Schema::table('repositories', function ($table) {
                $table->foreign('client_id')->references('id')->on('clients');
                $table->foreign('priority_id')->references('id')->on('priorities');
                $table->foreign('type_id')->references('id')->on('types');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
