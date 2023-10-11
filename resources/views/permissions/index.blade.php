@extends('layouts.admin')
@section('title')
    Permission
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Permissions</h3>
                        <div class="card-tools">
                            <a href="{{ route('permissions.create') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-plus"></i>Add New
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-tool btn-primary bg-primary" data-toggle="modal"
                                data-target="#permissionCreate">
                                Add New Permission modal
                            </button>
                        </div>
                        <form class="form-inline ml-5" action="{{ route('permissions.index') }}">
                            @csrf
                            <div class="row">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="search"
                                        placeholder="Search" aria-label="Search" value="{{ request()->search }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->title }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>{{ $permission->updated_at }}</td>
                                        <td>
                                            @can('edit_permission')
                                                <a class="btn btn-success"
                                                    href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                                <button type="button" class="btn btn-tool btn-primary bg-primary"
                                                    onclick="editPermission('{{ $permission->id }}','{{ $permission->title }}')">
                                                    Edit Modal
                                                </button>
                                            @endcan
                                            @can('delete_permission')
                                                <a class="btn btn-danger"
                                                    href="{{ route('permissions.delete', $permission->id) }}">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('permissions.partials.edit')
    @include('permissions.partials.create')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form#form_permission_edit', function(e) {
                e.preventDefault();
                let form = $(this);
                let action = form.attr('action');
                let token = form.find('input[name=_token]').val();
                let title = form.find('input[name=title]').val();
                $.ajax({
                    url: action,
                    method: 'post',
                    data: {
                        title: title,
                        _token: token,
                    }
                }).done(function(data) {
                    $('#permissionEdit').modal('hide');
                    if (data.status) {
                        showAlertMessage(data.message, 5000, 'success');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('permissions.index') }}"
                    }, 5000);
                }).fail(function(data) {
                    $('#permissionEdit').modal('hide');
                    let errors = JSON.parse(data.responseText);
                    if (errors && errors.message) {
                        showAlertMessage(errors.message, 5000, 'error');
                    } else {
                        showAlertMessage(errors.message, 5000, 'error');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('permissions.index') }}"
                    }, 5000);
                });
            })

        });

        function editPermission(id, title) {
            let url = "{{ route('permissions.update', ':id') }}"
            url = url.replace(':id', `${id}`);
            $('#form_permission_edit input[name=title]').val(title);
            $('#form_permission_edit').attr('action', url);
            $('#permissionEdit').modal('show');
        }
    </script>
@endpush
