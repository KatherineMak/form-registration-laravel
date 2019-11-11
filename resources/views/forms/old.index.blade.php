@extends('layouts.app')

@section('script')
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $( document ).ready( function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btn").click(function (e) {
                e.preventDefault();
                var firstname = $("input[name=firstname]").val();
                var lastname = $("input[name=lastname]").val();
                var birthday = $("input[name=birthday]").val();
                var reportSubject = $("input[name=reportSubject]").val();
                var country = $("select[name=country]").val();
                var phone = $("input[name=phone]").val();
                var email = $("input[name=email]").val();
                $.ajax({
                    type: 'POST',
                    url: '/store',
                    data: {firstname: firstname, lastname: lastname, birthday: birthday, reportSubject: reportSubject, country: country, phone: phone, email: email},
                    success: function (data) {
                        alert(data.success);
                        history.pushState(null, null, '/form2');
                    }
                });
            });
        });
    </script>

{{--    <script>--}}
{{--        function saveForm(){--}}
{{--            $.ajax({--}}
{{--                type:'POST',--}}
{{--                url:'/store',--}}
{{--                data: { form: $("#form1").serialize(), _token: "{{csrf_token()}}" },--}}
{{--                //data: '_token = ?php echo csrf_token() ?>',--}}
{{--                success:function(data){--}}
{{--                    $("#result").html(data.msg);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endsection

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
                        <form action="{{ url('forms') }}" method="POST" id="form1" >
                            <p>Required field *</p>
                            <div class="form-group">
                                <label for="InputFirstname">First name *</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter first name">
                            </div>

                            <div class="form-group">
                                <label for="InputLastname">Last name *</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter last name">
                            </div>

                            <div class="form-group">
                                <label for="InputBirthday">Birthday *</label>
                                <input type="text" id="datepicker" name="birthday" class="form-control" placeholder="Select Birthday">
                            </div>

                            <div class="form-group">
                                <label for="InputReportSubject">Report subject *</label>
                                <input type="text" class="form-control" name="reportSubject" placeholder="Enter report subject">
                            </div>

                            <div class="form-group">
                                <label for="InputCountry">Select country *</label>
                                <select class="form-control field" id="InputCountry" name="country">
                                    <option>Ukraine</option>
                                    <option>France</option>
                                    <option>Germany</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="InputPhone">Phone *</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                            </div>

                            <div class="form-group">
                                <label for="InputEmail1">Email *</label>
                                <input type="email" id="email1" class="form-control" name="email" placeholder="Enter email">
                            </div>

                            <button id="btn" class="btn btn-primary">Next</button>
                        </form>
                        <div id="result"></div>
                    </div>


{{--                <form action="{{ url('form') }}" method="POST" class="form-horizontal">--}}
{{--                {{ csrf_field() }}--}}

{{--                <!-- Task Name -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="task-name" class="col-sm-3 control-label">Task</label>--}}

{{--                        <div class="col-sm-6">--}}
{{--                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Add Task Button -->--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="col-sm-offset-3 col-sm-6">--}}
{{--                            <button type="submit" class="btn btn-default">--}}
{{--                                <i class="fa fa-btn fa-plus"></i>Add Task--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
                </div>
            </div>

            <!-- Participaints List -->
{{--            @if (count($participaints) > 0)--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">--}}
{{--                        Participaints List--}}
{{--                    </div>--}}

{{--                    <div class="panel-body">--}}
{{--                        <table class="table table-striped task-table">--}}
{{--                            <thead>--}}
{{--                            <th>Participaint</th>--}}
{{--                            <th>&nbsp;</th>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach ($participaints as $participain)--}}
{{--                                <tr>--}}
{{--                                    <td class="table-text"><div>{{ $participain->firstname }}</div></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>

@endsection
