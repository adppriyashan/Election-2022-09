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
        Schema::create('election_has_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('election_id');
            $table->string('candidate_no');
            $table->string('candidate_name');
            $table->string('candidate_nic');
            $table->string('candidate_party')->nullable();
            $table->integer('candidate_age')->nullable();
            $table->integer('count')->default(0);
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('election_has_candidates');
    }
};
