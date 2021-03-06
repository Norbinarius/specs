<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
			$table->string('company_name', 191);
			$table->string('model_name', 191)
				  ->unique();

            $table->integer('image_id')
                ->nullable()->unsigned();
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
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
        Schema::dropIfExists('devices');
    }
}
