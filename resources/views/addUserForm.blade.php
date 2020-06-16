@extends('layouts.app')
@section('custom_css')

<link type="text/css" href="{{ asset('bootstrap/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Add User</h3>
        </div>
        <div class="module-body">


            <br />

            <form class="form-horizontal row-fluid" method="POST" action="{{url('addUser')}}">
                @csrf
                <div class="control-group">
                    <label  class="control-label" for="basicinput">Name</label>
                    <div class="controls">
                        <input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8">
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
                        <input name="email" type="text" id="basicinput" placeholder="Type something here..." class="span8">
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
                        <input name="password" type="text" id="basicinput" placeholder="Type something here..." class="span8">
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
                        <select name="country" id="country" tabindex="1" data-placeholder="Select here.." class="span8">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
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
                        <select name="state" id="state" tabindex="1" data-placeholder="Select State" class="span8">
                            <option value="">Select State</option>

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
                        <select name="city" id="city" tabindex="1" data-placeholder="Select City" class="span8">
                            <option value="">Select City</option>

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
                        <input  name="date" class="span8 date" type="text">
                    </div>
               </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">User Type</label>
                    <div class="controls">
                        <select name="dashboard" id="dashboard" tabindex="1" data-placeholder="Select User Type" class="span8">
                            <option value="">Select User Type</option>
                            <option value="admin">admin</option>
                            <option value="manager">manager</option>

                        </select>
                    </div>

                </div>

                <br>
                <input type="hidden" class="user_type" name="user_type" value="1">



                <div class="control-group">
                    <label class="control-label">Gender</label>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" name="gender" id="optionsRadios1" value="1" >
                            Male
                        </label> 
                        <label class="radio">
                            <input type="radio" name="gender" id="optionsRadios2" value= "2">
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
                            <input name="hobbies[]" type="checkbox" value="1">
                            Cricket
                        </label>
                        <label class="checkbox inline">
                            <input name="hobbies[]" type="checkbox" value="2">
                            Reading
                        </label>
                        <label class="checkbox inline">
                            <input name="hobbies[]" type="checkbox" value="3">
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
                    <label class="control-label" for="basicinput">Address</label>
                    <div class="controls">
                        <textarea name ="address" class="span8" rows="5"></textarea>
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
                            <th><button type="button" class="btn btn-small btn-inverse add" >Add More</button></th>
                        </tr>
                    </thead>
                    <tbody class="app" >
                        <tr>
                            <td> <input type="text"  id="input" name="academics[name][]" class="span8 "></td>
                            <td><input type="text"  id="input" name="academics[year][]" class="span8 "></td>
                            <td><input type="text"  id="input" name="academics[marks][]" class="span8 "></td>
                            <td><input type="text"  id="input" name="academics[percentage][]" class="span8 "></td>
                            <td><button type="button" class="btn btn-small btn-danger remove_btn" >Remove</button></td>
                        </tr>
                    </tbody>
                </table>

                <br>

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
        $("select#dashboard").on("change", function () {
            var cid = $(this).val();

            if ($(this).val() === 'manager')
            {
//                 alert(cid);
                $(".user_type").val("2");
            }

        });

        $("button.add").click(function () {
            var row = `<tr >
                            <td> <input type="text"  id="input"  name="academics[name][]" class="span8 "></td>
                            <td><input type="text"  id="input" name="academics[year][]" class="span8 "></td>
                            <td><input type="text"  id="input"  name="academics[marks][]" class="span8 "></td>
                            <td><input type="text"  id="input" name="academics[percentage][]" class="span8 "></td>
                            <td><button type="button" class="btn btn-small btn-danger remove_btn" >Remove</button></td>
                        </tr>`;
            $("tbody.app").append(row);
        });

        $(document).on('click', '.remove_btn', function () {
            $(this).parent().parent().remove();
        });

    });


</script>

<script type="text/javascript">

    $('.date').datepicker({

        format: 'mm-dd-yyyy'

    });

</script> 



@endsection