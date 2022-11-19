<div class="sidebar" data-color="purple" data-background-color="white" >
  <div class="logo"><a href="{{ url ('dashboard')}}" class="simple-text logo-normal">
      EvenTick
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' ;}}">
        <a class="nav-link" href="{{ url ('dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
     
      <li class="nav-item {{ Request::is('government') ? 'active' : '' ;}}">
        <a class="nav-link" href="{{ url ('government')}}">
          <i class="fa fa-globe" aria-hidden="true"></i>
          <p>Government</p>
        </a>
      </li>
            <li class="nav-item {{ Request::is('places') ? 'active' : '' ;}}">
        <a class="nav-link" href="{{ url ('places')}}">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p>Places</p>
        </a>
      </li>
     
      <li class="nav-item {{ Request::is('categories') ? 'active' : '' ;}}">
        <a class="nav-link" href="{{ url ('categories')}}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
     
      <li class="nav-item {{ Request::is('tickets') ? 'active' : '' ;}}">
        <a class="nav-link" href="{{ url ('tickets')}}">
          <i class="fa fa-ticket" aria-hidden="true"></i>
          <p>Event</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>