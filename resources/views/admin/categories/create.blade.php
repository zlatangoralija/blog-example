@extends('layouts.app', ['activePage' => 'blog-categories', 'titlePage' => __('Blog categories')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($category, ['route' => 'admin.blog-categories.store', 'files'=>true]) !!}
            @include('admin.categories.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
