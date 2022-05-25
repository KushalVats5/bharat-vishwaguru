<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View ')}} {{ 'User Payment & Plan Detail' }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">User Payment & Plan Detail </th>
                    </tr>
                    <tr>
                        <th width="200">Billing Email</th>
                        <td>{{ $UserPayment->billing_email }}</td>
                    </tr>
                    <tr>
                        <th width="200">Plan Name</th>
                        <td>{{ $UserPayment->plan->title }}</td>
                    </tr>
                    
                    <tr>
                        <th width="200">Tracking ID</th>
                        <td>{{ $UserPayment->tracking_id }}</td>
                    </tr>
                    <tr>
                        <th width="200">Bank Ref No</th>
                        <td>{{ $UserPayment->bank_ref_no }}</td>
                    </tr>
                    <tr>
                        <th width="200">Order Status</th>
                        <td>{{ $UserPayment->order_status }}</td>
                    </tr>
                    <tr>
                        <th width="200">Payment Mode</th>
                        <td>{{ $UserPayment->payment_mode }}</td>
                    </tr>
                    <tr>
                        <th width="200">Currency</th>
                        <td>{{ $UserPayment->currency }}</td>
                    </tr>
                    <tr>
                        <th width="200">Amount</th>
                        <td>{{ $UserPayment->amount }}</td>
                    </tr>
                    <tr>
                        <th>Transaction Date</th>
                        <td>{{ date('jS M Y', strtotime($UserPayment->trans_date)) }}</td>
                    </tr>
                    <tr>
                        <th>Date Created</th>
                        <td>{{ date('jS M Y', strtotime($UserPayment->created_at)) }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>