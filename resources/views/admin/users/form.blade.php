<div class="content">
    <div class="container-fluid">
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
                    <div class="card-footer ml-auto mr-auto">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>