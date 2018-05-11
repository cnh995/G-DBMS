<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAdvisors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('advisors', function (Blueprint $table) {
            $table->string('current_position');
            $table->integer('contact_number');
            $table->integer('advising_students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advisors', function (Blueprint $table) {
            $table->dropColumn('current_position');
            $table->dropColumn('contact_number');
            $table->dropColumn('advising_students');
        });
    }
}
