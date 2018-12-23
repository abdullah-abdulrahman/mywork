<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Menu header -->
        <li class="header">Control Panel</li>

        <!-- Home tree -->
        <li id="home-treeview" class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul id="home-treeview-menu" class="treeview-menu">
            <li><a href="{{route('admin.slider')}}"><i class="fa fa-angle-right"></i> Slider</a></li>
            <li><a href="{{route('admin.about')}}"><i class="fa fa-question"></i> About Us</a></li>
            <li><a href="{{route('admin.team')}}"><i class="fa fa-user"></i> Our Team</a></li>
            <li><a href="{{route('admin.facts')}}"><i class="fa fa-info-circle"></i> Facts</a></li>
            <li><a href="{{route('admin.partners')}}"><i class="fa fa-users"></i> Partners</a></li>
            <li><a href="{{route('admin.contact')}}"><i class="fa fa-phone"></i> Contact us</a></li>
          </ul>
        </li>

        <li>
          <a href="{{route('admin.projects')}}">
            <i class="fa fa-th"></i> <span>Projects</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.services')}}">
            <i class="fa fa-th"></i> <span>Services</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.inbox')}}">
            <i class="fa fa-envelope-open"></i> <span>Inbox</span>
          </a>
        </li>
  
        <li>
          <a href="{{route('admin.mailinglist')}}">
            <i class="fa fa-at"></i> <span>MailingList</span>
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