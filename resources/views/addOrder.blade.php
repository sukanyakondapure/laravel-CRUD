@extends('layouts.app')

@section('content')
<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Add User</h3>
        </div>
        <div class="module-body">


            <br />

            <form class="form-horizontal row-fluid" method="POST" action="{{url('addOrder')}}">
                @csrf
                <div class="control-group">
                    <label  class="control-label" for="basicinput">Name</label>
                    <div class="controls">
                        <input name ="name" type="text"  id="basicinput" placeholder="Type something here..." class="span8">
                        
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Address</label>
                    <div class="controls">
                        <input name="address" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                        
                    </div>

                </div>


                <div class="control-group">
                    <label class="control-label" for="basicinput">Email</label>
                    <div class="controls">
                        <input name="email" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                        
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Contact</label>
                    <div class="controls">
                        <input name="contact" type="text" id="basicinput" placeholder="Type something here..." class="span8">
                        
                    </div>

                </div>

                <br>
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th><button type="button" class="btn btn-small btn-inverse" id="add_btn" >Add More</button></th>
                        </tr>
                    </thead>
                    <tbody id="append" >
                        <tr class="app">
                            <td> <select name="orders[category][]" id="category" tabindex="1" data-placeholder="Select Category" class="span8 category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                            </select>
                            </td>
                            <td><select name="orders[product][]" id="product" tabindex="1" data-placeholder="Select Product" class="span8 product">
                               <option value="">Select product</option>
                                </select> </td>
                            <td><input type="text"  id="quantity" name="orders[quantity][]" class="span8 quantity"></td>
                            <td><input type="text"  id="price_o" name="orders[price_o][]" class="span8 price_o "></td>
                            <td><input type="text"  id="total"  name="orders[total][]" class="span8 total2"></td>
                            <td><button type="button" class="btn btn-small btn-danger" id="remove_btn" >Remove</button></td>
                          
                        
                        </tr>
                        
                    </tbody>
                    
                   
                </table>
                <div class="controls">
                        <label style="float: right;">Total:<label id="lbl" style="display: inline;"></label></label>
                    </div>
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
<script>
    $(document).ready(function ()
    {
        

        
        $("button#add_btn").click(function(){
          var row = `<tr class="app">
                           <td> <select name="orders[category][]" id="category" tabindex="1" data-placeholder="Select Category" class="span8 category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                            </select>
                            </td>
                            <td><select name="orders[product][]" id="product" tabindex="1" data-placeholder="Select Product" class="span8 product">
                               <option value="">Select product</option>
                                </select> </td>
                            <td><input type="text"  id="quantity" name="orders[quantity][]" class="span8 quantity"></td>
                            <td><input type="text"  id="price_o" name="orders[price_o][]" class="span8 price_o "></td>
                            <td><input type="text"  id="total"  name="orders[total][]" class="span8 total2"></td>
                            <td><button type="button" class="btn btn-small btn-danger" id="remove_btn" >Remove</button></td>
                        </tr>`;  
         $("tbody#append").append(row);
          });
         
        $(document).on('click','#remove_btn',function(){  
            $(this).parent().parent().remove();
           });
           
          $(document).on('change','.category', function () {
            var cid = $(this).val();
            if (cid)
            {
                $.ajax({
                    method: "GET",
                    url: "/getProduct/" + cid
                })
                        .done((msg)=> {
                            $(this).parent().parent().find("td select.product").html(msg);
                        });
            }
        });
         $(document).on('change','#product', function () {
            var cid = $(this).val();
            
            if (cid)
            {
                $.ajax({
                    method: "GET",
                    url: "/getPrice/" + cid,
                   
                })
                        .done((msg)=>  {
                           
                            $(this).parent().parent().find("td .price_o").val(msg);
                        });
            }
        });
         $(document).on('keyup','.quantity', function () {
             var i= $(this).parent().parent().find("td .price_o").val();
             var j= $(this).parent().parent().find("td .quantity").val();
            var total_var=0,temp=0;
           
                $(this).parent().parent().find("td .total2").val(i*j);
                
                 $(".app").each(function(){
                   var total_var = $(this).find("td .total2").val();
                   if(total_var!=""){
                   temp = parseInt(temp) + (parseInt(total_var));
                   }
                });
               document.getElementById('lbl').innerHTML = temp;
        });
         
    });
</script>
@endsection