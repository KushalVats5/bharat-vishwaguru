<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrDeduction extends Model
{
    protected $fillable = [
        'sec80c_lic_premium',
        'sec80c_pf',
        'sec80c_ppf',
        'sec80c_housing_loan_repayment',
        'sec80c_fdr',
        'sec80c_nsc',
        'sec80c_tuition_fee',
        'sec80c_paid_to_annuity',
        'sec80c_other_deductions',
        'sec80d_deductions',
        'donations',
        'other_deductions',
        'sec80dd_uu_member',
        'sec80dd_uu_expenditure',
        'sec80dd_uu_disability_percentage',
        'sec80ddb_citizen',
        'sec80ddb_expenditure',
        'sec80e_int_on_edu_loan',
        'sec80gg_rent_paid',
        'sec80gg_num_of_months',
        'itr_sources_id',
    ];
}