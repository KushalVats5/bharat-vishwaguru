<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrOtherIncome extends Model
{
    protected $fillable = [
        'interest_from_saving_bank_ac',
        'interest_from_fixed_deposit',
        'interest_from_income_tax_refund',
        'receive_family_pension',
        'family_pension_received',
        'deduction_under_57iia',
        'net_family_pension',
        'any_other_income',
        'dividend_income',
        'di_upto_15jun',
        'di_16jun_to_15sep',
        'di_16sep_to_15dec',
        'di_16dec_to_15mar',
        'di_16mar_to_31mar',
        'exempted_income_check',
        'exempted_income',
        'itr_sources_id',
    ];
}