<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerphotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_photo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_src');
            $table->timestamps();
            
            $table->unsignedBigInteger('banner_id');
            $table->foreign('banner_id')
                ->references('id')
                ->on('banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_photo');
    }
}
