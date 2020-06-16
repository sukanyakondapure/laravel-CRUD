@extends('layouts.app')
@section('custom_css')

<link type="text/css" href="{{ asset('bootstrap/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- dd($users); -->

<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Edit User</h3>
        </div>
        <div class="module-body">


            <br />
<!--           <form class="form-horizontal row-fluid" action="{{route('users.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')-->
          
           {!! Form::model($user, ['method' => 'PUT','class' => 'form-horizontal row-fluid' ,'url' => ['/updaterecord',$user->token],
            'enctype' => "multipart/form-data"]) !!}           
            @csrf
            @method('PUT')
                <div class="control-group">
                    <label  class="control-label" for="basicinput">Name</label>
                    <div class="controls">
                        <input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8" value="{{$user->name}}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Email</label>
                    <div class="controls">
                        <input name="email" type="text" id="basicinput" placeholder="Type something here..." class="span8" value="{{$user->email}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                </div>
            

                <div class="control-group">
                    <label class="control-label" for="basicinput">Password</label>
                    <div class="controls">
                        <input name="password" type="text" id="basicinput" placeholder="Type something here..." class="span8" value="">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                </div>
            

                <div class="control-group">
                    <label class="control-label" for="basicinput">Country</label>
                    <div class="controls">
                        <select name="country" id="country" tabindex="1" data-placeholder="Select Country" class="span8"  >
                            <option value="" >Select Country</option>
                            @foreach($countries as $country)
                             <option value="{{$country->id}}" {{ $country->id == $user->country ? "selected" : "" }}>{{$country->name}} </option>
                             @endforeach
                        </select>
                        @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">State</label>
                    <div class="controls">
                        <select name="state" id="state" tabindex="1" data-placeholder="Select State" class="span8"  >
                            <option value="" >Select State</option>
                        </select>
                        @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                </div>
           
                <div class="control-group">
                    <label class="control-label" for="basicinput">City</label>
                    <div class="controls">
                        <select name="city" id="city" tabindex="1" data-placeholder="Select City" class="span8"  >
                            <option value="" >Select City</option>
                        </select>
                        @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                </div>
            
            <div class="control-group">
                    <label class="control-label" for="basicinput">Date</label>
                    <div class="controls">
                        <input name="date" class="span8 date" value="{{$date}}"type="text">
                    </div>
               </div>

                <div class="control-group">
                    <label class="control-label">Gender</label>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" name="gender" id="optionsRadios1" value="1" {{ $user->gender == 1 ? "checked" : "" }}>
                            Male
                        </label> 
                        <label class="radio">
                            <input type="radio" name="gender" id="optionsRadios2" value= "2" {{ $user->gender == 2 ? "checked" : "" }}>
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
                    <label class="control-label">Hobbies</label>
                    <div class="controls">
                        <label class="checkbox inline">
                            <input name="hobbies[]" type="checkbox" value="1" {{ in_array(1, $hobbies) ? "checked" : "" }}>
                            Cricket
                        </label>
                        <label class="checkbox inline">
                            <input name="hobbies[]" type="checkbox" value="2"  {{ in_array(2, $hobbies) ? "checked" : "" }}>
                            Reading
                        </label>
                        <label class="checkbox inline">
                            <input name="hobbies[]" type="checkbox" value="3"  {{ in_array(3, $hobbies) ? "checked" : "" }}>
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
                    <label class="control-label">Academics</label>
                    <div class="controls">
                        <table id ="mytable" class="table table-bordered" >
								  <thead>
									<tr>
									  <th>Institue</th>
									  <th>Year</th>
									  <th>Percentage</th>
                                      <th><button id ="addmore" type="button" class="btn btn-small btn-inverse">Add More</button></th>
									</tr>
								  </thead>
								  <tbody>
                                  @for($i=0; $i < count($academics['name']); $i++)
									<tr>
									  <td><input name="academics[name][]" type="text" class="span12" value="{{$academics['name'][$i]}}"></td>
									  <td><input name="academics[year][]" type="text" class="span12" value="{{$academics['year'][$i]}}"></td>
									  <td><input name="academics[percentage][]" type="text" class="span12" value="{{$academics['percentage'][$i]}}"></td>
                                      <td><button type="button"  class="btn btn-small btn-danger remove_row">Remove</button></td>
									</tr>
                                    @endfor


								  </tbody>
								</table>
                                </div>
                                </div>  

                <div class="control-group">
                    <label class="control-label" for="basicinput">Address</label>
                    <div class="controls">
                        <textarea  name ="address" class="span8" rows="5" >{{$user->address}}</textarea>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                  
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button  type="submit" class="btn">Submit Form</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!--/.content-->
@endsection

@section('custom_js')
<script src="{{asset('bootstrap/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function()
{
    $("select#country").on("change", function(){
        var cid = $(this).val();
        if(cid)
        {
            $.ajax({
                method: "GET",
                url: "/getStates/"+cid,
                async: false
            })
            .done(function( msg ) {
                $("select#state").html(msg);
            });
        }
    });

    $("select#state").on("change", function(){
        var cid = $(this).val();
        if(cid)
        {
            $.ajax({
                method: "GET",
                url: "/getCities/"+cid,
                async: false
            })
            .done(function( msg ) {
                $("select#city").html(msg);
            });
        }
    });

    $("button#addmore").on("click",function() {
       
       var row = `<tr>
                    <td><input name="academics[name][]" type="text" class="span12"></td>
                    <td><input name="academics[year][]" type="text" class="span12"></td>
                    <td><input name="academics[percentage][]" type="text" class="span12"></td>
                    <td><button type="button" class="btn btn-small btn-danger remove_row">Remove</button></td>
                </tr>`;

        $("tbody", "table#mytable").append(row);
    });

    $(document).on("click", "button.remove_row", function(){
        $(this).parent().parent().remove();
    });

      $("select#country").trigger("change");
      $("select#state").val({{$user->state}}).trigger("change");
      $("select#city").val({{$user->city}});
});



</script>
<script type="text/javascript">

    $('.date').datepicker({

        format: 'mm-dd-yyyy'

    });

</script> 
@endsection