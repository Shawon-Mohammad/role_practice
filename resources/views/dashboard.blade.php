{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> --}}

@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Informations</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>CGPA</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/dist/img/default-150x150.png') }}" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        2161075
                                    </td>
                                    <td>Shawon Mohammad</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            3.24
                                        </small>
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                            abdulmotalebshawon@gmail.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/dist/img/default-150x150.png') }}" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        2161076
                                    </td>
                                    <td>Yusuf Pathan</td>
                                    <td>
                                        <small class="text-warning mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            3.56
                                        </small>
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                            yusufpathan@gmail.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/dist/img/default-150x150.png') }}" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        2161077
                                    </td>
                                    <td>Faraz Ahmed</td>
                                    <td>
                                        <small class="text-danger mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            3.75
                                        </small>
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                            farazahmed@gmail.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/dist/img/default-150x150.png') }}" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        2161078
                                        <span class="badge bg-danger">NEW</span>
                                    </td>
                                    <td>Sufiyan Khan</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            3.94
                                        </small>
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                            sufiyankhan@gmail.com
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                  <td>
                                      <img src="{{ asset('assets/dist/img/default-150x150.png') }}" alt="Product 1"
                                          class="img-circle img-size-32 mr-2">
                                      2161074
                                      <span class="badge bg-danger">NEW</span>
                                  </td>
                                  <td>Faysal Karim</td>
                                  <td>
                                      <small class="text-success mr-1">
                                          <i class="fas fa-arrow-up"></i>
                                          4.00
                                      </small>
                                  </td>
                                  <td>
                                      <a href="#" class="text-muted">
                                          <i class="fas fa-search"></i>
                                          faysalkarim@gmail.com
                                      </a>
                                  </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
