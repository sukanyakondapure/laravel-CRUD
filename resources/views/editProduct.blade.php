@extends('layouts.app')

@section('content')
<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Add Category</h3>
        </div>
        <div class="module-body">


            <br />

            <form class="form-horizontal row-fluid" method="POST" action="{{url('addProduct')}}">
                @csrf
                 <div class="control-group">
                    <label class="control-label" for="basicinput">Category</label>
                    <div class="controls">
                        <select name="category" id="category" tabindex="1" data-placeholder="Select Category" class="span8">
                            @foreach($categories as $Category)
                            <option value="{{$Category->id}}"> {{$Category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                <div class="control-group">
                    <label  class="control-label" for="basicinput">Product Name</label>
                    <div class="controls">
                        <input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="basicinput">Type</label>
                    <div class="controls">
                        <input name="type" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                       
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Colour</label>
                    <div class="controls">
                        <input name="colour" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                       
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" for="basicinput">Price</label>
                    <div class="controls">
                        <input name="price" type="text" id="basicinput" placeholder="Type something here..." class="span8">
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

