@extends('layouts.app', ['activePage' => 'news', 'titlePage' => __('News')])

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
                                    <a href="{{route('news.create')}}" class="btn btn-sm btn-primary">Add news<div class="ripple-container"></div></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                @if(count($news) > 0)
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Creation date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $singleNews)
                                        <tr>
                                            <td>{{$singleNews->title}}</td>
                                            <td>{{$singleNews->content}}</td>
                                            <td>{{$singleNews->user->name}}</td>
                                            <td>{{$singleNews->created_at}}</td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('news.edit', $singleNews->id)}}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
                                                        onclick="if(confirm('Are you sure you want to delete this news?')){ $('form#delete-{{$singleNews->id}}').submit(); }">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',$singleNews->id], 'class' => 'hidden', 'id'=>"delete-".$singleNews->id]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div v-else>
                                        <div class="alert alert-warning">No results</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
