@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    To participate in the conference, please fill out the form
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <div class="col-12 justify-content-start">
                        {{ Form::open(array('url' => 'participaint/additsave', 'method' => 'post', 'id' => 'form2','enctype' => 'multipart/form-data')) }}
                        <div class="form-group">
                            {{ Form::label('company', 'Company') }}
                            {{ Form::text('company', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('position', 'Position') }}
                            {{ Form::text('position', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('aboutMe', 'About me') }}
                            {{ Form::textarea('aboutMe', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('photo', 'Add your photo') }}
                            {{ Form::file('photo',['class' => 'form-control-file', 'accept' => '.jpg, .jpeg, .png']) }}
                        </div>

                        {{ Form::hidden('email', $email) }}

                        {{ Form::submit('Next', ['class' => 'btn btn-primary', 'id' => 'btn_1']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
