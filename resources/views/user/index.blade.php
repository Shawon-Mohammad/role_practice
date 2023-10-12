@extends('layouts.admin')
@section('title')
    User
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Users</h3>
                        <div class="card-tools">
                            <a href="{{ route('user.create') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-plus"></i>Add New
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-tool btn-primary bg-primary" data-toggle="modal"
                                data-target="#userCreate">
                                Add New User modal
                            </button>
                        </div>
                        <form class="form-inline ml-5" action="{{ route('user.index') }}">
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
                                <div class="input-group date" id="from_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="from_date"
                                        data-target="#from_date"value="{{ request()->from_date }}">
                                    <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="input-group date" id="to_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="to_date"
                                        data-target="#to_date" value="{{ request()->to_date }}">
                                    <div class="input-group-append" data-target="#to_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            @can('edit_user')
                                                <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                <button type="button" class="btn btn-tool btn-primary bg-primary"
                                                    onclick="editUser('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}')">
                                                    Edit Modal
                                                </button>
                                            @endcan
                                            @can('delete_user')
                                                <a class="btn btn-danger"
                                                    href="{{ route('user.delete', $user->id) }}">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.partials.create')
    @include('user.partials.edit')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#from_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#to_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $(document).on('submit', 'form#form_user_edit', function(e) {
                e.preventDefault();
                let form = $(this);
                let action = form.attr('action');
                let token = form.find('input[name=_token]').val();
                let name = form.find('input[name=name]').val();
                let email = form.find('input[name=email]').val();
                $.ajax({
                    url: action,
                    method: 'post',
                    data: {
                        name: name,
                        email: email,
                        _token: token,
                    }
                }).done(function(data) {
                    $('#userEdit').modal('hide');
                    if (data.status) {
                        showAlertMessage(data.message, 5000, 'success');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('user.index') }}"
                    }, 5000);
                }).fail(function(data) {
                    $('#userEdit').modal('hide');
                    let errors = JSON.parse(data.responseText);
                    if (errors && errors.message) {
                        showAlertMessage(errors.message, 5000, 'error');
                    } else {
                        showAlertMessage(errors.message, 5000, 'error');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('user.index') }}"
                    }, 5000);
                });
            })

        });

        function editUser(id, name, email) {
            let url = "{{ route('user.update', ':id') }}"
            url = url.replace(':id', `${id}`);
            $('#form_user_edit input[name=name]').val(name);
            $('#form_user_edit input[name=email]').val(email);
            $('#form_user_edit').attr('action', url);
            $('#userEdit').modal('show');
        }
    </script>
@endpush
