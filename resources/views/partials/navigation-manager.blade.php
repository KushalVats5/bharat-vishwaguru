<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'RMS') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('manager/dashboard') }}">
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
        <a class="nav-link {{ Request::is('manager/product/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse {{ Request::is('manager/product/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Products</h6>
                <a class="collapse-item {{ Request::is('manager/product/new') ? 'active' : ''}}"
                    href="{{ route('manager/product/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('manager/product/all') ? 'active' : ''}} {{ Request::is('manager/product/search') ? 'active' : ''}} {{ Request::is('manager/product/edit') ? 'active' : ''}}"
                    href="{{ route('manager/product/all') }}">Products</a>
                <a class="collapse-item {{ Request::is('manager/product/assign') ? 'active' : ''}}"
                    href="{{ route('manager/product/assign') }}">Assign to Mediator</a>
                <a class="collapse-item {{ Request::is('manager/product/mediator-product') ? 'active' : ''}}"
                    href="{{ route('manager/product/mediator-product') }}">Mediator's Product</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('manager/platform/*') ? 'active' : 'collapsed'}} " href="#"
            data-toggle="collapse" data-target="#collapsePlatforms" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-playstation"></i>
            <span>Platform</span>
        </a>
        <div id="collapsePlatforms" class="collapse {{ Request::is('manager/platform/*') ? 'show' : ''}} "
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Platform</h6>
                <a class="collapse-item {{ Request::is('manager/platform/new') ? 'active' : ''}}"
                    href="{{ route('manager/platform/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('manager/platform/all') ? 'active' : ''}} {{ Request::is('manager/platform/edit') ? 'active' : ''}}"
                    href="{{ route('manager/platform/all') }}">Platforms</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('manager/brand/*') ? 'active' : 'collapsed'}} " href="#"
            data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-building"></i>
            <span>Brand</span>
        </a>
        <div id="collapseBrands" class="collapse {{ Request::is('manager/brand/*') ? 'show' : ''}} "
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Brands</h6>
                <a class="collapse-item {{ Request::is('manager/brand/new') ? 'active' : ''}}"
                    href="{{ route('manager/brand/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('manager/brand/all') ? 'active' : ''}} {{ Request::is('manager/brand/edit') ? 'active' : ''}}"
                    href="{{ route('manager/brand/all') }}">Brands</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('manager/order/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse"
            data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse {{ Request::is('manager/order/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Orders</h6>
                <a class="collapse-item {{ Request::is('manager/order/new') ? 'active' : ''}}"
                    href="{{ route('manager/order/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('manager/order/all') ? 'active' : ''}} {{ Request::is('manager/order/edit') ? 'active' : ''}}"
                    href="{{ route('manager/order/all') }}">Orders</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <!--<li class="nav-item">
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
    </li>-->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->