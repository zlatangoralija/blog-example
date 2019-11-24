@extends('layouts.app', ['activePage' => 'blog-categories', 'titlePage' => __('Edit blog category')])

@section('content')
    {!! Form::model($category, ['route' => ['admin.blog-categories.update', $category->id], 'method'=>'PATCH']) !!}
    @include('admin.categories.form')
    {!! Form::close() !!}
@endsection