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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("qr_id")->constrained("qrs")->onDelete("cascade");
            $table->foreignId("offer_id")->constrained("offers")->onDelete("cascade");
            $table->date("expire_date");
            $table->date("redeemed_date")->nullable();
            $table->string("status")->default("pending");
            $table->string("business_due");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
