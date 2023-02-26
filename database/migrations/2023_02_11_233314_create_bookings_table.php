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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('destination_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('joiner_id')->nullable();
            $table->string('email');
            $table->integer('contact_no');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date');
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
        Schema::dropIfExists('bookings');
    }
};
