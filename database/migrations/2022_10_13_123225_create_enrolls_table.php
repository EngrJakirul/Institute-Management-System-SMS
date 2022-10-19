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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('course_id');
            $table->string('enroll_date');
            $table->string('enroll_timestamp');
            $table->string('enroll_status')->default('Pending');
            $table->string('payment_type');
            $table->string('payment_status')->default('Pending');
            $table->integer('payment_amount')->default(0);
            $table->string('payment_date')->nullable();
            $table->string('payment_timestamp')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('enrolls');
    }
};
