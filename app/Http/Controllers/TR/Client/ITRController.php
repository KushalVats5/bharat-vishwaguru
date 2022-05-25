<?php

namespace App\Http\Controllers\TR\Client;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\ItrBankDetail;
use App\ItrBusinessIncome;
use App\ItrDeduction;
use App\ItrEmployment;
use App\ItrOtherIncome;
use App\ItrPersonalDetail;
use App\ItrSource;
use App\State;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ITRController extends Controller
{

    /**
     *
     * allow client only
     *
     */
    public function __construct()
    {
        $this->middleware(['role:user|admin']);
    }

    /**
     * Display a listing of Itr.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list itr_sources')) {
                $itr_sources = ItrSource::paginate(10);
                return view('tr.client.itr.index', compact('itr_sources'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    public function itr_source(Request $request)
    {
        $user = Auth::user();
        $itr_source = [];
        $assesment_years = [];
        $assesment_years = Helper::generate_assesment_years(3);

        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_source = ItrSource::where('id', $request->id)->where('user_id', $user->id)->first();
                }
                return view('tr.client.itr.itr_source', compact('itr_source', 'assesment_years'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_source_save(Request $request)
    {
        $user = Auth::user();
        $assesment_years = Helper::generate_assesment_years(3);
        $itr_source = [];
        $filename = '';
        $new_file = false;

        if (auth()->user()->can('create itr_sources')) {
            /* if (isset($request->id)) {
            $itr_source = ItrSource::where('id', $request->id)->where('user_id', $user->id)->get();
            }

            return view('tr.client.itr.itr_source', compact('itr_source', 'assesment_years')); */

            $request->validate([
                'income_sources' => 'required',
                'financial_year' => 'required',
                'pan_number' => 'required|min:10|max:10',
                'aadhar_number' => 'required|min:12|max:14',
                'form_16' => 'max:10000|mimes:pdf',
            ]);

            /// upload form_16 document
            if ($request->hasFile('form_16')) { // upload photo if set
                $file = $request->file('form_16');
                $filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $filename);
                $new_file = true;
            }

            if (isset($request->id)) {
                // update
                $record = ItrSource::findOrFail($request->id);
                $update = [
                    'income_sources' => json_encode($request->income_sources),
                    'financial_year' => $request->financial_year,
                    'pan_number' => $request->pan_number,
                    'aadhar_number' => $request->aadhar_number,
                    'user_id' => $user->id,
                ];
                if ($new_file) {
                    $update['form_16'] = $filename;
                }
                $record->update($update);

                return redirect()->route('tr/user/itr-personal-details', ['id' => $record->id])->with(['success' => 'Income source updated successfully.']);
            } else {
                // create new
                $record = new ItrSource([
                    'income_sources' => json_encode($request->income_sources),
                    'financial_year' => $request->financial_year,
                    'pan_number' => $request->pan_number,
                    'aadhar_number' => $request->aadhar_number,
                    'form_16' => $filename,
                    'user_id' => $user->id,
                ]);
                $record->save();
                return redirect()->route('tr/user/itr-personal-details', ['id' => $record->id])->with(['success' => 'Income source step created successfully.']);
            }

        } else {
            throw new Exception('You don\'t have a rights to perform this action');
        }

    }

    public function itr_personal_details(Request $request)
    {
        $user = Auth::user();
        $itr_personal_detail = [];
        $id = '';
        $states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();
        $cities = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_personal_detail = ItrPersonalDetail::where('itr_sources_id', $request->id)->first();
                    if ($itr_personal_detail) {
                        $id = $itr_personal_detail->id;
                        $cities = City::where('state_id', $itr_personal_detail->state)->orderBy('name', 'ASC')->get();
                    }

                }

                return view('tr.client.itr.itr_personal_detail', compact('itr_personal_detail', 'states', 'cities', 'itr_sources_id', 'id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }
    public function itr_personal_details_save(Request $request)
    {
        $user = Auth::user();
        $itr_personal_detail = [];
        $itr_sources_id = isset($request->itr_sources_id) ? $request->itr_sources_id : '';

        if (auth()->user()->can('create itr_sources')) {
//            dd($request);

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'father_name' => 'required',
                'date_of_birth' => 'required|date',
                'phone' => 'required|min:10|max:15',
                'email' => 'required|email',
                'gender' => 'required',
                'pincode' => 'required|min:6|max:8',
                'city' => 'required',
                'state' => 'required',
                'flat_door_building' => 'required',
                'employee_category' => 'required',
            ]);

            if (isset($request->id) && ($request->id != null)) {

                // update
                $record = ItrPersonalDetail::findOrFail($request->id);
                $update = [
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'father_name' => $request->father_name,
                    'date_of_birth' => $request->date_of_birth,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'pincode' => $request->pincode,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'flat_door_building' => $request->flat_door_building,
                    'premises_building_village' => $request->premises_building_village,
                    'road' => $request->road,
                    'locality' => $request->locality,
                    'employee_category' => $request->employee_category,
                ];

                $record->update($update);

                return redirect()->route('tr/user/itr-employment', ['id' => $record->itr_sources_id])->with(['success' => 'Income source updated successfully.']);
            } else {

                // create new
                $record = new ItrPersonalDetail([
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'father_name' => $request->father_name,
                    'date_of_birth' => $request->date_of_birth,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'pincode' => $request->pincode,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'flat_door_building' => $request->flat_door_building,
                    'premises_building_village' => $request->premises_building_village,
                    'road' => $request->road,
                    'locality' => $request->locality,
                    'employee_category' => $request->employee_category,
                    'itr_sources_id' => $request->itr_sources_id,
                ]);
                $record->save();
                return redirect()->route('tr/user/itr-employment', ['id' => $record->itr_sources_id])->with(['success' => 'Income source step created successfully.']);
            }

        } else {
            throw new Exception('You don\'t have a rights to perform this action');
        }

        /* try {
    if (auth()->user()->can('create itr_sources')) {
    if (isset($request->id)) {
    $itr_personal_detail = ItrPersonalDetail::where('itr_sources_id', $request->id)->get();
    }

    return view('tr.client.itr.itr_personal_detail', compact('itr_personal_detail', 'states', 'itr_sources_id'));
    } else {
    throw new Exception('You don\'t have a rights to perform this action');
    }
    } catch (\Exception $e) {
    return redirect()->route('home')->with('warning', $e->getMessage());
    return $e->getMessage();
    } */

    }

    public function itr_employment(Request $request)
    {
        $user = Auth::user();
        $itr_employment_details = [];
        $id = '';
        $itr_sources_id = isset($request->id) ? $request->id : '';

        //$states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    /// do not use first(), because multi-row values can be possible there.
                    $itr_employment_details = ItrEmployment::where('itr_sources_id', $request->id)->get();

                    //$id = ($itr_employment_details) ? $itr_employment_details->id : '';
                }

                return view('tr.client.itr.itr_employment_detail', compact('itr_employment_details', 'itr_sources_id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_employment_save(Request $request)
    {
        $user = Auth::user();
        $itr_sources_id = isset($request->itr_sources_id) ? $request->itr_sources_id : '';

        // validations
        $validation_rules = [
            'salary_income_annual.*' => 'required|numeric',
            'value_of_perquisites.*' => 'numeric',
            'profit_in_lieu_of_salary.*' => 'numeric',
            'house_rent_allowance.*' => 'numeric',
            'leave_travel_concession.*' => 'numeric',
            'gratuity.*' => 'numeric',
            //'allowance_name.*' => 'string',
            //'allowance_amount.*' => 'numeric',
            'standard_deduction.*' => 'numeric',
            'entertainment_allowance.*' => 'numeric',
            'professional_tax.*' => 'numeric',
            'employer_name.*' => 'required|string',
            'tds_deduction.*' => 'required|numeric',
            'TAN_of_employer.*' => 'required|string',
        ];

        /* $validator = Validator::make($request->all(), $validation_rules);
        if ($validator->fails()) {
        return response()->json(['message' => $validator->errors(), 'status' => 400, 'success' => false, 'data' => null], 400);
        } */

        $request->validate($validation_rules);

        try {
            if (auth()->user()->can('create itr_sources')) {

                for ($i = 0; $i < count($request->salary_detail_id); $i++) {
                    /// if (!$invite->isEmpty()) // in case of get
                    /// if ($invite) // in case of first
                    $record = [];
                    $update = [];
                    $other_allowances = [];
                    $other_allowances = [
                        'allowance_name' => $request->allowance_name[$i],
                        'allowance_amount' => $request->allowance_amount[$i],
                    ];

                    if ($request->salary_detail_id[$i] != '') {
                        // update
                        $record = ItrEmployment::findOrFail($request->salary_detail_id[$i]);
                        $update = [
                            'salary_income_annual' => $request->salary_income_annual[$i],
                            'value_of_perquisites' => $request->value_of_perquisites[$i],
                            'profit_in_lieu_of_salary' => $request->profit_in_lieu_of_salary[$i],
                            'house_rent_allowance' => $request->house_rent_allowance[$i],
                            'leave_travel_concession' => $request->leave_travel_concession[$i],
                            'gratuity' => $request->gratuity[$i],
                            'other_allowances' => json_encode($other_allowances),
                            'standard_deduction' => $request->standard_deduction[$i],
                            'entertainment_allowance' => $request->entertainment_allowance[$i],
                            'professional_tax' => $request->professional_tax[$i],
                            'employer_name' => $request->employer_name[$i],
                            'tds_deduction' => $request->tds_deduction[$i],
                            'TAN_of_employer' => $request->TAN_of_employer[$i],
                            'itr_sources_id' => $request->itr_sources_id,
                        ];
                        $record->update($update);

                    } else {
                        // create
                        $update = [
                            'salary_income_annual' => $request->salary_income_annual[$i],
                            'value_of_perquisites' => $request->value_of_perquisites[$i],
                            'profit_in_lieu_of_salary' => $request->profit_in_lieu_of_salary[$i],
                            'house_rent_allowance' => $request->house_rent_allowance[$i],
                            'leave_travel_concession' => $request->leave_travel_concession[$i],
                            'gratuity' => $request->gratuity[$i],
                            'other_allowances' => json_encode($other_allowances),
                            'standard_deduction' => $request->standard_deduction[$i],
                            'entertainment_allowance' => $request->entertainment_allowance[$i],
                            'professional_tax' => $request->professional_tax[$i],
                            'employer_name' => $request->employer_name[$i],
                            'tds_deduction' => $request->tds_deduction[$i],
                            'TAN_of_employer' => $request->TAN_of_employer[$i],
                            'itr_sources_id' => $request->itr_sources_id,
                        ];
                        $record = new ItrEmployment($update);
                        $record->save();

                    }

                }
                ///dd($request);

                return redirect()->route('tr/user/itr-employment', ['id' => $request->itr_sources_id])->with(['success' => 'Employment details saved successfully.']);

            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_business_income(Request $request)
    {
        $user = Auth::user();
        $itr_business_details = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';

        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_business_details = ItrBusinessIncome::where('itr_sources_id', $request->id)->first();

                    $id = isset($itr_business_details) ? $itr_business_details->id : '';
                }

                return view('tr.client.itr.itr_business_detail', compact('itr_business_details', 'itr_sources_id', 'id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_business_income_save(Request $request)
    {
        $user = Auth::user();
        $itr_business_details = [];
        try {
            if (auth()->user()->can('create itr_sources')) {

                $request->validate([
                    'business_nature.*' => 'required|string',
                    'name_of_the_business.*' => 'string',
                    'gross_turnover_receipt.*' => 'numeric',
                    'total_presumptive_income.*' => 'numeric',
                    'fixed_assets' => 'numeric',
                    'stock_in_trade' => 'numeric',
                    'balance_with_banks' => 'numeric',
                    'cash_balance' => 'numeric',
                    'sundry_debtors' => 'numeric',
                    'loans_and_advances' => 'numeric',
                    'other_assets' => 'numeric',
                    'members_own_capital' => 'numeric',
                    'secured_loans' => 'numeric',
                    'unsecured_loans' => 'numeric',
                    'advances' => 'numeric',
                    'sundry_creditors' => 'numeric',
                    'other_liabilities' => 'numeric',
                    'gstin' => 'required|string',
                    'turnover_as_per_gst_return' => 'numeric',

                ]);

                $presumptive_business_income = json_encode(
                    [
                        'business_nature' => $request->business_nature,
                        'name_of_the_business' => $request->name_of_the_business,
                        'gross_turnover_receipt' => $request->gross_turnover_receipt,
                        'total_presumptive_income' => $request->total_presumptive_income,
                    ]
                );

                if (isset($request->id) && ($request->id != null)) {
                    // update
                    $update = [
                        'presumptive_business_income' => $presumptive_business_income,
                        'financial_particular_on_31_march' => $request->financial_particular_on_31_march ?? '',
                        'fixed_assets' => $request->fixed_assets,
                        'stock_in_trade' => $request->stock_in_trade,
                        'balance_with_banks' => $request->balance_with_banks,
                        'cash_balance' => $request->cash_balance,
                        'sundry_debtors' => $request->sundry_debtors,
                        'loans_and_advances' => $request->loans_and_advances,
                        'other_assets' => $request->other_assets,
                        'members_own_capital' => $request->members_own_capital,
                        'secured_loans' => $request->secured_loans,
                        'unsecured_loans' => $request->unsecured_loans,
                        'advances' => $request->advances,
                        'sundry_creditors' => $request->sundry_creditors,
                        'other_liabilities' => $request->other_liabilities,
                        'gstin' => $request->gstin,
                        'turnover_as_per_gst_return' => $request->turnover_as_per_gst_return,
                        'itr_sources_id' => $request->itr_sources_id,
                    ];
                    $record = ItrBusinessIncome::findOrFail($request->id);
                    $record->update($update);

                } else {
                    // create
                    $update = [
                        'presumptive_business_income' => $presumptive_business_income,
                        'financial_particular_on_31_march' => $request->financial_particular_on_31_march ?? '',
                        'fixed_assets' => $request->fixed_assets,
                        'stock_in_trade' => $request->stock_in_trade,
                        'balance_with_banks' => $request->balance_with_banks,
                        'cash_balance' => $request->cash_balance,
                        'sundry_debtors' => $request->sundry_debtors,
                        'loans_and_advances' => $request->loans_and_advances,
                        'other_assets' => $request->other_assets,
                        'members_own_capital' => $request->members_own_capital,
                        'secured_loans' => $request->secured_loans,
                        'unsecured_loans' => $request->unsecured_loans,
                        'advances' => $request->advances,
                        'sundry_creditors' => $request->sundry_creditors,
                        'other_liabilities' => $request->other_liabilities,
                        'gstin' => $request->gstin,
                        'turnover_as_per_gst_return' => $request->turnover_as_per_gst_return,
                        'itr_sources_id' => $request->itr_sources_id,
                    ];

                    $record = new ItrBusinessIncome($update);
                    $record->save();

                }
                return redirect()->route('tr/user/itr-business-income', ['id' => $request->itr_sources_id])->with(['success' => 'Business details saved successfully.']);

            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_other_income(Request $request)
    {
        $user = Auth::user();
        $itr_other_income = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';
        $id = '';
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_other_income = ItrOtherIncome::where('itr_sources_id', $request->id)->first();
                    $id = isset($itr_other_income) ? $itr_other_income->id : '';
                }

                return view('tr.client.itr.itr_other_income', compact('itr_other_income', 'itr_sources_id', 'id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_other_income_save(Request $request)
    {
        $user = Auth::user();
        $itr_other_income = [];
        try {
            if (auth()->user()->can('create itr_sources')) {
                //dd($request);

                $request->validate([
                    'interest_from_saving_bank_ac' => 'numeric',
                    'interest_from_fixed_deposit' => 'numeric',
                    'interest_from_income_tax_refund' => 'numeric',
                    'family_pension_received' => 'numeric',
                    'deduction_under_57iia' => 'numeric',
                    'net_family_pension' => 'numeric',
                    'any_other_income' => 'numeric',
                    'di_upto_15jun' => 'numeric',
                    'di_16jun_to_15sep' => 'numeric',
                    'di_16sep_to_15dec' => 'numeric',
                    'di_16dec_to_15mar' => 'numeric',
                    'di_16mar_to_31mar' => 'numeric',
                    'exempted_income_source.*' => 'string',
                    'exempted_income_amount.*' => 'numeric',
                ]);

                $exempted_income = json_encode([
                    'exempted_income_source' => $request->exempted_income_source,
                    'exempted_income_amount' => $request->exempted_income_amount,
                ]);

                $row = [
                    'interest_from_saving_bank_ac' => $request->interest_from_saving_bank_ac,
                    'interest_from_fixed_deposit' => $request->interest_from_fixed_deposit,
                    'interest_from_income_tax_refund' => $request->interest_from_income_tax_refund,
                    'receive_family_pension' => $request->receive_family_pension ?? 0,
                    'family_pension_received' => $request->family_pension_received,
                    'deduction_under_57iia' => $request->deduction_under_57iia,
                    'net_family_pension' => $request->net_family_pension,
                    'any_other_income' => $request->any_other_income,
                    'dividend_income' => $request->dividend_income ?? 0,
                    'di_upto_15jun' => $request->di_upto_15jun,
                    'di_16jun_to_15sep' => $request->di_16jun_to_15sep,
                    'di_16sep_to_15dec' => $request->di_16sep_to_15dec,
                    'di_16dec_to_15mar' => $request->di_16dec_to_15mar,
                    'di_16mar_to_31mar' => $request->di_16mar_to_31mar,
                    'exempted_income_check' => $request->exempted_income_check ?? 0,
                    'exempted_income' => $exempted_income,
                    'itr_sources_id' => $request->itr_sources_id,
                ];

                if (isset($request->id) && ($request->id != null)) {
                    // $itr_other_income = ItrOtherIncome::where('itr_sources_id', $request->id)->first();
                    // do update
                    $record = ItrOtherIncome::findOrFail($request->id);
                    $record->update($row);

                } else {
                    // create
                    $record = new ItrOtherIncome($row);
                    $record->save();

                }
                return redirect()->route('tr/user/itr-other-income', ['id' => $request->itr_sources_id])->with(['success' => 'Other income details saved successfully.']);

            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }
    //

    public function itr_deductions(Request $request)
    {
        $user = Auth::user();
        $itr_deductions = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';
        $id = '';
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_deductions = ItrDeduction::where('itr_sources_id', $request->id)->first();
                    $id = isset($itr_deductions) ? $itr_deductions->id : '';

                }

                return view('tr.client.itr.itr_deduction', compact('itr_deductions', 'id', 'itr_sources_id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_deductions_save(Request $request)
    {
        $user = Auth::user();
        $itr_deductions = [];
        try {
            if (auth()->user()->can('create itr_sources')) {

                $validation_rules = [
                    'sec80c_lic_premium' => 'numeric',
                    'sec80c_pf' => 'numeric',
                    'sec80c_ppf' => 'numeric',
                    'sec80c_housing_loan_repayment' => 'numeric',
                    'sec80c_fdr' => 'numeric',
                    'sec80c_nsc' => 'numeric',
                    'sec80c_tuition_fee' => 'numeric',
                    'sec80c_paid_to_annuity' => 'numeric',
                    'sec80c_other_deductions' => 'numeric',

                    'sec80d_medical_insurance.*' => 'string',
                    'sec80d_health_checkup.*' => 'numeric',
                    'sec80d_medical_expenditure.*' => 'numeric',
                    'sec80d_medical_insurance_premium.*' => 'numeric',

                    'name_of_donee.*' => 'string',
                    'pan_of_donee.*' => 'string',
                    'donation_in_cash.*' => 'numeric',
                    'donation_in_other_mode.*' => 'numeric',
                    'donation_amount.*' => 'numeric',
                    'limit_of_deductions.*' => 'string',
                    'donation_qualifying_percent.*' => 'numeric',
                    'donee_pincode.*' => 'numeric',
                    'donee_state.*' => 'string',
                    'donee_city.*' => 'string',
                    'donee_address.*' => 'string',

                    'other_deduction_name.*' => 'string',
                    'other_deduction_amount.*' => 'numeric',

                    'sec80dd_uu_member' => 'string',
                    'sec80dd_uu_expenditure' => 'numeric',
                    'sec80dd_uu_disability_percentage' => 'string',

                    'sec80ddb_citizen' => 'string',
                    'sec80ddb_expenditure' => 'numeric',

                    'sec80e_int_on_edu_loan' => 'numeric',
                    'sec80gg_rent_paid' => 'numeric',
                    'sec80gg_num_of_months' => 'numeric',
                ];
                $request->validate($validation_rules);

                /* $validator = \Validator::make($request->all(), $validation_rules);
                if ($validator->fails()) {
                return response()->json(['message' => $validator->errors(), 'status' => 400, 'success' => false, 'data' => null], 400);
                } */

                $sec80d_deductions = json_encode([
                    'sec80d_medical_insurance' => $request->sec80d_medical_insurance,
                    'sec80d_policy_holder_aged_60' => $request->sec80d_policy_holder_aged_60,
                    'sec80d_health_checkup' => $request->sec80d_health_checkup,
                    'sec80d_medical_expenditure' => $request->sec80d_medical_expenditure,
                    'sec80d_medical_insurance_premium' => $request->sec80d_medical_insurance_premium,
                ]);

                $donations = json_encode([
                    'name_of_donee' => $request->name_of_donee,
                    'pan_of_donee' => $request->pan_of_donee,
                    'donation_in_cash' => $request->donation_in_cash,
                    'donation_in_other_mode' => $request->donation_in_other_mode,
                    'donation_amount' => $request->donation_amount,
                    'limit_of_deductions' => $request->limit_of_deductions,
                    'donation_qualifying_percent' => $request->donation_qualifying_percent,
                    'donee_pincode' => $request->donee_pincode,
                    'donee_state' => $request->donee_state,
                    'donee_city' => $request->donee_city,
                    'donee_address' => $request->donee_address,
                ]);

                $other_deductions = json_encode([
                    'other_deduction_name' => $request->other_deduction_name,
                    'other_deduction_amount' => $request->other_deduction_amount,
                ]);

                $row = [
                    'sec80c_lic_premium' => $request->sec80c_lic_premium,
                    'sec80c_pf' => $request->sec80c_pf,
                    'sec80c_ppf' => $request->sec80c_ppf,
                    'sec80c_housing_loan_repayment' => $request->sec80c_housing_loan_repayment,
                    'sec80c_fdr' => $request->sec80c_fdr,
                    'sec80c_nsc' => $request->sec80c_nsc,
                    'sec80c_tuition_fee' => $request->sec80c_tuition_fee,
                    'sec80c_paid_to_annuity' => $request->sec80c_paid_to_annuity,
                    'sec80c_other_deductions' => $request->sec80c_other_deductions,
                    'sec80d_deductions' => $sec80d_deductions,
                    'donations' => $donations,
                    'other_deductions' => $other_deductions,
                    'sec80dd_uu_member' => $request->sec80dd_uu_member,
                    'sec80dd_uu_expenditure' => $request->sec80dd_uu_expenditure,
                    'sec80dd_uu_disability_percentage' => $request->sec80dd_uu_disability_percentage,
                    'sec80ddb_citizen' => $request->sec80ddb_citizen,
                    'sec80ddb_expenditure' => $request->sec80ddb_expenditure,
                    'sec80e_int_on_edu_loan' => $request->sec80e_int_on_edu_loan,
                    'sec80gg_rent_paid' => $request->sec80gg_rent_paid,
                    'sec80gg_num_of_months' => $request->sec80gg_num_of_months,
                    'itr_sources_id' => $request->itr_sources_id,
                ];

                if (isset($request->id) && ($request->id != null)) {
                    // do update
                    $record = ItrDeduction::findOrFail($request->id);
                    $record->update($row);

                } else {
                    // create
                    $record = new ItrDeduction($row);
                    $record->save();

                }
                return redirect()->route('tr/user/itr-deductions', ['id' => $request->itr_sources_id])->with(['success' => 'Deductions saved successfully.']);

            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_bank_details(Request $request)
    {
        $user = Auth::user();
        $itr_bank_details = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';
        $id = '';

        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_bank_details = ItrBankDetail::where('itr_sources_id', $itr_sources_id)->first();
                    $id = isset($itr_bank_details) ? $itr_bank_details->id : '';
                }

                return view('tr.client.itr.itr_bank_details', compact('itr_bank_details', 'id', 'itr_sources_id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_bank_details_save(Request $request)
    {
        $user = Auth::user();
        $itr_bank_details = [];
        try {
            if (auth()->user()->can('create itr_sources')) {

                $validation_rules = [
                    'ifsc_code_of_the_bank.*' => 'string',
                    'name_of_the_bank.*' => 'string',
                    'account_number.*' => 'string',
                    'use_this_for_refund' => 'string',
                    'aadhar_info' => 'string|min:12|max:12',
                ];
                $request->validate($validation_rules);

                $bank_info = json_encode([
                    'ifsc_code_of_the_bank' => $request->ifsc_code_of_the_bank,
                    'name_of_the_bank' => $request->name_of_the_bank,
                    'account_number' => $request->account_number,
                    'use_this_for_refund' => $request->use_this_for_refund,
                ]);

                $row = [
                    'bank_info' => $bank_info,
                    'aadhar_info' => $request->aadhar_info,
                    'itr_sources_id' => $request->itr_sources_id,
                ];

                if (isset($request->id) && ($request->id != null)) {
                    // do update
                    $record = ItrBankDetail::findOrFail($request->id);
                    $record->update($row);
                } else {
                    // create
                    $record = new ItrBankDetail($row);
                    $record->save();
                }

                return redirect()->route('tr/user/itr-bank-details', ['id' => $request->itr_sources_id])->with(['success' => 'Bank details saved successfully.']);

            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_prepaid_tax(Request $request)
    {
        $user = Auth::user();
        $itr_prepaid_tax = [];
        $itr_sources_id = isset($request->id) ? $request->id : '';
        $id = '';

        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_prepaid_tax = ItrDeduction::where('id', $request->id)->first();
                    $id = isset($itr_bank_details) ? $itr_bank_details->id : '';

                }

                return view('tr.client.itr.itr_prepaid_tax', compact('itr_prepaid_tax', 'id', 'itr_sources_id'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_return_type_details(Request $request)
    {
        $user = Auth::user();
        $itr_return_type_details = [];
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_return_type_details = ItrDeduction::where('id', $request->id)->get();
                }

                return view('tr.client.itr.itr_return_type_details', compact('itr_return_type_details'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function itr_calculation(Request $request)
    {
        $user = Auth::user();
        $itr_calculate = [];
        try {
            if (auth()->user()->can('create itr_sources')) {
                if (isset($request->id)) {
                    $itr_calculate = ItrDeduction::where('id', $request->id)->get();
                }

                return view('tr.client.itr.itr_calculate', compact('itr_calculate'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function load_template_part(Request $request)
    {
        switch ($request->action) {
            case 'other_allowances':
                $index = $request->index;
                $salary_box_index = $request->salary_box_index;
                $allowance_name = '';
                $allowance_amount = '';
                return view('tr.client.itr.template-parts.other-allowances', compact('index', 'allowance_name', 'allowance_amount', 'salary_box_index'));
                break;
            case 'salary_details':
                $index = $request->index;
                $itr_employment_detail = [];
                return view('tr.client.itr.template-parts.salary-details', compact('index', 'itr_employment_detail'));
                break;
            case 'business_income_box':
                $index = $request->index;
                //$presumptive_business_income = [];
                $business_nature = '';
                $name_of_the_business = '';
                $gross_turnover_receipt = '';
                $total_presumptive_income = '';
                return view('tr.client.itr.template-parts.presumptive-business-income', compact('index', 'business_nature',
                    'name_of_the_business',
                    'gross_turnover_receipt',
                    'total_presumptive_income'));
                break;
            case 'exempted_income_box':
                $index = $request->index;
                $exempted_income_source = '';
                $exempted_income_amount = '';
                return view('tr.client.itr.template-parts.exempt-income-reporting', compact('index', 'exempted_income_source', 'exempted_income_amount'));
                break;

            case 'bank_block_box':
                $index = $request->index;
                return view('tr.client.itr.template-parts.bank-details', compact('index'));
                break;

            case 'sec80d_block_box':
                $index = $request->index;
                $sec80d_medical_insurance = '';
                $sec80d_policy_holder_aged_60 = '';
                $sec80d_health_checkup = '';
                $sec80d_medical_expenditure = '';
                $sec80d_medical_insurance_premium = '';

                return view('tr.client.itr.template-parts.sec80d-block', compact('index', 'sec80d_medical_insurance', 'sec80d_medical_insurance', 'sec80d_policy_holder_aged_60', 'sec80d_health_checkup', 'sec80d_medical_expenditure', 'sec80d_medical_insurance_premium'));
                break;
            case 'donation_box':
                $index = $request->index;
                //$exempted_income_source = '';
                //$exempted_income_amount = '';
                return view('tr.client.itr.template-parts.donation-box', compact('index'));
                break;
            case 'other_deduction_box':
                $index = $request->index;
                return view('tr.client.itr.template-parts.other-deductions', compact('index'));
                break;
            default:
                # code...
                break;
        }

    }

    public function get_cities(Request $request)
    {
        $cities = [];
        try {
            if (auth()->user()->can('list cities')) {
                if (isset($request->state_id)) {
                    $cities = City::where('state_id', $request->state_id)->orderBy('name', 'ASC')->get();
                }
                return response()->json(['cities' => $cities, 'status' => 1, 'message' => 'cities found!']);
            } else {
                return response()->json(['cities' => $cities, 'status' => 0, 'message' => 'Un-authorized access!']);
            }
        } catch (\Exception $e) {
            return response()->json(['cities' => $cities, 'status' => 0, 'message' => $e->getMessage()]);
        }

    }

    public function get_file_url($filename)
    {
        $file_path = storage_path('app/documents/') . $filename;
        // Check if file exists in app/storage/file folder
        if (file_exists($file_path)) {
            // Send Download
            return \Response::download($file_path, $filename, [
                'Content-Length: ' . filesize($file_path),
            ]);
        } else {
            // Error
            exit('Requested file does not exist on our server!');
        }

    }
}