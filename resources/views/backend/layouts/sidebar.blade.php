<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Mytomga</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--            <li class="header">MAIN NAVIGATION</li>-->
            <!--            <li class="active treeview">-->
            <!--                <a href="mvc.local/">-->
            <!--                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>-->
            <!--                </a>-->
            <!--            </li>-->
            <li>
                <a href="{{asset('/admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

{{--            <li>--}}
{{--                <a href="{{route('banner.create')}}">--}}
{{--                    <i class="fa fa-th"></i> <span>Banner</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--            </span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Banner</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.banner.index')}}"><i class="fa fa-circle-o"></i> Qu???n L?? Banner</a></li>
                    <li><a href="{{route('admin.banner.create')}}"><i class="fa fa-circle-o"></i> T???o M???i Banner</a></li>
                </ul>
            </li>

            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-book"></i> <span>Qu???n L?? Danh m???c</span></a></li>

            <li class="header">Other</li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Qu???n L?? B??i Vi???t</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.article.index')}}"><i class="fa fa-circle-o"></i> Danh S??ch B??i Vi???t</a></li>
                    <li><a href="{{route('admin.article.create')}}"><i class="fa fa-circle-o"></i> Th??m M???i B??i Vi???t</a></li>
                </ul>
            </li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Qu???n L?? H??? Th???ng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.setting.index')}}"><i class="fa fa-circle-o"></i> Thay ?????i Th??ng Tin</a></li>
                </ul>
            </li>

            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>

            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-book"></i> <span>Qu???n L?? C???u H??nh</span></a></li>

{{--            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
{{--            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
{{--            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
