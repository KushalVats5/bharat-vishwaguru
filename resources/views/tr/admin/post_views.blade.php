@extends('layouts.admin-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center11">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <div class="search-box-container">
                        <form action="{{ route('tr/admin/user/all') }}" method="get">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="search_text" id="search_text"
                                            value="{{ $search->search_text??'' }}" class="form-control"
                                            placeholder="search by either name or phone or email">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control select2">
                                            <option value="">-Is Active-</option>
                                            <option value="1" @if( isset($search->status) and
                                                ($search->status == 1 ) ) selected
                                                @endif>Yes
                                            </option>
                                            <option value="0" @if( isset($search->status) and
                                                ($search->status == 0 ) ) selected
                                                @endif>No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-success " type="submit"><i class="fas fa-search"></i>
                                        Search</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post Title</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Agent</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Post Title</th>
                                    <th>IP</th>
                                    <th>Agent</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $row )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $row->article->title }}</td>
                                    <td>{{ $row->article->post_type }}</td>
                                    <td>{{ $row->ip }}</td>
                                    <td>{{ $row->agent }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $data->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection