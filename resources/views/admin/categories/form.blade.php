<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create category</h4>
            </div>
            <div class="card-body ">
                @include('layouts.success_error.success_error')
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-current-password">Title</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('title', $category->title,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Title']) !!}
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
