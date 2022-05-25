@extends('home')

@section('title')
	Permission
@endsection

@section('extra-css')
<style>
    .bootstrap-select .bs-ok-default::after {
    width: 0.3em;
    height: 0.6em;
    border-width: 0 0.1em 0.1em 0;
    transform: rotate(45deg) translateY(0.5rem);
}

.btn.dropdown-toggle:focus {
    outline: none !important;
}
.bg-white {
    background-color: #403D39 !important;
    color: #FFFFFF !important;
    box-shadow: none !important;
}
</style>
@endsection

@section('index')
        <div class="content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Add New Role
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                    @error('name')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Permissions (Multiple Selection)</label>
                                    <select class="form-control selectpicker w-100 @error('permission') is-invalid @enderror" name="permission[]" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm" required>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission }}">{{ $permission }}</option>
                                        @endforeach
                                    </select>
                                     @error('permission')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                     @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('extra-script')
<script>
     $(function () {
    $('.selectpicker').selectpicker();
});
</script>
@endsection
