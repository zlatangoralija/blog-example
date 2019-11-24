@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('Edit news')])

@section('content')
    {!! Form::model($news, ['route' => ['admin.news.update', $news->id], 'method'=>'PATCH']) !!}
    @include('admin.news.form')
    {!! Form::close() !!}
@endsection