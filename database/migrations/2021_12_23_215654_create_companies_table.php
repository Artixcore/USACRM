<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('company_number');
            $table->string('company_logo');
            $table->string('company_contract_user_id')->nullable();
            $table->string('company_category');
            $table->string('company_address');
            $table->string('company_website');
            $table->string('company_phone');
            $table->string('company_skype');
            $table->string('company_bg_info');
            $table->string('company_tags');
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
        Schema::dropIfExists('companies');
    }
}
