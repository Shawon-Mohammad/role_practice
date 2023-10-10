@extends('layouts.admin')
@section('title')
    Post
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Posts</h3>
                        <div class="card-tools">
                            <a href="{{ route('posts.create') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-plus"></i>Add New
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-tool btn-primary bg-primary" data-toggle="modal"
                                data-target="#postCreate">
                                Add New Post modal
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                        <td>{{ $post->status }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td>
                                            @can('view_post')
                                                <a class="btn btn-dark" href="{{ route('posts.show', $post->id) }}">View</a>
                                            @endcan
                                            @can('edit_post')
                                                <button type="button" class="btn btn-primary"
                                                    onclick="editPost('{{ $post->id }}','{{ $post->title }}')">
                                                    Edit Modal
                                                </button>
                                                <a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                            @endcan
                                            @can('delete_post')
                                                <a class="btn btn-danger"
                                                    href="{{ route('posts.delete', $post->id) }}">Delete</a>
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
    @include('posts.partials.create')
    @include('posts.partials.edit')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form#form_post_edit', function(e) {
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
                    $('#postEdit').modal('hide');
                    if (data.status) {
                        showAlertMessage(data.message, 5000, 'success');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('posts.index') }}"
                    }, 5000);
                }).fail(function(data) {
                    $('#postEdit').modal('hide');
                    let errors = JSON.parse(data.responseText);
                    if (errors && errors.message) {
                        showAlertMessage(errors.message, 5000, 'error');
                    } else {
                        showAlertMessage(errors.message, 5000, 'error');
                    }
                    setTimeout(() => {
                        window.location.href = "{{ route('posts.index') }}"
                    }, 5000);
                });
            })

        });

        function editRole(id, title) {
            let url = "{{ route('posts.update', ':id') }}"
            url = url.replace(':id', `${id}`);
            $('#form_post_edit input[name=title]').val(title);
            $('#form_post_edit').attr('action', url);
            $('#postEdit').modal('show');
        }
    </script>
@endpush