@extends('layouts.general')

@section('content')
        <div class="card col-8 participaint-card">
            <div class="card-body">
                @if (count($participaints) > 0)
                    <h3 class="card-title">All Members</h3>

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
                                    <td>
                                        <img src="{{url('storage/'.$participaint->photo)}}" alt="Photo of the participant" height="50" width="50">
                                    </td>
                                    <td>
                                        {{ $participaint->firstname }} {{ $participaint->lastname }}
                                    </td>
                                    <td>
                                        {{ $participaint->reportSubject }}
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $participaint->email }}">
                                            {{ $participaint->email }}
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
@endsection
