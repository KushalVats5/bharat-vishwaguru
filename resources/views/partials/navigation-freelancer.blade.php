<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('tr/freelancer/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Taxring') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('tr/freelancer/dashboard') }}">
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
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Jobs</span>
        </a>
        <div id="collapseJobs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Jobs</h6>
                <a class="collapse-item" href="javascript:void(0);">Add New</a>
                <a class="collapse-item" href="{{ route('tr/freelancer/job/all') }}">All Jobs</a>
            </div>
        </div>
    </li> -->



    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/freelancer/job/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseJobs" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Jobs</span>
        </a>
        <div id="collapseJobs" class="collapse {{ Request::is('tr/freelancer/job/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Jobs</h6>
                <!-- <a class="collapse-item" href="#">Add New</a> -->
                <a class="collapse-item {{ Request::is('tr/freelancer/job/all') ? 'active' : ''}} {{ Request::is('tr/freelancer/job/view/*') ? 'active' : ''}}"
                    href="{{ route('tr/freelancer/job/all') }}">All Jobs</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobTypes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-playstation"></i>
            <span>Payments</span>
        </a>
        <div id="collapseJobTypes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Payments</h6>
                <a class="collapse-item" href="#">Add New</a>
                <a class="collapse-item" href="#">All Payments</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->