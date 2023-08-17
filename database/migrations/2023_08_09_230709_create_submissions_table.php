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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->text('content')->nullable();
            $table->string('submission_file')->nullable();
            $table->decimal('grade', 3,2)->nullable();
            $table->decimal('grade_override', 3, 2)->nullable();
            $table->decimal('weight', 3, 2)->nullable();
            $table->text('feedback')->nullable();
            $table->string('feedback_file')->nullable();
            $table->foreignId('homework_id');
            $table->foreignId('enrollment_id');
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
        Schema::dropIfExists('submissions');
    }
};
