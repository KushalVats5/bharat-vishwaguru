@extends('layouts.admin-auth')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All Testimonials</h5>
                        <div class="heading-elements">
                            <a class="btn btn-success btn-sm" href="{{route('testimonial.create')}}">
                                <i class="fa fa-plus mr-2"></i> {{__('Add New Testimonial')}}
                            </a>
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
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
                                @foreach($testimonial as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        @if ($row->featured_image)
                                    @php
                                    $image = json_decode($row->featured_image);
                                    //dd($image);
                                    @endphp
                                    <a href="javascript" class="avatar border-gray">
                                        <img src="{{ $image->thumbnail }}" alt="blog thumb" width="150px" height="150px">
                                    </a>

                                    @else
                                    <a href="javascript" class="avatar border-gray">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb" width="150px" height="150px">
                                    </a>
                                    @endif
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('testimonial.edit',$row->id)}}"
                                                class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i></a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('testimonial.destroy',$row->id) }}"
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
                        {{ $testimonial->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection