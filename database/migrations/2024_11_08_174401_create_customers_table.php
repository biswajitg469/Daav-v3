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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('address_1', 255);
            $table->string('address_2', 255);
            $table->string('town', 255);
            $table->string('postcode', 6);
            $table->string('email', 255)->nullable();
            $table->string('state', 255);
            $table->string('phone', 20);
            $table->string('name_ship', 255);
            $table->string('address_1_ship', 255);
            $table->string('address_2_ship', 255);
            $table->string('town_ship', 255);
            $table->string('postcode_ship', 6);
            $table->string('state_ship', 255);
            $table->boolean('is_active')->default(true); // Column for active status with default value
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
        Schema::dropIfExists('customers');
    }
};
