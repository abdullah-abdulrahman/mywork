<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Menu header -->
        <li class="header">Control Panel</li>

        <!-- Home tree -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.slider')}}"><i class="fa fa-angle-right"></i> Slider</a></li>
            <li><a href="{{route('admin.about')}}"><i class="fa fa-question"></i> About Us</a></li>
            <li><a href="{{route('admin.team')}}"><i class="fa fa-user"></i> Our Team</a></li>
            <li><a href="{{route('admin.facts')}}"><i class="fa fa-info-circle"></i> Facts</a></li>
            <li><a href="{{route('admin.partners')}}"><i class="fa fa-users"></i> Partners</a></li>
            <li><a href="{{route('admin.contact')}}"><i class="fa fa-phone"></i> Contact us</a></li>
          </ul>
        </li>

        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Service One</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Service Two</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Service Three</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Service Four</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Service Five</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Service Six</a></li>
            <li><a href="#"><i class="fa fa-plus-square"></i> Add new</a></li>
          </ul>
        </li> --}}

        <li>
          <a href="{{route('admin.services')}}">
            <i class="fa fa-th"></i> <span>Services</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.gallery')}}">
            <i class="fa fa-image"></i> <span>Gallery</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.settings')}}">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>