<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('task_number');
            $table->string('task_title');
            $table->string('task_project');
            $table->string('task_est_time');
            $table->string('task_time_spent');
            $table->string('task_desc');
            $table->string('task_tags[]');
            $table->string('task_priority');
            $table->string('task_type');
            $table->string('task_status')->default('active');
            $table->string('task_start_date');
            $table->string('task_due_date');
            $table->string('task_repeat')->default('No');
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
        Schema::dropIfExists('tasks');
    }
}
