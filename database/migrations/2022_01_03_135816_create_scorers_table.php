<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScorersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('home_team_scorer')->nullable();
            $table->unsignedBigInteger('away_team_scorer')->nullable();
            $table->foreign('home_team_scorer')->references('id')->on('players');
            $table->foreign('away_team_scorer')->references('id')->on('players');
            $table->string('home_team_goal_minutes')->nullable();
            $table->string('away_team_goal_minutes')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('scorers');
    }
}
