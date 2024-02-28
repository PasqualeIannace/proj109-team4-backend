<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            //$table->unsignedBigInteger("customer_id");
            //$table->foreign("customers_id")->references("id")->on("customers")->nullOnDelete();
            $table->tinyText("message");
            $table->boolean("payment_status");
            $table->date("order_date");
            $table->decimal("total_price");
            $table->string('name_surname', 100);
            $table->string('address', 100);
            $table->string("phone_number", 50);
            $table->string('email', 50);
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
};
