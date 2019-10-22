<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('team');
            $table->Float('ov1',9,2);
            $table->Float('ov2',9,2);
            $table->Float('ov3',9,2);
            $table->Float('ov4',9,2);
            $table->Float('ov5',9,2);
            $table->Float('total',9,2);
            $table->integer('run');
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
        Schema::dropIfExists('runs');
    }
}
