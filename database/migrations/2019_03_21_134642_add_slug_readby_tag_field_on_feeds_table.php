<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugReadbyTagFieldOnFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feeds', function (Blueprint $table) {
            $table->string('slug')->after('content')->unique()->nullable();
            $table->integer('readby')->after('content')->nullable();
            $table->string('tag')->after('content')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feeds', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('readby');
            $table->dropColumn('tag');
        });
    }
}
