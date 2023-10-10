@extends('layouts.admin')
@section('title')
    Post Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New Post</h3>
                        <div class="card-tools">
                            <a href="{{ route('posts.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            {{-- <form action="../../index.html" method="post"> --}}
                            <div class="form-group mb-3">
                                <input type="string" class="form-control" placeholder="Enter title" id="title"
                                    name="title" value="{{ $post->title }}">
                                @error('title')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-30">
                                <textarea class="form-control" placeholder="Enter body" id="body" name="body">{{ $post->body }}</textarea>
                                @error('body')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control" placeholder="Enter Stutas" id="status" name="status">
                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
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
