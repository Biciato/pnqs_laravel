<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'organization_name',
        'name',
        'document_id',
        'economic_activities',
        'economic_activity_start',
        'homepage',
        'subscription_category_id',
        'is_autonomous',
        'is_public',
        'persons_qt',
        'group_id',
        'subgroup_id',
        'status',
        'status_reason',
        'practice_category_id',
        'practice_name',
        'implantation_start_dt',
        'practice_resume',
        'practice_area',
        'criteria_questions',
        'results',
        'stakeholders',
        'has_autonomy',
        'agree_suspend',
        'agree_examiners',
        'subscription_company_size_id',
        'subscription_subcategory_id',
        'agree_sqfsa',
        'has_restriction',
        'removed',
        'persons_perc', 20,
        'organization_type', 80,
        'candidate',
        'indicate_company_name',
        'reviewer_id',
        'year',
        'active',
    ];
    protected $table = 'subscription';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeIndex($query) {
        return $query->whereRemoved(0)
                        ->whereActive(1)
                        ->rightJoin('subscription_category', 'subscription_category.id', '=', 'subscription.subscription_category_id')
                        ->select(
                            'subscription.id',
                            'subscription.name as name',
                            'subscription.status',
                            'subscription.created_at',
                            'subscription_category.name as category_name'
                        );
    }
}
