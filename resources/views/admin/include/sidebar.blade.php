      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
              
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">ADMIN PANEL</li>
            <li class="{{ Request::is('admin') ? 'active' : null }}">
              <a href="{!!URL::route('home')!!}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/newsletter') ? 'active' : null }}">
              <a href="{!!URL::route('newsletter')!!}">
                <i class="fa fa-at"></i>
                <span>Newsletter E-mails</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/contact') ? 'active' : null }}">
              <a href="{!!URL::route('admin/contact')!!}">
                <i class="fa fa-users"></i>
                <span>Contact Inquiries</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/blog') ? 'active' : null }}">
              <a href="{!!URL::route('admin/blog')!!}">
                <i class="fa fa-coffee"></i>
                <span>Manage Blog</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/event') ? 'active' : null }}">
              <a href="{!!URL::route('admin/event')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage Events</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/pages') ? 'active' : null }}">
              <a href="{!!URL::route('admin/pages')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage Pages</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/faq') ? 'active' : null }}">
              <a href="{!!URL::route('admin/faq')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage FAQ'S</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/menu') ? 'active' : null }}">
              <a href="{!!URL::route('admin/menu')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage Menu</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/home') ? 'active' : null }}">
              <a href="{!!URL::route('admin/home')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage HomePage</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>