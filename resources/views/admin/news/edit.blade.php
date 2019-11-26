@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('Edit news')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($news, ['route' => ['admin.news.update', $news->id], 'method'=>'PATCH']) !!}
            @include('admin.news.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
