<option value="">Select product</option>
@foreach($products as $product)
<option value="{{$product->id}}">{{$product->name}}</option>
@endforeach