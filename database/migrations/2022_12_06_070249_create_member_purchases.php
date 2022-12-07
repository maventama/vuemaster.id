<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('package_name');
            $table->enum('is_life_time', ['yes', 'no']);
            $table->dateTime('start_active')->nullable();
            $table->dateTime('end_active')->nullable();
            $table->integer('nominal');
            $table->enum('is_paid', ['yes', 'no', 'expired', 'waiting']);
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_purchases');
    }
}
