@if (count($participaints) > 0)
<div class="row">
    <div class="participaints-title col-12">
        <h1>Particpaints list</h1>
    </div>
</div>
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
                <div><img src="{{url('storage/'.$participaint->photo)}}" alt="Photo oh the participaint" height="50" width="50"></div>
            </td>
            <td class="table-text">
                <div>{{ $participaint->firstname }}</div>
                <div>{{ $participaint->lastname }}</div>
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
@endif

{{--@if (count($participaints) > 0)--}}
{{--    <div class="row">--}}
{{--        <div class="participaints-title col-12">--}}
{{--            <h1>Particpaints list</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <table class="table table-striped">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">Photo</th>--}}
{{--            <th scope="col">First and last name</th>--}}
{{--            <th scope="col">Report Subject</th>--}}
{{--            <th scope="col">Email</th>--}}
{{--            <th scope="col">Hide paricipaint</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}

{{--        <tbody>--}}
{{--        @foreach ($participaints as $participaint)--}}
{{--            @if (!$participaint->hide)--}}
{{--                <tr>--}}
{{--                    <td class="table-text">--}}
{{--                        <div><img src="{{url('storage/'.$participaint->photo)}}" alt="Photo oh the participaint" height="50" width="50"></div>--}}
{{--                    </td>--}}
{{--                    <td class="table-text">--}}
{{--                        <div>{{ $participaint->firstname }}</div>--}}
{{--                        <div>{{ $participaint->lastname }}</div>--}}
{{--                    </td>--}}
{{--                    <td class="table-text">--}}
{{--                        <div>{{ $participaint->reportSubject }}</div>--}}
{{--                    </td>--}}
{{--                    <td class="table-text">--}}
{{--                        <div>{{ $participaint->email }}</div>--}}
{{--                    </td>--}}
{{--                    <td class="table-text">--}}
{{--                        <div><input type="checkbox" value="{{ $participaint->email }}"></div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--@endif--}}


<script>

    function next(e){
        e.preventDefault();
        //console.log("hello");
        $.ajax({
            type:'POST',
            url:'/ajaxparticipaint/store',
            data: $("#form1").serialize(),
            success:function(data){
                $("#form").html(data.view);
            },
            error: function(data) {
                $('.alert-danger').html('');
                $.each(data.responseJSON.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+value+'</p>');
                });
            }
        });
        return false;
    }
</script>