<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstFiling extends Model
{
    protected $fillable = [
        'gst_info_id',
        'service_plan_id',
        'financial_year',
        'month',
        'is_file_nill',
        'is_json_bills',
        'sales_bills',
        'purchase_bills',
        'json_bills',
        'gstr1_doc',
        'gstr3b_doc',
        'tax_computation_doc',
        'gst_challan_doc',
    ];

    /**
     * Get all of the GstFiling's jobs.
     */
    public function jobs()
    {
        return $this->morphOne('App\Job', 'jobable');
    }

    public function gst_info()
    {
        return $this->hasOne('App\GstInfo', 'id', 'gst_info_id');
    }
}