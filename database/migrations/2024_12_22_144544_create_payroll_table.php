<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('number_of_day_work')->nullable();
            $table->string('bonus')->nullable();
            $table->string('overtime')->nullable();
            $table->string('gross_salary')->nullable();
            $table->string('cash_advance')->nullable();
            $table->string('late_hours')->nullable();
            $table->string('absent_days')->nullable();
            $table->string('ssc_levy')->nullable()->comment('Social Security Contribution Levy SSCL');
            $table->string('total_deductions')->nullable();
            $table->string('netpay')->nullable();
            $table->string('payroll_monthly')->nullable();
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
        Schema::dropIfExists('payroll');
    }
}
