<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSnippets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('events')){
            Schema::table('events', function ($table) {
                $table->string('snippet')->before('content');
            });
        }
        if(Schema::hasTable('news')){
            Schema::table('news', function ($table) {
                $table->string('snippet')->before('content');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function ($table) {
            $table->dropColumn('snippet');
        });
        Schema::table('news', function ($table) {
            $table->dropColumn('snippet');
        });
    }
}
