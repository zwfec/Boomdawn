<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="brand" href="{{ url('manage') }}">Boomdawn</a>

        <ul class="nav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                    {{ session('username') }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('manage/change-pwd') }}">修改密码</a></li>
                  <li><a href="{{ url('/') }}" target="_blank">返回前台</a></li>
                </ul>
            </li>
            <li class="settings hidden-phone">
                <a href="{{ url('manage/logout') }}" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
