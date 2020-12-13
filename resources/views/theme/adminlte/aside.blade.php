<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-white elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link bg-white" style="height: 57px;">
    {{-- <img src="{{asset("assets/img/logoInicial.png")}}" alt="Alfredo" class="brand-image" width="34" height="34">
    --}}
    <img src="{{asset("assets/img/logo-autofact.png")}}" alt="Logo" class="pl-5" style="opacity: .8"
      width="160px" height="auto">
    {{--     
    <img src="{{asset("assets/img/logo-white.png")}}" width="auto" height="34" class="pl-3"> --}}
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="image">
        <img src="{{asset("assets/img/Avatar.png")}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>
    <!-- Sidebar user (optional) -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu Principal</li>
        @foreach ($menusComposer as $item)
        @if ($item["menu_anterior"] != 0)
        @break
        @endif
        @include("theme.$theme.menu-item", ["item" => $item])
        @endforeach
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>