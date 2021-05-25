<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            个人信息管理
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('users.show',$user) }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>编辑资料</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>查看充值信息</p>
            </a>
            </li>

            @if($user->priority == 3)
            <li class="nav-item">
                <a href="{{ route('showdie',$user) }}" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>销毁账号</p>
                </a>
            </li>
            @endif
        </ul>
        </li>

        <li class="nav-item">
        <a href="#" class="nav-link">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-block btn-danger" type="submit" name="button">退出登录</button>
            </form>
        </a>
        </li>
    </ul>
</nav>