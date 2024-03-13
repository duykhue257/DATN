<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('status_id')->constrained("order_status","id");
            $table->foreignId('payment_id')->constrained("payment","id");

            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('detail');
            $table->integer('shipping_cost')->default(0);
            $table->string('shipping_by');
            $table->boolean('is_payment')->default(false);
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
