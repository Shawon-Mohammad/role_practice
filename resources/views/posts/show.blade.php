@extends('layouts.admin')
@section('title')
    Post
@endsection
@push('css')
    <style>
        @media print {
            .print-none{
                display: none;

            }
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Post</h3>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <tr>
                                <th>
                                    Id
                                </th>
                                <td>
                                    {{ $post->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <td>
                                    {{ $post->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Body
                                </th>
                                <td>
                                    {{ $post->body }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    User name
                                </th>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Status
                                </th>
                                <td>
                                    {{ $post->status }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Created at
                                </th>
                                <td>
                                    {{ $post->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Updated at
                                </th>
                                <td>
                                    {{ $post->updated_at }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="window.print()" class="btn btn-success print-none">Print</button>
@endsection
@push('js')
    <script></script>
@endpush
