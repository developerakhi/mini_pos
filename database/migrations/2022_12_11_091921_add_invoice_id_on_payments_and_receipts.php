<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceIdOnPaymentsAndReceipts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {

            $table->foreignId('sales_invoice_id')->nullable()->after('user_id');
        });

        Schema::table('payments', function (Blueprint $table) {

            $table->foreignId('purchase_invoice_id')->nullable()->after('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {

            $table->dropColumn('sales_invoice_id');
        });

        Schema::table('payments', function (Blueprint $table) {

            $table->dropColumn('purchase_invoice_id');
        });

    }
}
