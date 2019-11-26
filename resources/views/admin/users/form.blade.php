<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add new user</h4>
            </div>
            <div class="card-body ">
                @include('layouts.success_error.success_error')
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-current-password">Name</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('name', $user->name,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Name']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Country</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('country_id', $user->country_id,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Country']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Username</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('username', $user->username,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Username']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Email</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('email', $user->email,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Email']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Password</label>
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            {!! Form::text('password', $user->password,  ['class' => 'form-control', 'required'=>'required', 'placeholder'=>'Password']) !!}
                        </div>
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
                                @if(isset($product) && $product->featured_image )
                                    @if(isset($product->featured_image))
                                        <img src="{{asset('/storage/' . $product->featured_image)}}"
                                             class="thumbnail old-featured-image"/>
                                    @endif
                                @endif
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                </div>
                            </div>
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
