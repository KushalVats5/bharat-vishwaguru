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

                    @for ($i = 0; $i < count($bank_name); $i++)
                    @php
                        $j = 1;
                    @endphp
                    <tr>
                        <th width="200">Bank Name {{$j}}</th>
                        <td>{{ $bank_name[$i] }}</td>
                    </tr>
                        
                    <tr>
                        <th width="200">Ifsc code {{$j}}</th>
                        <td>{{ $bank_ifsc[$i] }}</td>
                    </tr>

                    <tr>
                        <th width="200">Account Number {{$j}}</th>
                        <td>{{ $bank_account_number[$i] }}</td>
                    </tr>

                    <tr>
                        <th width="200">Tick for Bamk Refund </th>
                        <td>{{ $tick_account_for_refund[$i] }}</td>
                    </tr>
                    @php
                        $j++;
                    @endphp
                    @endfor

                    <tr>
                        <th width="200">Pancard</th>
                        <td>{{ $form->pancard }}</td>
                    </tr>


                    <tr>
                        <th>Date Created</th>
                        <td>{{ date_format($form->created_at, 'jS M Y') }}</td>
                    </tr>

                    <tr>
                        <th width="200">Name</th>
                        <td>{{ $form->name }}</td>
                    </tr>

                    <tr>
                        <th width="200">Date of Birth</th>
                        <td>{{ $form->dob }}</td>
                    </tr>

                    <tr>
                        <th width="200">Father Name</th>
                        <td>{{ $form->father_name }}</td>
                    </tr>

                    <tr>
                        <th width="200">Gender</th>
                        <td>{{ $form->gender }}</td>
                    </tr>

                    <tr>
                        <th width="200">Aadhar Number</th>
                        <td>{{ $form->aadhar_number }}</td>
                    </tr>

                    <tr>
                        <th width="200">Flat No.</th>
                        <td>{{ $form->flat_no }}</td>
                    </tr>

                    <tr>
                        <th width="200">Name of Premises</th>
                        <td>{{ $form->name_of_premises }}</td>
                    </tr>

                    <tr>
                        <th width="200">Road</th>
                        <td>{{ $form->road }}</td>
                    </tr>

                    <tr>
                        <th width="200">Area</th>
                        <td>{{ $form->area }}</td>
                    </tr>

                    <tr>
                        <th width="200">Town</th>
                        <td>{{ $form->town }}</td>
                    </tr>

                    <tr>
                        <th width="200">Pancard</th>
                        <td>{{ $form->pancard }}</td>
                    </tr>

                    <tr>
                        <th width="200">State</th>
                        <td>{{ $form->state }}</td>
                    </tr>

                    <tr>
                        <th width="200">Pincode</th>
                        <td>{{ $form->pincode }}</td>
                    </tr>

                    <tr>
                        <th width="200">Mobile Number</th>
                        <td>{{ $form->mobile_no }}</td>
                    </tr>

                    <tr>
                        <th width="200">Email</th>
                        <td>{{ $form->email_address }}</td>
                    </tr>

                    <tr>
                        <th width="200">Residential Address</th>
                        <td>{{ $form->residential_status }}</td>
                    </tr>

                    <tr>
                        <th width="200">Employee Category</th>
                        <td>{{ $form->employer_category }}</td>
                    </tr>

                    <tr>
                        <th width="200">Filling Status</th>
                        <td>{{ $form->filing_status }}</td>
                    </tr>

                    <tr>
                        <th width="200">Original Acknowledgement no.</th>
                        <td>{{ $form->original_acknowledgement_no }}</td>
                    </tr>

                    <tr>
                        <th width="200">Date of filling Original Return</th>
                        <td>{{ $form->date_of_filling_of_original_return }}</td>
                    </tr>

                    <tr>
                        <th width="200">Notice no.</th>
                        <td>{{ $form->notice_no }}</td>
                    </tr>

                    <tr>
                        <th width="200">comment</th>
                        <td>{{ $form->comment }}</td>
                    </tr>

                    <tr>
                        <th width="200">Pancard</th>
                        <td>{{ $form->pancard }}</td>
                    </tr>

                    <tr>
                        <th width="200">Efilling Password</th>
                        <td>{{ $form->efilling_password }}</td>
                    </tr>




                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>