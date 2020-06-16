@extends('layouts.app')

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
<!--            @if(isset($user))
		  <h3>Edit User</h3>
			{!! Form::model($user, ['method' => 'PUT','url' => ['/add_update'.$user->id], 'enctype' => 'multipart/form-data']) !!}
                         @csrf 
			@else
		    <h3>Add User</h3>
			{!! Form::open(['method' => 'POST','url' => ['addUser'],'enctype' => 'multipart/form-data']) !!}
                        @csrf
	     @endif-->
          
        </div>
        <div class="module-body">


            <br />

            {!! Form::open(['method' => 'PUT','class' => 'form-horizontal row-fluid' ,'url' => ['/add_update',$user->id],
            'enctype' => "multipart/form-data"]) !!}           
            @csrf
            @method('PUT')


            <div class="control-group">
                {!! Form::label('name', 'Name', ['class' => 'control-label']);!!}
                <div class="controls">
                    <!--<input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8">-->
                    {!! Form::text('name', null, ['class' => 'span8','placeholder'=>'Type something here...'])!!}
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            
            <div class="control-group">
                {!! Form::label('email', 'Email', ['class' => 'control-label']);!!}
                <div class="controls">
                    {!! Form::text('email', null, ['class' => 'span8','placeholder'=>'Type something here...'])!!}
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

            </div>


            <div class="control-group">
                {!! Form::label('password', 'Password', ['class' => 'control-label']);!!}
                <div class="controls">
                    {!! Form::text('password', null, ['class' => 'span8','placeholder'=>'Type something here...'])!!}
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

            </div>



            <div class="control-group">
                {!! Form::label('country', 'Country', ['class' => 'control-label']);!!}
                <div class="controls">
                    {!!Form::select('country', $countries->pluck('name'), null, ['class' => 'span8','placeholder'=>'Select here..','id'=>'country']);!!}
                    @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                    @endif
                </div>

            </div>

            <div class="control-group">
                {!! Form::label('state', 'State', ['class' => 'control-label']);!!}
                <div class="controls">
                    {!!Form::select('state', [null], null, ['class' => 'span8','placeholder'=>'Select here..','id'=>'state']);!!}
                      
                    @if ($errors->has('state'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                    @endif
                </div>

            </div>


            <div class="control-group">
                {!! Form::label('city', 'City' ,['class' => 'control-label']);!!}
                <div class="controls">
                    {!!Form::select('city', [null], null, ['class' => 'span8','placeholder'=>'Select here..','id'=>'city']);!!}
                    @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                </div>

            </div>


            <div class="control-group">
                {!! Form::label('gender', 'Gender', ['class' => 'control-label','id'=>'gender']);!!}
                <div class="controls">
                    <label class="radio">
                        {!!Form::radio('gender', '1');!!}
                        Male
                    </label> 
                    <label class="radio">
                        {!!Form::radio('gender', '2');!!}
                        Female
                    </label> 
                    @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="control-group">
                {!! Form::label('hobbies', 'Hobbies', ['class' => 'control-label']);!!}
                <div class="controls">
                    <label class="checkbox inline">
                        {!! Form::checkbox('hobbies[]', '1');!!}
                        Cricket
                    </label>
                    <label class="checkbox inline">
                        {!! Form::checkbox('hobbies[]', '2');!!}
                        Reading
                    </label>
                    <label class="checkbox inline">
                        {!! Form::checkbox('hobbies[]', '3');!!}
                        TV
                    </label>
                    @if ($errors->has('hobbies'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hobbies') }}</strong>
                    </span>
                    @endif
                </div>

            </div> 

            <div class="control-group">
                {!! Form::label('address', 'Address', ['class' => 'control-label']);!!}
                <div class="controls">
                    {!! Form::textarea('address', null, ['class'=>'span8']) !!}
                    @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>

            </div>
            <p>Academic Details:</p>
            <br>
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Institue Name</th>
                        <th>Year</th>
                        <th>Marks</th>
                        <th>Percentage</th>
                        <th>{!! Form::button('Add More',['class'=>'btn btn-small btn-inverse add'])!!}</th>
                    </tr>
                </thead>
                <tbody class="app" >
                    <tr>
                        <td> {!! Form::text('academics[name][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[year][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[marks][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[percentage][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::button('Remove',['class'=>'btn btn-small btn-danger remove_btn']) !!}</td>
                    </tr>
                </tbody>
            </table>

            <br>

            <div class="control-group">
                <div class="controls">
                    {!! Form::submit('Submit Form',['class'=>'btn']); !!}
                </div>
            </div>
            </form>
        </div>
    </div>


</div><!--/.content-->
@endsection

@section('custom_js')
<script>
    $(document).ready(function ()
    {
        $("select#country").on("change", function () {
            var cid = $(this).val();
            if (cid)
            {
                $.ajax({
                    method: "GET",
                    url: "/getStates/" + cid
                })
                        .done(function (msg) {
                            $("select#state").html(msg);
                        });
            }
        });

        $("select#state").on("change", function () {
            var cid = $(this).val();
            if (cid)
            {
                $.ajax({
                    method: "GET",
                    url: "/getCities/" + cid
                })
                        .done(function (msg) {
                            $("select#city").html(msg);
                        });
            }
        });


        $("button.add").click(function () {
            var row = `<tr>
                        <td> {!! Form::text('academics[name][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[year][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[marks][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::text('academics[percentage][]', null, ['class' => 'span8','id'=>'input'])!!}</td>
                        <td> {!! Form::submit('Remove',['class'=>'btn btn-small btn-danger remove_btn']) !!}</td>
                    </tr>`;
            $("tbody.app").append(row);
        });

        $(document).on('click', '.remove_btn', function () {
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection