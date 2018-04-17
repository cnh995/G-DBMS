<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistantshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistantships', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->char('student_id', 7);
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->char('position', 3);
            $table->foreign('position')->references('name')->on('positions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('date_offered');
            $table->date('date_responded')->nullable()->default(null);
            $table->date('defer_date')->nullable()->default(null);

            $table->integer('current_status_id')->unsigned();
            $table->foreign('current_status_id')->references('id')->on('assistantship_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('corresponding_tuition_waiver_id')->unsigned()->nullable()->default(null);
            $table->foreign('corresponding_tuition_waiver_id')->references('id')->on('tuition_waivers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->decimal('stipend', 8, 2);

            $table->integer('funding_source_id')->unsigned();
            $table->foreign('funding_source_id')->references('id')->on('funding_sources')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('time', 15)->default(''); //as in 1/4 time or 1/2 time assistantship
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assistantships');
    }
}
