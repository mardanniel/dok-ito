<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('sched_at');
            $table->string('concern', 250);
            $table->boolean('is_done')->default(0);
            $table->foreignId('patient_id')
                  ->constrained('patients')
                  ->onDelete('cascade');
            $table->foreignId('doctor_id')
                  ->constrained('doctors')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_appointments', function(Blueprint $table){
            $table->dropForeign(['patient_id', 'doctor_id']);
            $table->drop();
        });
    }
}
