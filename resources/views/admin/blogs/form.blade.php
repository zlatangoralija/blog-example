<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create news</h4>
            </div>
            <div class="card-body ">
                @include('layouts.success_error.success_error')
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-current-password">Title</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('title', $blog->title,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Title']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Category</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::select('category_id', $categories, null,  ['class' => 'form-control', 'placeholder'=>'Select category...', 'required'=>'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Content</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('content', $blog->content,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Content']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Featured image</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('featured_image', $blog->featured_image,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Featured image']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
