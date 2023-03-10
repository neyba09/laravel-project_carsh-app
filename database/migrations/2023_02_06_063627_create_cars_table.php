<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cars_models_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->string('car_number');
                $table->unsignedInteger('car_year');
                $table->foreignId('cars_dvs_type_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->foreignId('cars_status_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
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
        Schema::dropIfExists('cars');
    }
};
