@extends('layouts.freelancer-auth')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    Job Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="job_id" id="job_id" value="{{ $job->id }}">
                            <table class="table table-bordered table-striped table-sm">
                                <tr>
                                    <td>Job Id</td>
                                    <td>#{{$job->id}}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $job->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$job->description}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="clear-fix">&nbsp;</div>
                            <label for=""><strong> Details</strong></label>
                            @if($job->jobable_type == 'App\GstFiling')
                            <table class="table table-bordered table-striped table-sm">
                                <tr>
                                    <td>GST No.</td>
                                    <td>{{ $job->jobable->gst_info->gst_no }}</td>
                                </tr>
                                <tr>
                                    <td>Firm Name</td>
                                    <td>{{ $job->jobable->gst_info->firm_name }}</td>
                                </tr>
                                <tr>
                                    <td>Owner Name</td>
                                    <td>{{ $job->jobable->gst_info->owner_name }}</td>
                                </tr>
                                <tr>
                                    <td>GST Username</td>
                                    <td>{{ $job->jobable->gst_info->gst_username }}</td>
                                </tr>
                                <tr>
                                    <td>GST Password</td>
                                    <td>{{ $job->jobable->gst_info->gst_passcode }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $job->jobable->gst_info->city_name->name }},
                                        {{ $job->jobable->gst_info->state_name->name }}</td>
                                </tr>
                                <tr>
                                    <td>Contacts</td>
                                    <td>{{ $job->jobable->gst_info->email_id }}, {{ $job->jobable->gst_info->phone_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bank Details</td>
                                    <td>{{ $job->jobable->gst_info->bank_ac_number }},
                                        {{ $job->jobable->gst_info->bank_name }},
                                        {{ $job->jobable->gst_info->bank_ifsc }}</td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td>{{ $job->owner->name }}</td>
                                </tr>
                                <tr>
                                    <td>Month</td>
                                    <td>{{ $job->jobable->month }}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>{{ $job->jobable->financial_year }}</td>
                                </tr>
                                <tr>
                                    <td>Is File Nill</td>
                                    <td>{{ $job->jobable->is_file_nill?'Yes':'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Is JSON Bills</td>
                                    <td>{{ $job->jobable->is_json_bills?'Yes':'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Sales Bills</td>
                                    <td>
                                        @if(!$job->jobable->is_file_nill)
                                        @if(!$job->jobable->is_json_bills)
                                        @php
                                        $sales_bill = json_decode($job->jobable->sales_bills);
                                        @endphp
                                        @foreach($sales_bill as $sale_bill)
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$sale_bill]) }}"
                                            target="_blank">
                                            {{ $sale_bill }}
                                        </a>,&nbsp;
                                        @endforeach
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Purchase Bills</td>
                                    <td>
                                        @if(!$job->jobable->is_file_nill)
                                        @if(!$job->jobable->is_json_bills)
                                        @php
                                        $purchase_bills = json_decode($job->jobable->purchase_bills);
                                        @endphp
                                        @foreach($purchase_bills as $purchase_bill)
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$purchase_bill]) }}"
                                            target="_blank">
                                            {{ $purchase_bill }}
                                        </a>,&nbsp;
                                        @endforeach
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>JSON S/P Bills</td>
                                    <td>
                                        @if(!$job->jobable->is_file_nill)
                                        @if($job->jobable->is_json_bills)

                                        @php
                                        $json_bills = json_decode($job->jobable->json_bills);
                                        @endphp
                                        @foreach($json_bills as $json_bill)
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$json_bill]) }}"
                                            target="_blank">
                                            {{ $json_bill }}
                                        </a>,&nbsp;
                                        @endforeach
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>GSTR1</td>
                                    <td>
                                        @if($job->jobable->gstr1_doc!='')
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$job->jobable->gstr1_doc]) }}"
                                            target="_blank">Download</a>
                                        @else
                                        <form action="" method="post" name="gstr1-update" id="gstr1-update">
                                            <div class="input-group mb-3">
                                                <input type="file" name="gstr1" id="gstr1">
                                                @error('gstr1')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <small class="form-text text-muted">
                                                    Add pdf/jpg/png files only.
                                                </small>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-upload"></i> Click Here To Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>GSTR3B</td>
                                    <td>
                                        @if($job->jobable->gstr3b_doc!='')
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$job->jobable->gstr3b_doc]) }}"
                                            target="_blank">Download</a>
                                        @else
                                        <form action="" method="post" name="gstr3b-update" id="gstr3b-update">
                                            <div class="input-group mb-3">
                                                <input type="file" name="gstr3b" id="gstr3b">
                                                @error('gstr3b')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <small class="form-text text-muted">
                                                    Add pdf/jpg/png files only.
                                                </small>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-upload"></i> Click Here To Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tax Computaion Document</td>
                                    <td>
                                        @if($job->jobable->tax_computation_doc!='')
                                        <a href="{{ route('tr/freelancer/job/file', ['filename'=>$job->jobable->tax_computation_doc]) }}"
                                            target="_blank">Download</a>
                                        @else
                                        <form action="" method="post" name="tax_computation-update"
                                            id="tax_computation-update">
                                            <div class="input-group mb-3">
                                                <input type="file" name="tax_computation" id="tax_computation">
                                                @error('tax_computation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <small class="form-text text-muted">
                                                    Add pdf/jpg/png files only.
                                                </small>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-upload"></i> Click Here To Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>GST Challan</td>
                                    <td>
                                        @if($job->jobable->gst_challan_doc!='')
                                        <a href="{{ route('tr/admin/job/file', ['filename'=>$job->jobable->gst_challan_doc]) }}"
                                            target="_blank">Download</a>
                                        @else
                                        <form action="" method="post" name="gst_challan-update" id="gst_challan-update">
                                            <div class="input-group mb-3">
                                                <input type="file" name="gst_challan" id="gst_challan">
                                                @error('gst_challan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <small class="form-text text-muted">
                                                    Add pdf/jpg/png files only.
                                                </small>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-upload"></i> Click Here To Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Assigned To</td>
                                    <td>{{ $job->assigned_to }}</td>
                                </tr>
                                <tr>
                                    <td>Assign By</td>
                                    <td>{{ $job->assigner->name??'n/a' }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <form action="" method="post" name="status-update" id="status-update">
                                            <div class="input-group mb-3">
                                                <select name="status" id="status" class="form-control"
                                                    style="width:300px;">
                                                    <option value="created" @if( isset($job->status) &&
                                                        ($job->status=='created') ) selected @endif >Created</option>
                                                    <option value="open" @if( isset($job->status) &&
                                                        ($job->status=='open')
                                                        )
                                                        selected @endif>Open</option>
                                                    <option value="in progress" @if( isset($job->status) &&
                                                        ($job->status=='in progress') ) selected @endif>In Progress
                                                    </option>
                                                    <option value="re-check" @if( isset($job->status) &&
                                                        ($job->status=='re-check') ) selected @endif>Re-check</option>
                                                    <option value="hold" @if( isset($job->status) &&
                                                        ($job->status=='hold')
                                                        )
                                                        selected @endif>Hold</option>
                                                    <option value="completed" @if( isset($job->status) &&
                                                        ($job->status=='completed') ) selected @endif>Completed</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i
                                                            class="fas fa-save"></i> Click To Update Selected
                                                        Status</button>
                                                </div>
                                            </div>
                                        </form>



                                    </td>
                                </tr>

                            </table>
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Comments</h5>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 border">
                            <form action="" method="post" id="add-job-comment">
                                <div class="errors" id="errors"></div>
                                <div class="form-group">
                                    <input type="hidden" name="parent_id" id="parent_id" value="0">
                                    <input type="hidden" name="job_id" id="job_id" value="{{$job->id}}">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5"
                                        class="form-control"></textarea>
                                    @error('message')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="attachments">Attach Files</label>
                                    <input type="file" name="attachments[]" id="attachmetns" multiple>
                                    <small class="form-text text-muted">Add multiple pdf/jpg/png files only.</small>
                                    @error('attachments.*')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" data-action="new"
                                        class="btn btn-outline-success btn-sm float-right save-job-comment"
                                        id="save-job-comment">
                                        Post Comment
                                    </button>
                                </div>
                            </form>
                            <div class="clear-fix">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Previous Comments</h5>
                        </div>
                    </div>
                    @foreach($job->jobcomments->reverse() as $jobcomment)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-user"></i>
                                    <strong>{{ $jobcomment->owner->name }} (#{{ $jobcomment->id }})</strong>
                                </div>
                                <div class="card-body">

                                    <p>{{ $jobcomment->message }}</p>
                                    @php
                                    $files = json_decode($jobcomment->attachments);
                                    @endphp
                                    <ul class="list-group list-group-horizontal">
                                        @if($files)
                                        @foreach($files as $file)
                                        <li class="list-group-item">
                                            <a href="{{ route('tr/freelancer/job/file', ['filename'=>$file]) }}"
                                                target="_blank">Download</a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    <i class="fas fa-clock"></i> {{ $jobcomment->created_at }}
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection