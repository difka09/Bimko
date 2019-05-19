<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailAgendaIdDeleteAgendaIdOnDetailAgendaUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_agenda_user', function (Blueprint $table) {
            $table->integer('detail_agenda_id')->unsigned()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_agenda_user', function (Blueprint $table) {
            $table->dropColumn('detail_agenda_id');
        });
    }
}
