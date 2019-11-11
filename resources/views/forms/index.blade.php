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
                        {{ Form::open(array('url' => 'participaint/store', 'method' => 'post', 'id' => 'form1')) }}
                            <div class="form-group">
                                {{ Form::label('firstname', 'Firstname *') }}
                                {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('lastname', 'Lastname *') }}
                                {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('birthday', 'Birthday *') }}
                                {{ Form::text('birthday', null, ['class' => 'form-control', 'id' => 'datepicker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('reportSubject', 'Report Subject *') }}
                                {{ Form::text('reportSubject', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('country', 'Select country *') }}
                                {{ Form::select('country', array('Ukraine' => 'Ukraine', 'Germany' => 'Germany'), null, ['class' => 'form-control field']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone', 'Phone *') }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email *') }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                            {{ Form::submit('Next', ['class' => 'btn btn-primary', 'id' => 'btn']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function getMessage(){
            $.ajax({
                type:'POST',
                url:'/forms/public/getmsg',
                data: { somefield: "Some field value", _token: "{{csrf_token()}}" },
                //data: '_token = ?php echo csrf_token() ?>',
                success:function(data){
                    $("#msg").html(data.msg);
                }
            });
        }
    </script>

@endsection
