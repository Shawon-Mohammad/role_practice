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
                                            <a class="btn btn-success"
                                                href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                                <button type="button" class="btn btn-tool btn-primary bg-primary"
                                                onclick="editPermission('{{ $permission->title }}','{{ $permission->id }}')">
                                                Edit Modal
                                            </button>
                                            <a class="btn btn-danger"
                                                href="{{ route('permissions.delete', $permission->id) }}">Delete</a>
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
                let url = "{{ route('permissions.update', ':id') }}"
                console.log("url", url)
            })
        });

        function editPermission(title, id) {
            console.log(title, id)
            let form = $('form#form_permission_edit')
            let title = form.find('input[name=title]')
            console.log(title)
        }
    </script>
@endpush
