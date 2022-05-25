<?php

namespace App\Http\Controllers\TR\Client;

use App\City;
use App\GstFiling;
use App\GstInfo;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Job;
use App\ServicePlan;
use App\ServiceSubscription;
use App\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Softon\Indipay\Facades\Indipay;

class GSTController extends Controller
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
        $user = Auth::user();

        try {
            if (auth()->user()->can('list GstInfo')) {
                $gst_infos = GstInfo::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
                return view('tr.client.gst.index', compact('gst_infos'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    public function add_GST_info()
    {
        $user = Auth::user();
        $assesment_years = [];
        $cities = [];
        $assesment_years = Helper::financial_years_generator(3);
        $service_plans = ServicePlan::where('service_type', 'gst return file')->where('status', 'active')->get();
        $states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();

        try {
            if (auth()->user()->can('create GstInfo')) {
                return view('tr.client.gst.add_gst_info', compact('assesment_years', 'service_plans', 'states', 'cities'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function edit_GST_info(Request $request)
    {
        $user = Auth::user();
        $assesment_years = [];
        $service_plans = [];
        $cities = [];
        $gst_info = GstInfo::findOrFail($request->id);
        $assesment_years = Helper::generate_assesment_years(3);
        $service_subscription = ServiceSubscription::where('service_type', 'gst return file')->where('service_id', $gst_info->id)->with('service_plan')->first();
        $states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();
        $cities = City::where('state_id', $gst_info->state)->orderBy('name', 'ASC')->get();

        try {
            if (auth()->user()->can('edit GstInfo')) {
                return view('tr.client.gst.add_gst_info', compact('gst_info', 'assesment_years', 'service_plans', 'service_subscription', 'states', 'cities'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function save_GST_info(Request $request)
    {
        $user = Auth::user();
        $assesment_years = [];
        $cities = [];
        //$assesment_years = Helper::generate_assesment_years(3);
        $assesment_years = Helper::financial_years_generator(3);

        $service_plans = ServicePlan::where('service_type', 'gst return file')->where('status', 'active')->get();
        $states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();

        //$cities = City::where('state_id', $itr_personal_detail->state)->orderBy('name', 'ASC')->get();

        if (auth()->user()->can('create GstInfo')) {

            if (isset($request->id)) {
                $record = GstInfo::findOrFail($request->id);

                $request->validate([

                    'gst_no' => 'required|min:15|max:20|unique:gst_infos,gst_no,' . $record->id,
                    'firm_name' => 'required|min:5',
                    'owner_name' => 'required|min:5|max:100',
                    'gst_username' => 'required',
                    'gst_passcode' => 'required',
                    'flat_no' => 'required',
                    'premises' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required|min:6|numeric',
                    'email_id' => 'required',
                    'phone_no' => 'required',
                    'bank_ac_number' => 'required',
                    'bank_ifsc' => 'required',
                    'bank_name' => 'required',
                ]);

                // update
                $update = [
                    'gst_no' => $request->gst_no,
                    'firm_name' => $request->firm_name,
                    'owner_name' => $request->owner_name,
                    'gst_username' => $request->gst_username,
                    'gst_passcode' => $request->gst_passcode,
                    'flat_no' => $request->flat_no,
                    'premises' => $request->premises,
                    'street' => $request->street,
                    'locality' => $request->locality,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'email_id' => $request->email_id,
                    'phone_no' => $request->phone_no,
                    'bank_ac_number' => $request->bank_ac_number,
                    'bank_ifsc' => $request->bank_ifsc,
                    'bank_name' => $request->bank_name,
                ];
                $record->update($update);

                return redirect()->route('tr/user/gst-return-file', ['id' => $record->id])->with(['success' => 'GST Info updated successfully.']);
            } else {
                $request->validate([
                    'service_plan' => 'required',
                    'gst_no' => 'required|min:15|max:20|unique:gst_infos',
                    'firm_name' => 'required|min:5',
                    'owner_name' => 'required|min:5|max:100',
                    'gst_username' => 'required',
                    'gst_passcode' => 'required',
                    'flat_no' => 'required',
                    'premises' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required|min:6|numeric',
                    'email_id' => 'required',
                    'phone_no' => 'required',
                    'bank_ac_number' => 'required',
                    'bank_ifsc' => 'required',
                    'bank_name' => 'required',
                    'financial_year' => 'required',
                    'quarter' => 'required',
                    'return_to_be_file' => 'required',
                ]);

                // create new
                $record = new GstInfo([
                    'gst_no' => $request->gst_no,
                    'firm_name' => $request->firm_name,
                    'owner_name' => $request->owner_name,
                    'gst_username' => $request->gst_username,
                    'gst_passcode' => $request->gst_passcode,
                    'flat_no' => $request->flat_no,
                    'premises' => $request->premises,
                    'street' => $request->street,
                    'locality' => $request->locality,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'email_id' => $request->email_id,
                    'phone_no' => $request->phone_no,
                    'bank_ac_number' => $request->bank_ac_number,
                    'bank_ifsc' => $request->bank_ifsc,
                    'bank_name' => $request->bank_name,
                    'user_id' => $user->id,
                ]);
                $record->save();
                $service_id = $record->id;

                // save plan info ServiceSubscription
                $service_plan = ServicePlan::where('id', $request->service_plan)->first();

                // calculate package valadity months
                //$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                $months = ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'];
                $package_valadity = [];

                $fin_year = $request->financial_year;
                switch ($service_plan->duration_unit) {
                    case 'month(s)':

                        $start_from = array_search($request->return_to_be_file, $months);
                        $end_at = ($start_from + $service_plan->duration - 1);
                        $count = 1;
                        for ($i = $start_from; $i <= $end_at; $i++) {
                            if ($count > 1) {
                                if ($months[$i] == 'Apr') {
                                    $fin_year = $assesment_years[array_search($fin_year, $assesment_years) + 1];
                                }
                            }
                            $package_valadity[] = ['month' => $months[$i], 'year' => $fin_year, 'is_filed' => 0];
                            $count++;
                        }
                        break;
                    case 'year(s)':

                        $start_from = array_search($request->return_to_be_file, $months);
                        $end_at = ($start_from + 12 - 1);
                        $count = 1;
                        for ($i = $start_from; $i <= $end_at; $i++) {
                            if ($count > 1) {
                                if ($months[$i] == 'Apr') {
                                    $fin_year = $assesment_years[array_search($fin_year, $assesment_years) + 1];
                                }
                            }
                            $package_valadity[] = ['month' => $months[$i], 'year' => $fin_year, 'is_filed' => 0];
                            $count++;
                        }
                        break;
                    default:
                        $package_valadity[] = ['month' => $request->return_to_be_file, 'year' => $fin_year, 'is_filed' => 0];
                        break;
                }

                $record = new ServiceSubscription([
                    'service_id' => $service_id,
                    'service_plan_id' => $request->service_plan,
                    'payment_status' => 'Unknown',
                    'currency' => 'INR',
                    'amount' => $service_plan->price,
                    'user_id' => $user->id,
                    'plan_duration' => $service_plan->duration,
                    'plan_duration_unit' => $service_plan->duration_unit,
                    'plan_price' => $service_plan->price,
                    'service_type' => $service_plan->service_type,
                    'financial_year' => $request->financial_year,
                    'financial_year_quarter' => $request->quarter,
                    'retrun_to_be_file_from' => $request->return_to_be_file,
                    'valadity_of_plan_package' => json_encode($package_valadity),
                ]);
                $record->save();
                return redirect()->route('tr/user/gst-return-file/view', ['id' => $service_id])->with(['success' => 'GST Info saved successfully.']);
            }

            return view('tr.client.gst.add_gst_info', compact('assesment_years', 'service_plans', 'states', 'cities'));
        } else {
            throw new Exception('You don\'t have a rights to perform this action');
        }

    }

    public function view_GST_info(Request $request)
    {
        $id = $request->id;
        $record = GstInfo::findOrFail($request->id);
        $service_subscriptions = ServiceSubscription::where('service_id', $id)->orderBy('id', 'DESC')->get();
        return view('tr.client.gst.view_gst_info', ['gst_info' => $record, 'service_subscriptions' => $service_subscriptions]);
    }

    public function add_bills(Request $request)
    {
        $gst_info = GstInfo::where('id', $request->id)->first();
        $plan_validity = [];

        $service_subscriptions = ServiceSubscription::where('service_id', $gst_info->id)->where('payment_status', 'Success')->orderBy('id', 'DESC')->get();
        if ($service_subscriptions) {
            foreach ($service_subscriptions as $service_subscription) {
                $valadity = json_decode($service_subscription->valadity_of_plan_package);
                foreach ($valadity as $val) {
                    if ($val->is_filed != 1) {
                        $plan_validity[$val->year][] = $val->month;
                    }
                }
            }
        }
        return view('tr.client.gst.add_bills', compact('gst_info', 'plan_validity'));

    }

    public function save_bills(Request $request)
    {
        $user = Auth::user();
        $json_filename = '';
        $purchase_bills_filename = [];
        $sales_bills_filename = [];
        $plan_validity = [];
        $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png'];

        $request->validate([
            'gst_info_id' => 'required|numeric',
            'financial_year' => 'required',
            'month' => 'required|min:3|max:3',
            'is_file_nill' => 'required|min:1|max:1',
            'is_json_bills' => 'min:1|max:1',
            'sales_bills.*' => 'max:10000|mimes:pdf',
            'purchase_bills.*' => 'max:10000|mimes:pdf',
            'json_bills.*' => 'max:10000|mimes:json',
        ]);

        if ($request->is_json_bills == 1) {
            /// upload json bills
            if ($request->hasFile('json_bills')) { // upload photo if set
                $file = $request->file('json_bills');
                $json_filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $json_filename);
            }
        } else {

            /// upload sales bills
            if ($request->hasFile('sales_bills')) { // upload photo if set
                $files = $request->file('sales_bills');
                $count = 0;
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (in_array($extension, $allowedfileExtension)) {
                        $sales_bills_filename[$count] = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                        $path = storage_path('app/documents/');
                        $file->move($path, $sales_bills_filename[$count]);
                        $count++;
                    }
                }
            }

            /// upload purchase bills
            if ($request->hasFile('purchase_bills')) { // upload photo if set
                $files = $request->file('purchase_bills');
                $count = 0;
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (in_array($extension, $allowedfileExtension)) {
                        $purchase_bills_filename[$count] = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                        $path = storage_path('app/documents/');
                        $file->move($path, $purchase_bills_filename[$count]);
                        $count++;
                    }
                }
            }

        }

        /// get subscription plan id
        $gst_info = GstInfo::where('id', $request->gst_info_id)->first();
        $service_subscriptions = ServiceSubscription::where('service_id', $gst_info->id)->where('payment_status', 'Success')->orderBy('id', 'DESC')->get();
        $service_subscription_plan_id = 0;
        if ($service_subscriptions) {
            foreach ($service_subscriptions as $service_subscription) {
                $valadity = json_decode($service_subscription->valadity_of_plan_package);
                foreach ($valadity as $val) {
                    if (($val->is_filed != 1) && ($val->year == $request->financial_year) && ($val->month == $request->month)) {
                        //$plan_validity[$val->year][] = $val->month;
                        $service_subscription_plan_id = $service_subscription->id;
                        break;
                    }
                }
                if ($service_subscription_plan_id != 0) {
                    break;
                }
            }
        }

        // create new
        $record = new GstFiling([
            'gst_info_id' => $request->gst_info_id,
            'service_plan_id' => $service_subscription_plan_id,
            'financial_year' => $request->financial_year,
            'month' => $request->month,
            'is_file_nill' => $request->is_file_nill,
            'is_json_bills' => $request->is_json_bills ?? '',
            'sales_bills' => json_encode($sales_bills_filename),
            'purchase_bills' => json_encode($purchase_bills_filename),
            'json_bills' => json_encode($json_filename),
        ]);
        $record->save();
        // update subscription plan for used package month year
        $serv_subscription = ServiceSubscription::where('id', $service_subscription_plan_id)->first();
        if ($serv_subscription) {
            $new_valadity = [];
            $valadity = json_decode($serv_subscription->valadity_of_plan_package);
            foreach ($valadity as $val) {
                if (($val->is_filed != 1) && ($val->year == $request->financial_year) && ($val->month == $request->month)) {
                    $new_valadity[] = ['year' => $val->year, 'month' => $val->month, 'is_filed' => 1];
                } else {
                    $new_valadity[] = $val;
                }
            }
            $serv_subscription->update(['valadity_of_plan_package' => json_encode($new_valadity)]);

        }

        // create job for this request.
        $job_data = [
            'title' => 'GstFiling Job',
            'jobable_type' => 'App\GstFiling',
            'jobable_id' => $record->id,
            'user_id' => $user->id,
            'status' => 'created',
            'description' => '',
            'price' => 10,
            'price_type' => 'percentage',
        ];
        $job = new Job($job_data);
        $job->save();

        return redirect()->route('tr/user/gst-return-file')->with(['success' => 'Bills added successfully.']);

    }

    public function view_GST_return(Request $request)
    {
        $returns = GstFiling::where('gst_info_id', $request->id)->orderBy('id', 'DESC')->paginate(10);
        return view('tr.client.gst.list_returns', compact('returns'));

    }

    public function payment(Request $request)
    {
        $service_subscription_id = $request->id;
        $type = $request->type;
        //
        $service_subscription = ServiceSubscription::where('id', $service_subscription_id)->first();
        if ($service_subscription) {
            if ($type == 'gst-filing') {
                switch ($type) {
                    case 'gst-filing':
                        $service = $service_subscription->gst_filing_service;
                        break;
                    default:
                        $service = false;
                        break;
                }
            }

            $parameters['amount'] = $service_subscription->amount;
            $parameters['name'] = '';
            $parameters['email'] = '';
            $parameters['order_id'] = 'tr-ord-' . $service_subscription_id;
            $parameters['billing_name'] = '';
            $parameters['billing_address'] = '';
            $parameters['billing_city'] = '';
            $parameters['billing_state'] = '';
            $parameters['billing_zip'] = '';
            $parameters['billing_country'] = '';
            $parameters['billing_tel'] = '';
            $parameters['billing_email'] = '';
            $parameters['merchant_param1'] = 'n/a';
            $parameters['merchant_param2'] = 'n/a';
            $parameters['merchant_param3'] = 'n/a';
            if ($service) {
                $parameters['name'] = $service->owner_name;
                $parameters['email'] = $service->email_id;
                $parameters['billing_name'] = $service->firm_name;
                $parameters['billing_address'] = $service->flat_no . ' ' . $service->premises . ' ' . $service->street . ' ' . $service->locality;
                $parameters['billing_city'] = $service->city_name->name;
                $parameters['billing_state'] = $service->state_name->name;
                $parameters['billing_zip'] = $service->zipcode;
                $parameters['billing_country'] = 'India';
                $parameters['billing_tel'] = $service->phone_no;
                $parameters['billing_email'] = $service->email_id;
                $parameters['merchant_param1'] = 'payment for GST Filing';

            }

        } else {
            return redirect()->route('tr/user/un-authorized')->with('warning', 'No such service subscription found!');
        }

        try {
            $order = Indipay::gateway('CCAvenue')->prepare($parameters);
            return Indipay::process($order);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function test_payment()
    {
        $parameters = [
            'amount' => '100.00',
            'name' => 'Happy GST Service',
            'email' => 'happy@getnada.com',
            'order_id' => '10001-' . rand(9, 9999),
            'billing_name' => 'Happy Singh',
            'billing_address' => '458, new Colony',
            'billing_city' => 'Delhi',
            'billing_state' => 'Delhi',
            'billing_zip' => '110096',
            'billing_country' => 'India',
            'billing_tel' => '4578457845',
            'billing_email' => 'happy@getnada.com',
            'merchant_param1' => 'Test payment for GST Service',
        ];

        try {
            $order = Indipay::gateway('CCAvenue')->prepare($parameters);
            return Indipay::process($order);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function back_to_seller(Request $request)
    {
        // For Otherthan Default Gateway
        $response = Indipay::gateway('CCAvenue')->response($request);
        $service_subscription_id = str_replace('tr-ord-', '', $response['order_id']);
        $service_subscription = ServiceSubscription::where('id', $service_subscription_id)->first();

        //dd($response);

        $txn_date = \DateTime::createFromFormat('d/m/Y H:i:s', $response['trans_date']);

        $update = [
            'payment_status' => trim($response['order_status']),
            'transaction_id' => $response['bank_ref_no'],
            'order_id' => $response['order_id'],
            'tracking_id' => $response['tracking_id'],
            'payment_mode' => $response['payment_mode'],
            'billing_name' => $response['billing_name'],
            'billing_address' => $response['billing_address'],
            'billing_city' => $response['billing_city'],
            'billing_state' => $response['billing_state'],
            'billing_zipcode' => $response['billing_zip'],
            'txn_date' => $txn_date->format('Y-m-d H:i:s'),
            'response_code' => $response['response_code'],
            'start_date' => date('Y-m-d', time()),
        ];
        $service_subscription->update($update);
        switch ($response['order_status']) {
            case 'Success':
                $message = ['success' => 'Payment successfull.'];
                break;
            case 'Aborted':
                $message = ['warning' => $response['failure_message']];
                break;
            case 'Failure':
                $message = ['warning' => $response['failure_message']];
                break;

            default:
                $message = ['warning' => $response['failure_message']];
                break;
        }
        return redirect()->route('tr/user/gst-return-file/view', ['id' => $service_subscription->service_id])->with($message);

    }
}