.<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('team_name');
            $table->float('fee', 9,3)->nullable();
            $table->float('fine', 9,3)->nullable();
			$table->float('total', 9,3)->nullable();
			
			$table->float('paid_fee', 9,3)->nullable();
			$table->float('paid_fine', 9,3)->nullable();
			$table->float('paid_total', 9,3)->nullable();
            $table->string('match_name');
            $table->string('round');

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
        Schema::dropIfExists('fees');
    }
}
