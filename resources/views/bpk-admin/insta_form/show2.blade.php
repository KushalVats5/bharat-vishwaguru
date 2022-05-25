<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View->')}} {{ $form->name }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">form Detail </th>
                    </tr>

                    <tr>
                        <th width="200">Order Status</th>
                        <td>{{ $form->order_status }}</td>
                    </tr>

                    <tr>
                        <th width="200">Order Id</th>
                        <td>{{ $form->order_id }}</td>
                    </tr>


                    <tr>
                        <th>Date Created</th>
                        <td>{{ $form->created_at }}</td>
                    </tr>

                    <tr>
                        <th width="200">User Plan Name</th>
                        <td>{{ $form->user_plan_name }}</td>
                    </tr>


                    <tr>
                        <th>Tracking Id</th>
                        <td>{{ $form->tracking_id }}</td>
                    </tr>

                    <tr>
                        <th width="200">Bank Ref no.</th>
                        <td>{{ $form->bank_ref_no }}</td>
                    </tr>


                    <tr>
                        <th>Payment Mode </th>
                        <td>{{ $form->payment_mode }}</td>
                    </tr>

                    <tr>
                        <th width="200">Card Name</th>
                        <td>{{ $form->card_name }}</td>
                    </tr>


                    <tr>
                        <th>Amount</th>
                        <td>{{ $form->amount }}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Name</th>
                        <td>{{ $form->billing_name }}</td>
                    </tr>


                    <tr>
                        <th>Billing Address</th>
                        <td>{{ $form->billing_address }}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing City</th>
                        <td>{{ $form->billing_city }}</td>
                    </tr>


                    <tr>
                        <th>Billing State</th>
                        <td>{{ $form->billing_state }}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Zip</th>
                        <td>{{ $form->billing_zip }}</td>
                    </tr>


                    <tr>
                        <th>Date Created</th>
                        <td>{{ $form->created_at }}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Country</th>
                        <td>{{ $form->billing_country }}</td>
                    </tr>


                    <tr>
                        <th>Billing Telephone</th>
                        <td>{{ $form->billing_tel }}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Email</th>
                        <td>{{ $form->billing_email }}</td>
                    </tr>


                    <tr>
                        <th>Delivery Name</th>
                        <td>{{ $form->delivery_name }}</td>
                    </tr>





                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>