<nav class="navbar navbar-default mynav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a type="a" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="navbar-brand" href="{{route('home')}}">Me Duhet</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li {{{ (Request::is('control-center') ? 'class=active' : '') }}}><a href="{{route('admin-control-center')}}"><i class="fa fa-home" aria-hidden="true"></i>
 Home</span></a></li>
          @can('manage-users')
            <li {{{ (Request::is('control-center/users') ? 'class=active' : '') }}}><a href="{{route('user-index')}}"><i class="fa fa-user" aria-hidden="true"></i>
   Users</span></a></li>
          @endcan
          @can('manage-cities')
            <li {{{ (Request::is('control-center/category') ? 'class=active' : '') }}}><a href="{{route('category-index')}}"><i class="fa fa-clone" aria-hidden="true"></i>
  </span> Categories</a></li>
          @endcan
          @can('manage-categories')
            <li {{{ (Request::is('control-center/city') ? 'class=active' : '') }}}><a href="{{route('city-index')}}"><i class="fa fa-university" aria-hidden="true"></i>
   Cities</a></li>
          @endcan
          @can('manage-permissions')
            <li {{{ (Request::is('control-center/permission') ? 'class=active' : '') }}}><a href="{{route('permission-index')}}"><i class="fa fa-check" aria-hidden="true"></i>
   Permissions</a></li>
          @endcan
          @can('manage-roles')
            <li {{{ (Request::is('control-center/role') ? 'class=active' : '') }}}><a href="{{route('role-index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
    Roles</a></li>
          @endcan
          @can('manage-needs')
            <li {{{ (Request::is('control-center/needs') ? 'class=active' : '') }}}><a href="{{route('admin-need-index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
           Needs</a></li>
          @endcan
          @can('manage-products')
            <li {{{ (Request::is('control-center/products') ? 'class=active' : '') }}}><a href="{{route('admin-product-index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
            Products</a></li>
          @endcan
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="a" aria-haspopup="true" aria-expanded="false">{{Auth::user()->firstname}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('admin-profile')}}">My Profile</a></li>
                <li><a href="#">Another action</a></li>
                @role('super_admin')
                  <li><a href="{{route('admin-control-center')}}">Control Center</a></li>
                @endrole
                <li role="separator" class="divider"></li>
                <li><a href="{{route('logout')}}">Qkyqu</a></li>
              </ul>
            </li>
          @else
            <li><a href="{{route('login')}}" class="border-a">Kyqu</i></a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
