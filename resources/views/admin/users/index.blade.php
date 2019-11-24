@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            {{--TODO: Add AJAX search here--}}
                            <h4 class="card-title mt-0"> Users list</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.success_error.success_error')
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary">Add user<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Creation date</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td class="td-actions text-right">
                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{route('admin.users.show', $user->id)}}" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
                                                                onclick="if(confirm('Are you sure you want to delete this user?')){ $('form#delete-{{$user->id}}').submit(); }">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy',$user->id], 'class' => 'hidden', 'id'=>"delete-".$user->id]) !!}
                                                    {!! Form::close() !!}
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
        </div>
    </div>
@endsection