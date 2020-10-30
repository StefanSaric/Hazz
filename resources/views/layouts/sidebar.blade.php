<!-- BEGIN SIDEBAR-->
<div id="sidebar">
    <div class="sidebar-back"></div>
    <div class="sidebar-content">
        <div class="nav-brand">
            <a class="main-brand" href="{{ asset('admin')}}">
                <h3 class="text-light text-white"><span>Boost<strong>Box</strong> </span><i class="fa fa-rocket fa-fw"></i></h3>
            </a>
        </div>

        <!-- BEGIN MENU SEARCH -->
        <form class="sidebar-search" role="search">
            <a href="javascript:void(0);"><i class="fa fa-search fa-fw search-icon"></i><i class="fa fa-angle-left fa-fw close-icon"></i></a>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control navbar-input" placeholder="Search...">
                    <span class="input-group-btn">
									<button class="btn btn-equal" type="button"><i class="fa fa-search"></i></button>
								</span>
                </div>
            </div>
        </form>
        <!-- END MENU SEARCH -->
        <!-- BEGIN MAIN MENU -->
        <ul class="main-menu">
            <!-- Menu Dashboard -->
            <li>
                <a href="{{ url('/admin')}}" >
                    <a href=" <?php echo url('admin'); ?> " <?php if($active=="dash"){ echo "class='active'";}?> ">
                    <i class="fa fa-cogs  fa-fw"></i><span class="title">Dashboard</span>
                </a>
            </li>
            <!--end /menu-item -->
            <!-- Menu UI -->
{{--                <li>--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <i class="fa fa-user fa-fw"></i><span class="title">Users</span> <span class="expand-sign">+</span>--}}
{{--                    </a>--}}
{{--                    <!--start submenu -->--}}
{{--                    <ul>--}}
{{--                        <li><a href="<?php echo url('admin\users'); ?>" <?php if($active == 'allUsers'){ echo "class='active'";}?> >All Users</a></li>--}}
{{--                        <li><a href="<?php echo url('admin\users\create'); ?>" <?php if($active == 'addUser'){ echo "class='active'";}?> >Create User</a></li>--}}
{{--                    </ul>--}}
{{--                    <!--end /submenu -->--}}
{{--                </li>--}}
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-user fa-fw"></i><span class="title">Products</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="<?php echo url('admin\products'); ?>" <?php if($active == 'allProducts'){ echo "class='active'";}?> >All Products</a></li>
                        <li><a href="<?php echo url('admin\products\create'); ?>" <?php if($active == 'addProduct'){ echo "class='active'";}?> >Create Product</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>
            <!--end /menu-item -->
            <!-- Menu Pages -->
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

    </div>
</div><!--end #sidebar-->
<!-- END SIDEBAR -->
