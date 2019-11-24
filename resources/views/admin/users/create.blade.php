@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users List')])

@section('content')
    {!! Form::model($user, ['route' => 'admin.users.store', 'files'=>true]) !!}
    @include('admin.users.form')
    {!! Form::close() !!}
@stop