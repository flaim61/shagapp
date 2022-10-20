<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_link_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('contact_link', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->string('fa_class')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('contact_link_types_id');
            $table->foreign('contact_link_types_id')
                ->references('id')
                ->on('contact_link_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_link');
        Schema::dropIfExists('contact_link_types');
    }
}
