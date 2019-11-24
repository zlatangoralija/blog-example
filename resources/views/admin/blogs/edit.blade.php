@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Edit blog')])

@section('content')
    {!! Form::model($blog, ['route' => ['admin.blogs.update', $blog->id], 'method'=>'PATCH']) !!}
    @include('admin.blogs.form')
    {!! Form::close() !!}
@endsection