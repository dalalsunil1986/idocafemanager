<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->string('customer_name');
            $table->integer('people_count');
            $table->date('date');
            $table->double('total_price');
            $table->integer('table_number');
            $table->integer('user_id');
            $table->enum('status',['Cooking','Delivered']);
            $table->string('checkin');
            $table->string('checkout');
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
