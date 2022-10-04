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
        Schema::create('election_registration_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('registration_center_type');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('province');
            $table->string('tel');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('election_registration_centers');
    }
};
