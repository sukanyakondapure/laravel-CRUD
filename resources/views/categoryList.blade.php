@extends('layouts.app')

@section('content')
  
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>List Category</h3>
        </div>
        <div class="module-body">
            <table id="category_listing" class='table table-striped' style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>                                    		                                                                  
        </div>
    </div>
</div><!--/.content-->
@endsection
@section('custom_css')
<link  href="{{asset('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('custom_js')
<script src="{{asset('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script>
    jQuery(function () {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var user_list = jQuery('#category_listing').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/category-table-data') }}",
                data: function (d) {
                    d.user_type = jQuery('#user_type').val();
                }
            },
            columns: [
                {data: 'id', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        jQuery(document).on('click', '.user_delete_alert', function () {
            if (confirm("Are you sure you want to delete the User?"))
                jQuery(this).parent().submit();
        })
    });
</script>

@endsection
