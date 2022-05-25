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
                        <th width="200">Title</th>
                        <td>{{ $form->pancard }}</td>
                    </tr>

                    <tr>
                        <th>Are You</th>
                        <td>{{ $form->are_you }}</td>
                    </tr>

                    <tr>
                        <th>Date Created</th>
                        <td>{{ date_format($form->created_at, 'jS M Y') }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Date of Birth')}}</th>
                        <td> {{ $form->dob }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Father Name')}}</th>
                        <td> {{ $form->father_name }} </td>
                    </tr>

                    
                    <tr>
                        <th>{{__('Mobile No*')}}</th>
                        <td>{{ $form->mobile_no }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Email address*')}}</th>
                        <td>{{ $form->email }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Income tax password')}}</th>
                        <td>{{ $form->income_tax_password }}</td>
                    </tr>


                    <tr>
                        <th>{{__('Aadhar Number')}}</th>
                        <td>{{ $form->addhar_number }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Bank Information')}}</th>
                        <td>{{ $form->bank_information }}</td>
                    </tr>

                    <tr>
                        <th>{{__('IFSC code')}}</th>
                        <td>{{ $form->ifsc_code }}</td>
                    </tr>
                    <tr>
                        <th>{{__('User id')}}</th>
                        <td>{{ $form->user_id }}</td>
                    </tr>
                    <tr>
                        <th>{{__('Comment')}}</th>
                        <td>{{ $form->comment }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Comment')}}</th>
                        <td>{{ $form->comment }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>