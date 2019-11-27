@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($news, ['route' => ['news.update', $news->id], 'method'=>'PATCH']) !!}
            @include('users.news.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
