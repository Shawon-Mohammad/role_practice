@extends('layouts.admin')
@section('title')
    Role Create
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
                        <h3 class="card-title">Create New Role</h3>
                        <div class="card-tools">
                            <a href="{{ route('roles.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            {{-- <form action="../../index.html" method="post"> --}}
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter title" id="title"
                                    name="title" value="{{ $role->title }}">
                                @error('title')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="permissions">Permissions</label>
                                <select class="permissions form-control" name="permissions[]" multiple="multiple">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}"
                                            {{ in_array($permission->id, old('permissions', [])) || $role->permissions->contains($permission->id) ? 'selected' : '' }}>
                                            {{ $permission->title }}</option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.permissions').select2();
        });
    </script>
@endpush
