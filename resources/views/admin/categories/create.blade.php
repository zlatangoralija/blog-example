@extends('layouts.app', ['activePage' => 'blog-categories', 'titlePage' => __('News blog category')])

@section('content')
    {!! Form::model($category, ['route' => 'admin.blog-categories.store', 'files'=>true]) !!}
    @include('admin.categories.form')
    {!! Form::close() !!}
@stop