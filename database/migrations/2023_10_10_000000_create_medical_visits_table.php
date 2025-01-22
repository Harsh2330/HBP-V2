<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('medical_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('visit_date');
            $table->string('doctor_name');
            $table->string('nurse_name');
            $table->text('diagnosis');
            $table->text('simplified_diagnosis')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->text('ongoing_treatments')->nullable();
            $table->text('medications_prescribed')->nullable();
            $table->text('procedures')->nullable();
            $table->text('doctor_notes')->nullable();
            $table->text('nurse_observations')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_visits');
    }
}
