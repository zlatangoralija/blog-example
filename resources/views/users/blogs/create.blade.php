@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($blog, ['route' => 'blogs.store', 'files'=>true]) !!}
            @include('users.blogs.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
