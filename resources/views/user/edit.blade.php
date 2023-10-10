@extends('layouts.admin')
@section('title')
    User Create
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New User</h3>
                        <div class="card-tools">
                            <a href="{{ route('user.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            {{-- <form action="../../index.html" method="post"> --}}
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" id="name"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Email" id="email"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="roles">Roles</label>
                                <select class="roles form-control" name="roles[]" multiple="multiple">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ in_array($role->id, old('roles', [])) || $user->roles->contains($role->id) ? 'selected' : '' }}>
                                            {{ $role->title }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.roles').select2();
        });
    </script>
@endpush
