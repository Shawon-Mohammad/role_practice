@extends('layouts.admin')
@section('title')
    Role
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Roles</h3>
                        <div class="card-tools">
                            <a href="{{ route('roles.create') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-plus"></i>Add New
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-tool btn-primary bg-primary" data-toggle="modal"
                                data-target="#roleCreate">
                                Add New Role modal
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
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>{{ $role->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            <button type="button" class="btn btn-tool btn-primary bg-primary"
                                                onclick="editRole('{{ $role->id }}','{{ $role->title }}')">
                                                Edit Modal
                                            </button>
                                            <a class="btn btn-danger"
                                                href="{{ route('roles.delete', $role->id) }}">Delete</a>
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
    @include('roles.partials.create')
    @include('roles.partials.edit')
    <script>
        // $(document).ready(function() {
        //     $(document).on('submit', 'form#form_role_edit', function(e) {
        //         e.preventDefault();
        //         let url = "{{ route('roles.update', ':id') }}"
        //         console.log("url", url)
        //     })
        // });

        function editRole(id, title) {
            console.log(id, title)
            let form = $('form#form_role_edit')
            let title = form.find('input[name=title]')
            console.log(title)
        }
    </script>
@endsection
@push('js')
@endpush
