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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("store_order_id");
            // product id
            $table->foreignId("product_id")->constrained("products")->onDelete("cascade");
            $table->string("username")->nullable();
            $table->string("mobile")->nullable();
            $table->string("email")->nullable();
            $table->boolean("sms_sent")->default(false);
            $table->string("status")->default("pending");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
