<div class="container">
    <div class="row justify-content-center">
        <div class="card col-sm-8 form-card">
            <div class="card-body">

                <h3 class="card-title">To participate in the conference, please fill out the form</h3>

                    <div class="alert alert-danger" style="display:none"></div>

                    {{ Form::open(array('method' => 'post', 'id' => 'form2','enctype' => 'multipart/form-data')) }}
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
                        {{ Form::label('photo', 'Add your photo (max size 2MB)') }}
                        {{ Form::file('photo',['class' => 'form-control-file', 'accept' => '.jpg, .jpeg, .png']) }}
                    </div>

                    {{ Form::hidden('email', $email) }}

                    {{ Form::submit('Next', ['class' => 'btn btn-primary', 'id' => 'btn_1', 'onclick' => 'ajaxForm.saveAdditionalForm(event)']) }}
                    {{ Form::close() }}

                    <button onclick="ajaxForm.showIndexForm()" type="submit" id="btn_2" class="btn btn-info">Back</button>


            </div>
        </div>
    </div>
</div>