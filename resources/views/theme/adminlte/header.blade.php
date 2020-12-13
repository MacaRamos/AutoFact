<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light elevation-2">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="pushmenu" href="#"><i class="fas fa-bars text-autofact"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="dropdown user user-menu">
      <a class="nav-link pull-right float-right" data-toggle="dropdown" href="#">
        <i class="fas fa-user text-autofact"></i>
        {{-- <img src="{{asset("assets/img/Avatar.png")}}" class="img-circle hover-brightness " width="36"
          height="36"> --}}
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
        <!-- User image -->
        <li class="user-header" style="height: auto; border-bottom: 1px solid #e9ecef;">
          <p style="font-size: 16px;">
            {{Auth::user()->name ?? ''}}
          </p>
        <p style="font-size: 12px;">
          @foreach (Auth::user()->roles as $rol)
            @if ($loop->last)
            {{$rol->nombre}}
            @else
            {{$rol->nombre}} -
            @endif            
          @endforeach
        </p>
        </li>
        <li>          
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt"></i> Salir
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
               
        </li>
      </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
  </ul>
</nav>
<!-- /.navbar -->