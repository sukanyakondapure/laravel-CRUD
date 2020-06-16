@extends('layouts.app')

@section('content')
<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Add Category</h3>
        </div>
        <div class="module-body">


            <br />

            <form class="form-horizontal row-fluid" method="POST" action="{{route('/editProduct',$->id)}}">
                @csrf
                @method('PUT')
                <div class="control-group">
                    <label  class="control-label" for="basicinput">Category Name</label>
                    <div class="controls">
                        <input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="basicinput">Description</label>
                    <div class="controls">
                        <input name="description" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                       
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

