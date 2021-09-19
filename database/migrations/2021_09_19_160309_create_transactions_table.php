<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->string('ref', 20);
            $table->enum('is_in', ['in','out']);
            $table->float('fee');
            $table->float('amount');
            $table->string('status', 25);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('collector_id')->references('id')->on('users')->constrained();
            $table->foreignId('account_id')->references('id')->on('user_accounts')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
