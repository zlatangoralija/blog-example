@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Preview blog</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{route('blogs.edit', $blog->id)}}" class="btn btn-sm btn-primary">Edit blog<div class="ripple-container"></div></a>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <h1 class="mt-4">{{$blog->title}}</h1>
                                <p class="lead">
                                    by
                                    <a href="#">{{$blog->user->username}}</a>
                                </p>
                                <hr>
                                <p>Posted {{$blog->created_at->diffForHumans()}}</p>
                                <hr>
                                <img class="img-fluid rounded" src="{{asset('/storage/' . $blog->featured_image)}}" alt="">
                                <hr>
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
