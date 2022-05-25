@extends('layouts.admin-auth')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All Categories</h5>
                        <div class="heading-elements">
                            <a class="btn btn-success btn-sm" href="{{route('category.create')}}">
                                <i class="fa fa-plus mr-2"></i> Add New Category
                            </a>
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Parent Id</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->parent_id }}</td>

                                    <td>
                                        @if ($row->category_image)
                                    @php
                                    $image = json_decode($row->category_image);
                                    //dd($image);
                                    @endphp
                                    <a href="#" class="avatar border-gray">
                                        <img src="{{ $image->thumbnail }}" alt="blog thumb" width="150px" height="150px">
                                    </a>

                                    @else
                                    <a href="#" class="avatar border-gray">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb" width="150px" height="150px">
                                    </a>
                                    @endif
                                    </td>
                                    <td>
                                        <div style="display:flex;">

                                            <a href="{{route('category.edit',$row->id)}}"
                                                class="btn btn-warning btn-sm" title="Edit"><i class="far fa-edit"></i></a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('category.destroy',$row->id) }}"
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection