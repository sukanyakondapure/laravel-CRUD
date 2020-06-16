@extends('layouts.app')

@section('content')
<div class="content">

    <div class="module">
        <div class="module-head">
            <h3>Tables</h3>
            <a href="/addUserForm" class="btn btn-small btn-primary" style="float: right; margin-top: -23px;">Add User</a>
        </div>
        <div class="module-body">
            <p>
            <!--
                <strong>Default</strong>
                -
               <small>table class="table"</small> -->
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->getCountry->name}}</td>
            <td>{{$user->getState->name}}</td>
            <td>{{$user->getCity->name}}</td>
            <td>
                <a href="{{url('editUserForm/'.$user->token ) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form method="POST" action="/deleterecord/{{$user->token}}" accept-charset="UTF-8" style="display:inline">
                @csrf
                <input name="_method" value="DELETE" type="hidden">
                <button type="button" class="btn btn-mini btn-danger user_delete_alert"  title="Delete User"><i class="icon-remove"></i></button>
            </form>
            </td>
           
            @endforeach
        </tr>
        
       
                </tbody>
            </table>

           
        </div>
    </div>

    

</div><!--/.content-->
@endsection

@section('custom_js')
<script>
$(document).ready(function()
{
    $("button.user_delete_alert").on("click", function(){
        if(confirm("Are you sure you want to delete the User?"))
        {
            $(this).parent().submit();    
        }
    });
});
</script>
@endsection
