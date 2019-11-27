@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method'=>'PATCH']) !!}
                @include('admin.users.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
