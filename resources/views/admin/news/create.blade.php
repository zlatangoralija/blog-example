@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News list')])

@section('content')
    {!! Form::model($news, ['route' => 'admin.news.store', 'files'=>true]) !!}
    @include('admin.news.form')
    {!! Form::close() !!}
@stop