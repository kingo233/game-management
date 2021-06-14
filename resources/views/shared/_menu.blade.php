<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
        <a href="#" class="nav-link @yield('self_management','')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            个人信息管理
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('users.show',$user) }}" class="nav-link @yield('edit','')">
                <i class="far fa-circle nav-icon"></i>
                <p>编辑资料</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('showcharge',$user) }}" class="nav-link @yield('charge','')">
                <i class="far fa-circle nav-icon"></i>
                <p>充值</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('charge_history',$user) }}" class="nav-link @yield('charge_history','')">
                <i class="far fa-circle nav-icon"></i>
                <p>充值记录</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('users.show_complain',$user) }}" class="nav-link @yield('show_complain','')">
                <i class="far fa-circle nav-icon"></i>
                <p>账号申诉</p>
            </a>
            </li>

            @if($user->priority == 3)
            <li class="nav-item">
                <a href="{{ route('showdie',$user) }}" class="nav-link @yield('selfdie','')">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>销毁账号</p>
                </a>
            </li>
            @endif
        </ul>
        </li>

        @if($user->priority == 0 || $user->priority == 1)
        <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('user_management','')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    玩家管理
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.showall',$user) }}" class="nav-link @yield('modify_table','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>玩家信息修改</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.banall',$user) }}" class="nav-link @yield('ban_table','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>封禁账号</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('users.complain_table',$user) }}" class="nav-link @yield('complain_table','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>处理申诉</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if($user->priority == 0)
        <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('admin_management','')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    管理员管理
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admins.show') }}" class="nav-link @yield('priority_manage','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>管理权限</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admins.create') }}" class="nav-link @yield('create_admin','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>创建管理员</p>
                    </a>
                </li>
                
            </ul>
        </li>
        @endif

        @if($user->priority == 0 || $user->priority == 2)
        <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('virtual_data_management','')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    虚拟数据管理
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('weapons.show') }}" class="nav-link @yield('weapon_manage','')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>管理武器数据</p>
                    </a>
                </li>

                
            </ul>
        </li>
        @endif

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