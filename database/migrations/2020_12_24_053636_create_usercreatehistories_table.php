<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercreatehistoriesTable extends Migration
{

    public function up()
    {
        Schema::create('usercreatehistories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->integer('created_by_user_id');
            $table->integer('last_modified_by_user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('usercreatehistories');
    }
}
