<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users");
            $table->foreignId("item_id")->references("id")->on("items");
            $table->datetime("date");
            $table->integer("quantity");
            $table->integer("total_price");
            $table->enum('shipping_method', ['pick-up', 'delivery']);
            $table->enum('status', ['unpaid', 'process', 'delivered', 'success', 'cancel']);
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
        Schema::dropIfExists('orders');
    }
}
