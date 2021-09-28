<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCollectorAndAccountIdNullableInTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_account_id_foreign');
            $table->dropForeign('transactions_collector_id_foreign');

            $table->bigInteger('collector_id')->nullable()->unsigned()->change();
            $table->foreign('collector_id')->references('id')->on('users');
            $table->bigInteger('account_id')->nullable()->unsigned()->change();
            $table->foreign('account_id')->references('id')->on('user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
