<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('case_papers', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->foreignId('patient_id')->constrained('users'); // Modify patient_id to be a foreign key
        $table->string('contact');
        $table->integer('age');
        $table->string('sex');
        $table->text('address');
        $table->string('education');
        $table->string('marital_status');
        $table->string('visit_type');
        $table->string('diagnosis');
        $table->text('chief_complaint');
        $table->boolean('symptom_pain')->default(false);
        $table->boolean('symptom_sore_mouth')->default(false);
        $table->boolean('symptom_itching')->default(false);
        $table->boolean('constipation')->default(false);
        $table->boolean('symptom_nausea')->default(false);
        $table->boolean('symptom_swelling')->default(false);
        $table->boolean('symptom_breathlessness')->default(false);
        $table->boolean('heat_burn')->default(false);
        $table->boolean('lymphedema')->default(false);
        $table->boolean('cough')->default(false);
        $table->boolean('symptom_vomiting')->default(false);
        $table->boolean('symptom_delirum')->default(false);
        $table->boolean('symptom_tiredness')->default(false);
        $table->boolean('bleeding')->default(false);
        $table->boolean('pressure_sores')->default(false);
        $table->boolean('swallowing_difficulty')->default(false);
        $table->boolean('ulcer_wound')->default(false);
        $table->boolean('drowsiness')->default(false);
        $table->boolean('others')->default(false);
        $table->string('general_condition');
        $table->string('communication');
        $table->string('ambulation_activity');
        $table->string('sleep');
        $table->string('urination');
        $table->string('appetite');
        $table->string('maladour');
        $table->string('bowl');
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
        Schema::dropIfExists('case_papers');
    }
}

?>