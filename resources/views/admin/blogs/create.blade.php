@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs list')])

@section('content')
    {!! Form::model($blog, ['route' => 'admin.blogs.store', 'files'=>true]) !!}
    @include('admin.blogs.form')
    {!! Form::close() !!}
@stop