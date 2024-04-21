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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->decimal('price', 15, 2)->unsigned();
            $table->string('currency')->default('USD');
            $table->string('status')->default('active')->comment('active|closed');
            $table->string('templates');
            $table->string('model')->nullable();
            $table->integer('words')->default(0);
            $table->integer('images')->default(0);
            $table->integer('max_tokens')->default(0);
            $table->string('payment_frequency')->nullable()->comment('monthly|yearly');
            $table->string('primary_heading')->nullable();
            $table->boolean('featured')->nullable()->default(0);
            $table->boolean('free')->nullable()->default(0);
            $table->boolean('image_feature')->nullable()->default(1);
            $table->longText('plan_features')->nullable();
            $table->string('paypal_gateway_plan_id')->nullable();
            $table->string('stripe_gateway_plan_id')->nullable();
            $table->string('paystack_gateway_plan_id')->nullable();
            $table->string('razorpay_gateway_plan_id')->nullable();
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
        Schema::dropIfExists('plans');
    }
};
