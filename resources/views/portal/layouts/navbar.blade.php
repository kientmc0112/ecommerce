<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('users.edit', auth()->id()) }}"><i class="fa fa-user fa-fw"></i> Hồ sơ cá nhân</a>
                </li>
                <li><a href="{{ route('system.show') }}"><i class="fa fa-gear fa-fw"></i> Thông tin hệ thống</a>
                </li>
                <li class="divider"></li>
                <li id="logout">
                    <a><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                    <form id="logout-form" action="{{ route('portal.auth.logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"><i class="fa fa-th-list fa-fw"></i> Danh mục<span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('categories.create') }}">Tạo mới</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cubes fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('products.create') }}">Tạo mới</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wechat fa-fw"></i> Liên hệ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('contacts.index') . '?status=0' }}">Mới</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts.index')  . '?status=1'}}">Đang xử lí</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts.index')  . '?status=2'}}">Hoàn thành</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Quản trị viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('users.create') }}">Tạo mới</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>