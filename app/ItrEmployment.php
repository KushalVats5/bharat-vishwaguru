<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrEmployment extends Model
{
    protected $fillable = [
        'salary_income_annual',
        'value_of_perquisites',
        'profit_in_lieu_of_salary',
        'house_rent_allowance',
        'leave_travel_concession',
        'gratuity',
        'other_allowances',
        'standard_deduction',
        'entertainment_allowance',
        'professional_tax',
        'employer_name',
        'tds_deduction',
        'TAN_of_employer',
        'itr_sources_id',
    ];
}