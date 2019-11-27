@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">My latest news</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                <th>Title</th>
                <th>Content</th>
                <th>Creation date</th>
                </thead>
                <tbody>
                @foreach($news as $singleNews)
                    <tr>
                      <td>{{$singleNews->title}}</td>
                      <td>{{$singleNews->content}}</td>
                      <td>{{$singleNews->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">My latest blogs</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Title</th>
                  <th>Category</th>
                  <th>Content</th>
                  <th>Creation date</th>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                  <tr>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->category->title}}</td>
                    <td>{{$blog->content}}</td>
                    <td>{{$blog->created_at}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
