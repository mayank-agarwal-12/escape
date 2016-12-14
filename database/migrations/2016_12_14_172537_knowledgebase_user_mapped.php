<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KnowledgebaseUserMapped extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('knowledgebase', function (Blueprint $table) {
            $table->bigInteger('user_id')->index('user_id','user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('knowledgebase', function (Blueprint $table) {
            $table->dropColumn('user_id')->dropIndex('user_id');
        });
    }
}
