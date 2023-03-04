<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('company');
            $table->string('title');
            $table->string('position');
            $table->string('stack')->nullable();
            $table->dateTime('start_year');
            $table->dateTime('end_year');
            $table->boolean('till_present')->default(false);
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['reference']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_experiences');
    }
}
