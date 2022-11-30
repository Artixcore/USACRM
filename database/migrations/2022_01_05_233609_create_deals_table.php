<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('deal_number');
            $table->string('contract_id');
            $table->string('deal');
            $table->string('details');
            $table->string('category');
            $table->string('expected_close');
            $table->string('expected_value');
            $table->string('currency_type');
            $table->string('stage')->default('New Stage');
            $table->string('followers');
            $table->string('followers_recieve_mail')->nullable();
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
        Schema::dropIfExists('deals');
    }
}
