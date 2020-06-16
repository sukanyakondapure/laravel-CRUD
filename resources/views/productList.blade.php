@extends('layouts.app')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>List Product</h3>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput" >Category</label>
            <div class="controls">
                <select name="category"  id="category" tabindex="1" data-placeholder="Select Category" class="span3 input">
                    <option value="">Select Category </option>
                    @foreach($categories as $category)

                    <option value="{{$category->id}}" >{{$category->name}} </option>
                    @endforeach
                </select>
                <form action="{{ route('export') }}" method="get" target="_blank">
                    <input type="submit" value="Export">
                </form>

            </div>
        </div>
        <div class="module-body">
            <table id="product_listing" class='table table-striped' style="width:100%">
                <thead>
                     <tr>
                        <th></th>
                        <th><input type="text" id="product_name" class="span1" placeholder="Product Name"></th>
                        <th><input type="text" id="cat_input" class="span1" placeholder="Categories"></th>
                        <th><input type="text" id="type" class="span1" placeholder="Type"></th>
                        <th><input type="text" id="colour" class="span1" placeholder="Colour"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Colour</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>                                    		                                                                  
        </div>

    </div>
</div><!--/.content-->
@endsection
@section('custom_css')
<link  href="{{asset('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('custom_js')
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js')}}" type="text/javascript"></script>

<!--https://code.jquery.com/jquery-3.3.1.js
https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js//
https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js-->

<script>
jQuery(function () {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    var user_list = jQuery('#product_listing').DataTable({
         "responsive": true,
            processing: true,
            serverSide: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: 0
            }],
            bFilter: false,
        ajax: {
            url: "{{ url('/product-table-data') }}",
            data: function (d) {
                d.user_type = jQuery('#user_type').val();
                d.keyword = $('.dataTables_filter input').val();
                d.name = jQuery('input#product_name').val();
                d.cat_input = jQuery('input#cat_input').val();
                d.type = jQuery('input#type').val();
                d.colour = jQuery('input#colour').val();
            }
        },
        columns: [
            {data: 'id', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'type', name: 'type'},
            {data: 'colour', name: 'colour'},
            {data: 'action', name: 'action', orderable: false, searchable: true}
        ],
        dom: 'Bfrtip',
        buttons:  [ {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                    
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4]
                }
            },
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            }
            ]


    });
    var table = $('#product_listing').DataTable();
    $('select#category').on('change', function () {
        var cid = $(this).val();
//            alert(cid);
        table
                .column(2)
                .search(cid)
                .draw();
    });
//    
//    $("#product_listing input").on('keyup click', function() {
//    table.columns([0, 1, 3, 4]).search($(this).val()).draw();
//    alert("Here");
//});
//     var table = $('#product_listing').DataTable();
//    $('select#category').on('change', function () {
//        
//        $('#product_listing').dataTable().fnFilter('');
//
//        $('.dataTables_filter input').val('');
//        var cid = $(this).val();
////            alert(cid);
//        table
//                .column(2)
//                .search(cid)
//                .draw();
//    });

//         $('#product_listing').on('search.dt', function() {
//             var sid= $('.dataTables_filter input').val();
//               alert(sid);
//              table 
//                    .column($(this).parent().index() + ':visible')
//                    .search(this.value)
//                    .draw();
// }); 

    jQuery(document).on('click', '.user_delete_alert', function () {
        if (confirm("Are you sure you want to delete the User?"))
            jQuery(this).parent().submit();
    });
$('#product_listing').on('keyup', 'thead th input[type=text]', function () {
            user_list.column($(this).parent().index() + ':visible').search(this.value).draw();
        });


});
</script>

@endsection
