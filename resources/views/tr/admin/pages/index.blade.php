@extends('layouts.admin-auth')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="">
                        <h3>Page Details</h3>
                        <a href="{{route('page.create')}}" class="btn btn-success btn-sm">Add New page</a>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif
                    @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('danger') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        @if ($row->page_image)
                                    @php
                                    $image = json_decode($row->page_image);
                                    //dd($image);
                                    @endphp
                                    <a href="#" class="avatar border-gray">
                                        <img src="{{ $image->thumbnails }}" alt="blog thumb" width="150px" height="150px">
                                    </a>

                                    @else
                                    <a href="#" class="avatar border-gray">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb" width="150px" height="150px">
                                    </a>
                                    @endif
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('page.edit',$row->id)}}"
                                                class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i></a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('page.destroy',$row->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection