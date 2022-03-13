<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timeout')->nullable();
            $table->string('address');
            $table->string('regency');
            $table->string('province');
            $table->integer('total');
            $table->integer('shipping_cost');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('courier_id')->constrained('couriers');;
            $table->string('proof_of_payment');
            $table->timestamps();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
