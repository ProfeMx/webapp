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
        Schema::create('forum_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->foreignId('user_id');
            $table->foreignId('subscriptionable_id');
            $table->string('subscriptionable_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_subscriptions');
    }
};
