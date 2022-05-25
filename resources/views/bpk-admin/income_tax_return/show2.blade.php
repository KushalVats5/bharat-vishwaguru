<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View->')}} {{ (!empty($form->name) && isset($form->name)) ? $form->name.' Details' : 'Details' }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{-- {{dd($form)}} --}}
        <div class="modal-body">  
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">form Detail </th>
                    </tr>

                    <tr>
                        <th width="200">Order Status</th>
                        <td>{{ !empty($form->order_status) ? $form->order_status : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Order Id</th>
                        <td>{{ !empty($form->order_id) ? $form->order_id : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Date Created</th>
                        <td>{{ !empty($form->created_at) ? $form->created_at : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">User Plan Name</th>
                        <td>{{ !empty($form->user_plan_name) ? $form->user_plan_name : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Tracking Id</th>
                        <td>{{ !empty($form->tracking_id) ? $form->tracking_id : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Bank Ref no.</th>
                        <td>{{ !empty($form->bank_ref_no) ? $form->bank_ref_no : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Payment Mode </th>
                        <td>{{ !empty($form->payment_mode) ? $form->payment_mode : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Card Name</th>
                        <td>{{ !empty($form->card_name) ? $form->card_name : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Amount</th>
                        <td>{{ !empty($form->amount) ? $form->amount : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Name</th>
                        <td>{{ !empty($form->billing_name) ? $form->billing_name : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Billing Address</th>
                        <td>{{ !empty($form->billing_address) ? $form->billing_address : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing City</th>
                        <td>{{ !empty($form->billing_city) ? $form->billing_city : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Billing State</th>
                        <td>{{ !empty($form->billing_state) ? $form->billing_state : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Zip</th>
                        <td>{{ !empty($form->billing_zip) ? $form->billing_zip : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Date Created</th>
                        <td>{{ !empty($form->created_at) ? $form->created_at : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Country</th>
                        <td>{{ !empty($form->billing_country) ? $form->billing_country : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Billing Telephone</th>
                        <td>{{ !empty($form->billing_tel) ? $form->billing_tel : "N/A"}}</td>
                    </tr>

                    <tr>
                        <th width="200">Billing Email</th>
                        <td>{{ !empty($form->billing_email) ? $form->billing_email : "N/A"}}</td>
                    </tr>


                    <tr>
                        <th>Delivery Name</th>
                        <td>{{ !empty($form->delivery_name) ? $form->delivery_name : "N/A"}}</td>
                    </tr>





                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>