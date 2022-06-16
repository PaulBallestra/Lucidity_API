<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('classic_stats');
            $table->integer('lucid_stats');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
