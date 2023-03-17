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
        Schema::create('cars_operations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cars_id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('users_id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('cars_status_id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->dateTime('data_time_operation');
            $table->float('GPS_cars_latitude');
            $table->float('GPS_cars_longitude');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_operations');
    }
};
