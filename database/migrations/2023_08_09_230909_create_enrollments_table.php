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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('status')->default('pending');
            $table->decimal('grade', 3, 2)->nullable();
            $table->decimal('grade_override', 3, 2)->nullable();
            $table->unsignedInteger('dedication')->default(0);
            $table->unsignedInteger('dedication_override')->default(0);
            $table->longText('payload')->nullable();
            $table->foreignId('course_id');
            $table->foreignId('user_id');
            $table->string('role');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
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
        Schema::dropIfExists('enrollments');
    }
};
