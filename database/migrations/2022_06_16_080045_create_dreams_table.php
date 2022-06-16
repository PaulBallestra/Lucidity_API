<?php

use Carbon\Carbon;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDreamsTable extends Migration
{
    public function up()
    {
        Schema::create('dreams', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('title');
            $table->longText('content');
            $table->date('date')->format('yy-mm-YYYY');
            $table->boolean('isLucid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dreams');
    }
}
