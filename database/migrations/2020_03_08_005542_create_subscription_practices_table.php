<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_practice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained();
            $table->string('practice_category')->nullable();
            $table->integer('subgroup_id')->nullable();
            $table->string('name');
            $table->string('area')->nullable();
            $table->text('resume')->nullable();
            $table->text('criteria_questions')->nullable();
            $table->date('implantation_start_dt')->nullable();
            $table->text('results')->nullable();
            $table->text('stakeholders')->nullable();
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
        Schema::dropIfExists('subscription_practice');
    }
}
