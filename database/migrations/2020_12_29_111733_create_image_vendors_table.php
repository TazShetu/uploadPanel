<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageVendorsTable extends Migration
{

    public function up()
    {
        Schema::create('image_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('image_vendors');
    }
}
