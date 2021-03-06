@extends('layouts.app', ['activePage' => 'blog-categories', 'titlePage' => __('Blog categories')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Categories list</h4>
                        </div>
                        <div class="card">
                            @include('layouts.success_error.success_error')
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('admin.blog-categories.create')}}" class="btn btn-sm btn-primary">Add category<div class="ripple-container"></div></a>
                                </div>
                            </div>
                              @if(count($categories) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>Title</th>
                                        <th>Creation date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->title}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('admin.blog-categories.edit', $category->id)}}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
                                                        onclick="if(confirm('Are you sure you want to delete this category and all related blogs?')){ $('form#delete-{{$category->id}}').submit(); }">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog-categories.destroy',$category->id], 'class' => 'hidden', 'id'=>"delete-".$category->id]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@endsection
