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
            $table->timestamps();
            $table->longText('name');
            $table->integer('number_beds');
            $table->integer('location_id');
            $table->integer('group_id');
            $table->longText('notes');

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
