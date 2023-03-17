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
                $table->uuid('id')->primary();
                $table->foreignUuid('cars_models_id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->string('car_number');
                $table->unsignedInteger('car_year');
                $table->foreignUuid('cars_dvs_type_id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->foreignUuid('cars_status_id')
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
