@extends('home')

@section('title')
FreeLancer
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Income Tax Return Details</h3>
                    {{-- <a href="{{route('articles.create')}}" class="btn btn-success btn-sm">Add New Article</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Pancard</th>
                                    <th>Name on pancard</th>
                                    <th>Action</th>
                                    <th>Upload</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $row)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $row->pancard }}</td>
                                    <td>{{ $row->name }}</td>
                                    <!-- @php
                                        $user = App\User::find($row->user_id);
                                        //dd($user);
                                    @endphp
                                    <td>{{$user->name}}</td> -->
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{ route('freelancer.project.show', $row->id) }}" title="show" class="dynamicModal">
                                                <button class="btn btn-success btn-sm">show</button>
                                            </a>
                                            &nbsp;
                                            @if ($row->document != null)
                                            <a href="{{ route('insta.tax.return.download', $row->id) }}" class="btn btn-warning btn-sm">Document</a>

                                            @endif

                                            &nbsp;
                                            <a href="{{ route('freelancer.project.show2', $row->id) }}" title="show" class="dynamicModal">
                                                <button class="btn btn-primary btn-sm">Extra details</button>
                                            </a>

                                        </div>
                                    </td>

                                    <td>
                                        <form method="POST" action="{{ route('freelancer.work.upload') }}" enctype="multipart/form-data">
                                            @csrf

                                            <!-- <label for="work">upload</label> -->
                                            <input class="form-control" type="file" name="work[]" multiple>
                                            <input type="hidden" name="insta_plan_id" value="{{$row->id}}">
                                            <button class="btn btn-success btn-sm pull-right">upload</button>

                                        </form>
                                    </td>

                                    <td>
                                        <select class="form-control" name="status" onchange="change_insta_status(this.value, '{{$row->id}}')">
                                            
                                            <option value="{{$row->status}}">{{$row->status}}</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    console.log('prateek');
    function change_insta_status(status, id) {
        console.log(status, id);
        $.ajax({
            url: "{{ route('freelancer.status.update') }}",
            method: "POST",
            data: {
                '_token': "{{csrf_token()}}",
                "status": status,
                "insta_plan_id": id
            },
            success: function(response) {
                console.log(response);        

            }
        });
    }
</script>

@section('extra-script')

@endsection