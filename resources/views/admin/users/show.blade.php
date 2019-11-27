@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card border-0 shadow">
                        <img src="{{asset('/storage/' . $user->featured_image)}}" class="card-img-top" alt="..." style="max-width: 100%; height: auto;">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{$user->name}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">User info</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary">Edit user<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Username</th>
                                <th>Email</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->country_id}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
