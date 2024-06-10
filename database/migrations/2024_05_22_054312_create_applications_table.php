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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->unsignedBigInteger('seeker_id')->nullable();
            $table->date('applicationDate');
            $table->enum('status',['pending', 'accepted','rejected','in review'])->default('pending');
            $table->string('cv')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('seeker_id')->references('id')->on('seekers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
