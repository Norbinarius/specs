<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 191)
			      ->unique();

			$table->integer('type_id')
				  ->unsigned();
			$table->foreign('type_id')
				  ->references('id')
				  ->on('types')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');

            $table->integer('device_id')
                ->unsigned();
            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
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
        Schema::dropIfExists('components');
    }
}
