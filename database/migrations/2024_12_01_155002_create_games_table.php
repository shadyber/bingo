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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('selected_cards');
            $table->integer('cards_qnt')->default(0);
            $table->longText('random_numbers');//akaanswers
            $table->string('card_price')->default('10');
            $table->float('agent_commission')->default(0.25);
            $table->string('game_state')->default('started');
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
        Schema::dropIfExists('games');
    }
};
