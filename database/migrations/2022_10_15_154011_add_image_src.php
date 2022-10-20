<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageSrc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('image_src');
            $table->string('image');
        });

        Schema::table('banner_photo', function (Blueprint $table) {
            $table->dropColumn('image_src');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->string('image_src');
        });

        Schema::table('banner_photo', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->string('image_src');
        });
    }
}
