<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarehomeSpecialismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carehome_specialisms', function (Blueprint $table) {
            $table->id();
            $table->integer('carehome_id')->nullable(false)->unsigned();
            $table->integer('specialism_id')->nullable(false)->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carehome_specialisms');
    }
}
