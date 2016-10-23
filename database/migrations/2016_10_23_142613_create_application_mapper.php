<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationMapper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_mapper', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('application_device_id')->index();
            $table->mediumInteger('testcase_id')->index();
            $table->unique(['application_device_id','testcase_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_mapper');
    }
}
