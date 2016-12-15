<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCatKnowledgeBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('knowledgebase', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('category_id')->dropIndex();
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
            $table->string('link')->unique();
            $table->bigInteger('category_id')->index();
        });
    }
}
