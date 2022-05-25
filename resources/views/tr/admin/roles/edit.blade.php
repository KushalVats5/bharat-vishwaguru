@extends('layouts.admin-auth')



@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="">
                        <h3>
                            Edit Role
                        </h3>
                    </div>
                    <form id="form_validation" method="POST" action="{{ route('role.update',$role->id) }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input name="_method" type="hidden" value="PUT">
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                value="{{ $role->name }}" required>
                            @error('name')
                            <label id="name-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        {{-- {{dd($permissions, $selectedPermissions)}} --}}
                        <div class="form-group">
                            <label class="form-label">Permissions (Multiple Selection)</label>
                            <select name="permission[]"
                                class="form-control selectpicker w-100 @error('permission') is-invalid @enderror"
                                id="your-select" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm">
                                @foreach($permissions as $permission)
                                <option value="{{ $permission }}"
                                    {{in_array($permission, $selectedPermissions) ? 'selected' : ''}}>{{ $permission }}
                                </option>
                                @endforeach
                            </select>

                            @error('permission')
                            <label id="name-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection