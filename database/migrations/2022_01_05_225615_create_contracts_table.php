<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('con_number');
            $table->string('user_id');
            $table->string('role');
            $table->string('name_prefix');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email');
            $table->string('home_email')->nullable();
            $table->string('work_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('coordinator');
            $table->string('assigned_person');
            $table->string('company_id'); // Company
            $table->string('e_m_a_id'); // Email Marketing Audience
            $table->string('tags');
            $table->string('title');
            $table->string('bg_info');
            $table->string('phone');
            $table->string('bc_phone');
            $table->string('website');
            $table->string('skype');
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
        Schema::dropIfExists('contracts');
    }
}
