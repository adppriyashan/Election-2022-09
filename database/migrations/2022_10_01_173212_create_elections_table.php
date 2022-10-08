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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->integer('election_type');
            $table->integer('created_user_id');
            $table->string('name');
            $table->date('election_date')->nullable();
            $table->string('election_start_time')->nullable();
            $table->string('election_end_time')->nullable();
            $table->date('registration_opening_date')->nullable();
            $table->string('registration_opening_time')->nullable();
            $table->date('registration_closing_date')->nullable();
            $table->string('registration_closing_time')->nullable();
            $table->tinyInteger('status')->default();
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
        Schema::dropIfExists('elections');
    }
};
