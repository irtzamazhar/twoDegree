      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
              
            </div>
              @php 
              $url = Route::currentRouteName();
              @endphp
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
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
            <li class="{{ Request::is('admin/contact*') ? 'active' : null }}">
              <a href="{!!URL::route('admin/contact')!!}">
                <i class="fa fa-users"></i>
                <span>Contact Inquiries</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/blog*') ? 'active' : null }}">
              <a href="{!!URL::route('admin/blog')!!}">
                <i class="fa fa-coffee"></i>
                <span>Manage Blog</span>
              </a>
            </li>
            <li class="{{ $url == 'admin/event' ? 'active' : '' }}
                {{ $url == 'createEvent' ? 'active' : '' }}
                {{ $url == 'editEvent' ? 'active' : '' }}
                {{ $url == 'showEvent' ? 'active' : '' }}
                {{ $url == 'addEventBanner' ? 'active' : null }}">
              <a href="{!!URL::route('admin/event')!!}">
                <i class="fa fa-calendar"></i>
                <span>Manage Events</span>
              </a>
            </li>
            <li class="{{ $url == 'admin/pages' ? 'active' : '' }}
                {{ $url == 'createPage' ? 'active' : '' }}
                {{ $url == 'editPage' ? 'active' : '' }}
                {{ $url == 'showPage' ? 'active' : '' }}">
              <a href="{!!URL::route('admin/pages')!!}">
                <i class="fa fa-files-o"></i>
                <span>Manage Pages</span>
              </a>
            </li>
            <li class="{{ $url == 'admin/faq' ? 'active' : '' }}
                {{ $url == 'createFaq' ? 'active' : '' }}
                {{ $url == 'editFaq' ? 'active' : '' }}
                {{ $url == 'showFaq' ? 'active' : '' }}
                {{ $url == 'addFaqBanner' ? 'active' : null }}">
              <a href="{!!URL::route('admin/faq')!!}">
                <i class="fa fa-question"></i>
                <span>Manage FAQ'S</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/menu') ? 'active' : null }}">
              <a href="{!!URL::route('admin/menu')!!}">
                <i class="fa fa-wrench"></i>
                <span>Manage Menu</span>
              </a>
            </li>
            <li class="{{ $url == 'admin/home' ? 'active' : '' }}
                {{ $url == 'createSection' ? 'active' : '' }}
                {{ $url == 'editSection' ? 'active' : '' }}
                {{ $url == 'showSection' ? 'active' : '' }}">
              <a href="{!!URL::route('admin/home')!!}">
                <i class="fa fa-home"></i>
                <span>Manage HomePage</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/shop') ? 'active' : null }}">
              <a href="{!!URL::route('admin/shop')!!}">
                <i class="fa fa-wrench"></i>
                <span>Manage Shop</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>