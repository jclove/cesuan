<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://storage.zunyue.me/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">

            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-user"></i>
                    <span>数据统计</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user"></i>
                    <span>用户管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    <span>订单管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.commission.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    <span>佣金记录</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.cash.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    <span>提现记录</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-home"></i>
                    <span>产品管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('product-class.index') }}">
                    <i class="fa fa-home"></i>
                    <span>产品分类管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.hot.index') }}">
                    <i class="fa fa-home"></i>
                    <span>热门管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.resource.index') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>资源管理</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.system.edit') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>系统配置</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.adminUser.edit') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>修改密码</span>
                </a>
            </li>
        </ul>
    </section>
</aside>