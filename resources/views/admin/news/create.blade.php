@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News list')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($news, ['route' => 'admin.news.store', 'files'=>true]) !!}
            @include('admin.news.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
