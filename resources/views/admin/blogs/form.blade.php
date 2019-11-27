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
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Featured image</label>
                    <div class="col-lg-6 col-xl-6">
                        <div class="input-group">
                            <input type="hidden"  name="featured_image" id="featured-image">
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <div class="dropzone dropzone-default dz-clickable" data-input-element="#featured-image">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($blog) && $blog->featured_image )
                    @if(isset($blog->featured_image))
                        <div class="row" style="justify-content: center;">
                            <img src="{{asset('/storage/' . $blog->featured_image)}}"
                                 class="thumbnail old-featured-image" style="max-width: 50%; height: auto;"/>
                        </div>
                    @endif
                @endif
            </div>
            <div class="card-footer ml-auto mr-auto">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
