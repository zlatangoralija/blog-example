@extends('layouts.app', ['activePage' => 'blogs', 'titlePage' => __('Blogs List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            {{--TODO: Add AJAX search here--}}
                            <h4 class="card-title mt-0"> Blogs list</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.success_error.success_error')
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.blogs.create')}}" class="btn btn-sm btn-primary">Add blog<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <div id="vue">
                                <blogs-component></blogs-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection