<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('reviewer/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'RMS') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('reviewer/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('reviewer/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Application
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('reviewer/product/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse {{ Request::is('reviewer/product/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Products</h6>
                <a class="collapse-item {{ Request::is('reviewer/product/all') ? 'active' : ''}} {{ Request::is('reviewer/product/search') ? 'active' : ''}} {{ Request::is('admin/product/edit') ? 'active' : ''}}"
                    href="{{ route('reviewer/product/all') }}">Products</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('reviewer/order/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse {{ Request::is('reviewer/order/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Orders</h6>
                <a class="collapse-item {{ Request::is('reviewer/order/new') ? 'active' : ''}}"
                    href="{{ route('reviewer/order/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('reviewer/order/all') ? 'active' : ''}} {{ Request::is('reviewer/order/edit') ? 'active' : ''}}"
                    href="{{ route('reviewer/order/all') }}">Orders</a>
            </div>
        </div>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReviews"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Reviews</span>
        </a>
        <div id="collapseReviews" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Reviews</h6>
                <a class="collapse-item" href="buttons.html">Add New</a>
                <a class="collapse-item" href="cards.html">Reviews</a>
            </div>
        </div>
    </li> -->


    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->