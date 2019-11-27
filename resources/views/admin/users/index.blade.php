@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Users list</h4>
                        </div>
                        <div class="card">
                            @include('layouts.success_error.success_error')
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary">Add user<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <div id="vue">
                                <users-component></users-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
