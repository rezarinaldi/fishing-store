<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveItemIdDateQuantityTotalPriceFromOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_item_id_foreign');
            $table->dropIndex('orders_item_id_foreign');
            $table->dropColumn(['item_id', 'date', 'quantity', 'total_price']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_item_id_foreign');
            $table->dropIndex('orders_item_id_foreign');
            $table->dropColumn('item_id');
            $table->datetime("date");
            $table->integer("quantity");
            $table->integer("total_price");
        });
    }
}
