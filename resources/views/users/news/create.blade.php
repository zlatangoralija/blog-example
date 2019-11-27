@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($news, ['route' => 'news.store', 'files'=>true]) !!}
            @include('users.news.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
