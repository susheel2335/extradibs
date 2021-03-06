<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->bigInteger('packageId')->unsigned();
            $table->foreign('packageId')->references('id')->on('packages');
            $table->string('accountName');
            $table->boolean('paid');
            $table->boolean('merged');
            $table->boolean('unMerged')->default(true);
            $table->integer('payers')->default(0);
            $table->dateTime('startDate');
            $table->integer('numberOfDays')->default(0);
            $table->integer('numberOfInvestments')->default(0);
            $table->integer('numberOfReferrals')->default(0);
            $table->string('entry')->default('old');
            $table->boolean('closed')->default(false);
            $table->boolean('blocked')->default(false);
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
        Schema::dropIfExists('user_packages');
    }
}
