@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($blog, ['route' => 'admin.blogs.store', 'files'=>true]) !!}
            @include('admin.blogs.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
