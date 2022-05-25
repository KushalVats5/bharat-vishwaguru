<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{ __('View->') }} {{ $freelancer->name }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">Freelancer Detail </th>
                    </tr>

                    <tr>
                        <th width="200">Name</th>
                        <td>{{ $freelancer->name }}</td>
                    </tr>

                    <tr>
                        <th width="200">E-Mail</th>
                        <td>{{ $freelancer->email }}</td>
                    </tr>

                    <tr>
                        <th>DOB</th>
                        <td>{{ date('jS M Y', strtotime($freelancer->dob)) }}</td>
                    </tr>

                    <tr>
                        <th>Mobile</th>
                        <td>{{ $freelancer->mobile }}</td>
                    </tr>

                    <tr>
                        <th>Father Name</th>
                        <td>{{ $freelancer->father_name }}</td>
                    </tr>

                    <tr>
                        <th>Aadhar</th>
                        <td>{{ $freelancer->aadharno }}</td>
                    </tr>

                    <tr>
                        <th>Pan</th>
                        <td>{{ $freelancer->pan }}</td>
                    </tr>

                    <tr>
                        <th>Qualification</th>
                        <td>{{ $freelancer->qualification }}</td>
                    </tr>

                    <tr>
                        <th>Experience</th>
                        <td>{{ $freelancer->experience }}</td>
                    </tr>

                    <tr>
                        <th>Flat</th>
                        <td>{{ $freelancer->flat }}</td>
                    </tr>

                    <tr>
                        <th>Road No</th>
                        <td>{{ $freelancer->road_no }}</td>
                    </tr>

                    <tr>
                        <th>Area</th>
                        <td>{{ $freelancer->area }}</td>
                    </tr>

                    <tr>
                        <th>district</th>
                        <td>{{ $freelancer->distic }}</td>
                    </tr>

                    <tr>
                        <th>State</th>
                        <td>{{ $freelancer->state }}</td>
                    </tr>

                    <tr>
                        <th>Pincode</th>
                        <td>{{ $freelancer->pincode }}</td>
                    </tr>

                    <tr>
                        <th>Payment Status</th>
                        <td>{{ $freelancer->payment_status }}</td>
                    </tr>

                    <tr>
                        <th>Bank</th>
                        @php
                            $bank = null;
                            $bank = json_decode($freelancer->bank);
                        @endphp
                        <tr>
                            <td><strong>ifsc:</strong>{{ isset($bank->ifsc) ? $bank->ifsc : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>name:</strong>{{ isset($bank->name) ? $bank->name : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>branch:</strong>{{ isset($bank->branch) ? $bank->branch : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>centre:</strong>{{ isset($bank->centre) ? $bank->centre : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>district:</strong>{{ isset($bank->district) ? $bank->district : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>state:</strong>{{ isset($bank->state) ? $bank->state : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>adddress:</strong>{{ isset($bank->adddress) ? $bank->adddress : '-' }}</td>
                        </tr>
                    </tr>

                    <tr>
                        <th>Date Created</th>
                        <td>{{ date('jS M Y', strtotime($freelancer->created_at)) }}</td>
                    </tr>


                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
