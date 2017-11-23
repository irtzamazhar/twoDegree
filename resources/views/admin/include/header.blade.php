      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>DA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>TwoDegree</b> Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#"  class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                    <td>{!! Html::image("storage/app/public/thumbnail/".Auth::user()->image,'alt', array('class'=>'user-image')) !!}</td>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                     {!! Html::image("storage/app/public/thumbnail/".Auth::user()->image,'alt', array('class'=>'img-circle')) !!}
                    
                    
                    <p>
                     {{ Auth::user()->name }}
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{route('profile')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <!-- <a href="" class="btn btn-default btn-flat">Sign out</a> -->
                       <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>