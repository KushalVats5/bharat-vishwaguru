<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrBusinessIncome extends Model
{
    protected $fillable = [
        'presumptive_business_income',
        'financial_particular_on_31_march',
        'fixed_assets',
        'stock_in_trade',
        'balance_with_banks',
        'cash_balance',
        'sundry_debtors',
        'loans_and_advances',
        'other_assets',
        'members_own_capital',
        'secured_loans',
        'unsecured_loans',
        'advances',
        'sundry_creditors',
        'other_liabilities',
        'gstin',
        'turnover_as_per_gst_return',
        'itr_sources_id',
    ];

}