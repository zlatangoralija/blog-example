@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News list')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            {{--TODO: Add AJAX search here--}}
                            <h4 class="card-title mt-0"> News list</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.success_error.success_error')
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-primary">Add news<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <div id="vue">
                                <news-component></news-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection