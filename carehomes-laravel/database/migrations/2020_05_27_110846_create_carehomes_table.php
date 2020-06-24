<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarehomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carehomes', function (Blueprint $table) {
            $table->id();
            $table->longText('name')->nullable(false);
            $table->string('number_beds')->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('group_id')->unsigned()->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('carehomes');
    }
}
