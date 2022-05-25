<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSubscription extends Model
{
    protected $fillable = [
        'service_id',
        'service_plan_id',
        'payment_status',
        'transaction_id',
        'order_id',
        'tracking_id',
        'payment_mode',
        'currency',
        'amount',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zipcode',
        'txn_date',
        'response_code',
        'start_date',
        'end_date',
        'user_id',
        'plan_duration',
        'plan_duration_unit',
        'plan_price',
        'service_type',
        'financial_year',
        'financial_year_quarter',
        'retrun_to_be_file_from',
        'valadity_of_plan_package',
    ];

    public function service_plan()
    {
        return $this->hasOne('App\ServicePlan', 'id', 'service_plan_id');
    }
    public function gst_filing_service()
    {
        return $this->hasOne('App\GstInfo', 'id', 'service_id');
    }

}