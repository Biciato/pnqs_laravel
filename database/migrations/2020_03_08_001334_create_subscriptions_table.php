<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('organization_name')->nullable();
            $table->string('name');
            $table->string('document_id');
            $table->text('economic_activities')->nullable();
            $table->date('economic_activity_start');
            $table->string('homepage')->nullable();
            $table->integer('subscription_category_id')->nullable();
            $table->tinyInteger('is_autonomous')->default(0);
            $table->tinyInteger('is_public')->default(0);
            $table->integer('persons_qt')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('subgroup_id')->nullable();
            $table->char('status', 3)->nullable()->default('ANL');
            $table->text('status_reason')->nullable();
            $table->integer('practice_category_id')->nullable();
            $table->string('practice_name')->nullable();
            $table->date('implantation_start_dt')->nullable();
            $table->text('practice_resume')->nulable();
            $table->string('practice_area')->nullable();
            $table->string('criteria_questions')->nullable();
            $table->text('results')->nullable();
            $table->text('stakeholders')->nullable();
            $table->tinyInteger('has_autonomy')->nullable();
            $table->tinyInteger('agree_suspend')->nullable();
            $table->tinyInteger('agree_examiners')->nullable();
            $table->integer('subscription_company_size_id')->nullable();
            $table->integer('subscription_subcategory_id')->nullable();
            $table->tinyInteger('agree_sqfsa')->nullable();
            $table->tinyInteger('has_restriction')->nullable();
            $table->tinyInteger('removed')->nullable()->default(0);
            $table->char('persons_perc', 20)->nullable();
            $table->char('organization_type', 80)->nullable();
            $table->string('candidate')->nullable();
            $table->string('indicate_company_name')->nullable();
            $table->integer('reviewer_id')->nullable();
            $table->year('year')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('subscription');
    }
}
