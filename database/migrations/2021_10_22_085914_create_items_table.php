<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->references("id")->on("categories");
            $table->string("nm_items", 100);
            $table->string("slug", 100)->unique();
            $table->longText("description");
            $table->integer("quantity")->length(4);
            $table->integer("price")->length(8);
            $table->integer("discount")->length(2);
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
        Schema::dropIfExists('items');
    }
}
