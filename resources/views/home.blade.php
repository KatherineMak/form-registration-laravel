@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            @if (Auth::user()->hasRole("admin"))
                <div class="alert alert-primary" role="alert">
                    You logged in as admin!
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    {{Auth::User()->name}}, you logged in!
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    All Members
                </div>
                <div class="card-body">
                    @if (Auth::check())
                        <div id="list">
                            @if (count($participaints) > 0)
                                @if (Auth::user()->hasRole("admin"))
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">First and last name</th>
                                            <th scope="col">Report Subject</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Hide paricipaint</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($participaints as $participaint)
                                            <tr>
                                                <td class="table-text">
                                                    <div><img src="{{url('storage/'.$participaint->photo)}}" alt="Photo of the participant" height="50" width="50"></div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->firstname }} {{ $participaint->lastname }}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->reportSubject }}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->email }}</div>
                                                </td>
                                                <td class="table-text">
                                                    @if ($participaint->hide)
                                                        <div><input type="checkbox" class="checking" value="{{ $participaint->email }}" checked></div>
                                                    @else
                                                        <div><input type="checkbox" class="checking" value="{{ $participaint->email }}"></div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">First and last name</th>
                                            <th scope="col">Report Subject</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($participaints as $participaint)
                                            @if (!$participaint->hide)
                                            <tr>
                                                <td class="table-text">
                                                    <div><img src="{{url('storage/'.$participaint->photo)}}" alt="Photo oh the participaint" height="50" width="50"></div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->firstname }} {{ $participaint->lastname }}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->reportSubject }}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{ $participaint->email }}</div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        jQuery(function ($) {
            $(document).on('change', '.checking', function () {
                console.log(this.value);
                $.ajax({
                    type:'POST',
                    url:'/adminright/changestatus',
                    data: {email: this.value, _token: '{{ csrf_token() }}'},
                    success:function(data){
                        console.log('success');
                        console.log(data);
                        $("#list").html(data.view);
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
                return false;
            });
        });
    </script>
@endsection
