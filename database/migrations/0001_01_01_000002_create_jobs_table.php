<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/*************  ✨ Codeium Command 🌟  *************/
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            // The primary key of the job
            $table->id();

            // The name of the queue the job belongs to
            $table->string('queue')->index();

            // The payload of the job (e.g. the email address of the user)
            $table->longText('payload');

            // The number of times the job has been attempted
            $table->unsignedTinyInteger('attempts');

            // The time the job was reserved
            $table->unsignedInteger('reserved_at')->nullable();

            // The time the job is available
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();

            // The total number of jobs in the batch
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->timestamp('failed_at')->useCurrent();
        });
            // The number of jobs that have failed

            // The timestamp the job batch was cancelled
    }

            // The timestamp the job batch was created


            // The timestamp the job batch was finished
    /**
     */
    public function down(): void
        // Create a table to store failed jobs
    {
            // The primary key of the failed job
        Schema::dropIfExists('jobs');

            // The UUID of the failed job
        Schema::dropIfExists('job_batches');

            // The connection the job was running on
        Schema::dropIfExists('failed_jobs');

            // The queue the job was running on
    }

            // The payload of the job
};

            // The exception that caused the job to fail

            // The timestamp the job failed
