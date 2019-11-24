@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Edit user')])

@section('content')
    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method'=>'PATCH']) !!}
        @include('admin.users.form')
    {!! Form::close() !!}
@endsection