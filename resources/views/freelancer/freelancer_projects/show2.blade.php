<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View->')}} {{ $form->order_id }}</h5>
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
                        <th width="200">Tracking ID</th>
                        <td>{{ $form->tracking_id }}</td>
                    </tr>

                    <tr>
                        <th>Order Status</th>
                        <td>{{ $form->order_status }}</td>
                    </tr>

                    <tr>
                        <th>Date Created</th>
                        <td>{{ date_format($form->created_at, 'jS M Y') }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Payment Mode')}}</th>
                        <td> {{ $form->payment_mode }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Card Name')}}</th>
                        <td> {{ $form->card_name }} </td>
                    </tr>

                    
                    <tr>
                        <th>{{__('Amount')}}</th>
                        <td>{{ $form->amount }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Billing Name*')}}</th>
                        <td>{{ $form->billing_name }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Billing Address')}}</th>
                        <td>{{ $form->billing_address }}</td>
                    </tr>


                    <tr>
                        <th>{{__('Billing City')}}</th>
                        <td>{{ $form->billing_city }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Blling State')}}</th>
                        <td>{{ $form->billing_state }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Billing Zip')}}</th>
                        <td>{{ $form->billing_zip }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Billing Country')}}</th>
                        <td>{{ $form->billing_country }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Billing Telephone')}}</th>
                        <td>{{ $form->billing_tel }}</td>
                    </tr>
                    <tr>
                        <th>{{__('Billing Email')}}</th>
                        <td>{{ $form->billing_email }}</td>
                    </tr>



                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>