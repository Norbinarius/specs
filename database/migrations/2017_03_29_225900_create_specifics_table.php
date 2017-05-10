<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifics', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 191)
				  ->unique();
			$table->integer('component_id')
			      ->unsigned();
				  
			$table->integer('component_other__id')
			      ->unsigned();

			$table->foreign('component_id')
				  ->references('id')
				  ->on('components')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');
			$table->foreign('component_other__id')
				  ->references('id')
				  ->on('components')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');
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
        Schema::dropIfExists('specifics');
    }
}
