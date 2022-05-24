<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
       
        <div class="logo">
          <a href="{{ route('admin.dashboard')}}" class="simple-text logo-normal">
           Admin Dasbboard
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item  {{Request::is('admin/dashboard*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.dashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item {{Request::is('admin/slider*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('slider.index') }}">
                <i class="material-icons">Slider</i>
                <p>Slide Show</p>
              </a>
            </li>
            <li class="nav-item {{ Request::is('admin/about*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('about.index')}}">
                <i class="material-icons">About-us</i>
                <p>About-us</p>
              </a>
            </li>
            <li class="nav-item {{ Request::is('admin/category*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('category.index')}}">
                <i class="material-icons">category</i>
                <p>Category</p>
              </a>
            </li>
 
            
            <li class="nav-item {{ Request::is('admin/item*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('item.index')}}">
                <i class="material-icons">Item</i>
                <p>Item</p>
              </a>
            </li>
            
            <li class="nav-item {{ Request::is('admin/subitem*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('subitem.index')}}">
                <i class="material-icons">Subitem</i>
                <p>Subitem</p>
              </a>
            </li>

            <li class="nav-item {{ Request::is('admin/reservation*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('reservation.index')}}">
                <i class="material-icons">Reservation</i>
                <p>Reservation</p>
              </a>
            </li>

            <li class="nav-item {{ Request::is('admin/feature*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('feature.index')}}">
                <i class="material-icons">Feature</i>
                <p>Feature</p>
              </a>
            </li>


            <li class="nav-item {{ Request::is('admin/featureitem*') ? 'active' :'' }}">
              <a class="nav-link" href="{{route('featureitem.index')}}">
                <i class="material-icons">Feature_item</i>
                <p>Feature_Item</p>
              </a>
            </li>

             <li class="nav-item">
              <a class="dropdown-item nav-link bg-transparent" id="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <i class="material-icons">Logout</i>
                <p>{{ __('Logout') }}</p> 
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
      
          </a>
         </li>
      
              
          </ul>
        </div>
      </div>
