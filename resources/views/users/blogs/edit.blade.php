@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {!! Form::model($blog, ['route' => ['blogs.update', $blog->id], 'method'=>'PATCH']) !!}
                @include('users.blogs.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
