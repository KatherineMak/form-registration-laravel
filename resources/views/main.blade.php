@extends('layouts.registration')

@section('content')
    <div class="container">
        <div class="row justify-content-center" id="form">
            <div class="col-sm-5"><h3>Fill form to take part in the conference</h3>
            </div>
            <div class="col-sm-3">
                <button onclick="ajaxForm.showIndexForm();" type="submit" class="btn btn-primary">Registration</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
