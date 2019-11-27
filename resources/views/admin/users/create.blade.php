@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($user, ['route' => 'admin.users.store', 'files'=>true]) !!}
            @include('admin.users.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
