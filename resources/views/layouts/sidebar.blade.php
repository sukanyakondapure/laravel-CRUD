
<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="{{url(auth()->user()->dashboard.'/home')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
        </li>
        <li><a href="/addUserForm"><i class="menu-icon icon-inbox"></i>Add User<b class="label green pull-right">
                    11</b> </a></li>
        <li><a href="/categoryList"><i class="menu-icon icon-tasks"></i>List Category <b class="label orange pull-right">
                    19</b> </a></li>
        <li><a href="/userList"><i class="menu-icon icon-tasks"></i>Manage Users <b class="label orange pull-right">
                    19</b> </a></li>
         <li><a href="/userList1"><i class="menu-icon icon-tasks"></i>Users Data Table<b class="label orange pull-right">
                    19</b> </a></li>
    </ul>
    <!--/.widget-nav-->
    @if(auth()->user()->dashboard=="admin")
    <ul class="widget widget-menu unstyled">
        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>Category </a>
            <ul id="togglePages" class="collapse unstyled">
                <li><a href="/addCategory"><i class="icon-inbox"></i>Add Category</a></li>
                <li><a href="/categoryList"><i class="icon-inbox"></i>List Category</a></li>
               
            </ul>
        </li>
        
        <li><a class="collapsed" data-toggle="collapse" href="#togglePages1"><i class="menu-icon icon-cog">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>Product</a>
            <ul id="togglePages1" class="collapse unstyled">
                <li><a href="/addProduct"><i class="icon-inbox"></i>Add Product</a></li>
                <li><a href="/productList"><i class="icon-inbox"></i>List Product</a></li>
               
            </ul>
        </li>
        
       
        <li><a class="collapsed" data-toggle="collapse" href="#togglePages2"><i class="menu-icon icon-cog">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>Order</a>
            <ul id="togglePages2" class="collapse unstyled">
                <li><a href="/addOrder"><i class="icon-inbox"></i>Add Order</a></li>
                <li><a href="/orderListForm"><i class="icon-inbox"></i>List Order</a></li>
               
            </ul>
        </li>
        
    
        
    </ul>
     @endif
    
  
    
    <ul class="widget widget-menu unstyled">
        <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
        <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
    </ul>
    <!--/.widget-nav-->
    
    
</div>
