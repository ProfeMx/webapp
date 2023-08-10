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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('version');
            $table->longText('content');
            $table->decimal('grade', 3,2)->nullable();
            $table->decimal('grade_override', 3, 2)->nullable();
            $table->longText('question_data')->nullable(); // Temporal 
            $table->foreignId('question_id');
            $table->foreignId('attempt_id');
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
        Schema::dropIfExists('answers');
    }
};
