<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('tr/admin/dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-file-invoice"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            <img class="img-profile img-thumbnail" src="{{ asset('tr/img/bharat-vishwaguru-logo-150x.jpg')}}">
            {{-- config('app.name', 'RMS') --}}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('tr/admin/dashboard') }}">
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
    {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/job/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse"
            data-target="#collapseJobs" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Jobs</span>
        </a>
        <div id="collapseJobs" class="collapse {{ Request::is('tr/admin/job/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Jobs</h6>
                <a class="collapse-item" href="#">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/job/all') ? 'active' : ''}} {{ Request::is('tr/admin/job/view/*') ? 'active' : ''}}"
                    href="{{ route('tr/admin/job/all') }}">All Jobs</a>
                <a class="collapse-item" href="#">Assign to Freelancer</a>
                <!-- <a class="collapse-item" href="#">Mediator's Product</a> -->
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobTypes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-playstation"></i>
            <span>Job Type</span>
        </a>
        <div id="collapseJobTypes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Job Type</h6>
                <a class="collapse-item" href="#">Add New</a>
                <a class="collapse-item" href="#">All Job Types</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/gst/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse"
            data-target="#collapseGST" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-playstation"></i>
            <span>GST</span>
        </a>
        <div id="collapseGST" class="collapse {{ Request::is('tr/admin/gst/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage GST</h6>
                <a class="collapse-item" href="javascript:void(0)">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/gst/all') ? 'active' : ''}}"
                    href="{{ route('tr/admin/gst/all') }}">All GST</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/service-plan/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseSP" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-playstation"></i>
            <span>Service Plans</span>
        </a>
        <div id="collapseSP" class="collapse {{ Request::is('tr/admin/service-plan/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Service Plan</h6>
                <a class="collapse-item {{ Request::is('tr/admin/service-plan/new') ? 'active' : ''}} {{ Request::is('tr/admin/service-plan/edit/*') ? 'active' : ''}}"
                    href="{{ route('tr/admin/service-plan/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/service-plan/all') ? 'active' : ''}}"
                    href="{{ route('tr/admin/service-plan/all') }}">All Service Plans</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/permission/*') ? 'active' : ''}} {{ Request::is('tr/admin/permission') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapsePermission" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-exclamation-circle"></i>
            <span>Permission</span>
        </a>
        <div id="collapsePermission"
            class="collapse {{ Request::is('tr/admin/permission/*') ? 'show' : ''}} {{ Request::is('tr/admin/permission') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Permission</h6>
                <a class="collapse-item {{ Request::is('tr/admin/permission/create') ? 'active' : ''}}"
                    href="{{route('permission.create')}}">Add New Permission</a>
                <a class="collapse-item {{ Request::is('tr/admin/permission') ? 'active' : ''}} {{ Request::is('tr/admin/permission/*/edit') ? 'active' : ''}}"
                    href="{{ route('permission.index') }}">All Permissions</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/role/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse"
            data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tag"></i>
            <span>User Roles</span>
        </a>
        <div id="collapseRoles"
            class="collapse {{ Request::is('tr/admin/role/*') ? 'show' : ''}} {{ Request::is('tr/admin/role') ? 'active' : 'collapsed'}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Roles</h6>
                <a class="collapse-item" href="{{route('role.create')}}">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/role') ? 'active' : ''}} {{ Request::is('tr/admin/role/edit') ? 'active' : ''}}"
                    href="{{ route('role.index') }}">All Roles</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/freelancer/*') ? 'active' : 'collapsed'}}" href="#"
            data-toggle="collapse" data-target="#collapseFreelancers" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Freelancers</span>
        </a>
        <div id="collapseFreelancers" class="collapse {{ Request::is('tr/admin/freelancer/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Freelancers</h6>
                <a class="collapse-item" href="#">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/freelancer/all') ? 'active' : ''}} {{ Request::is('tr/admin/freelancer/edit') ? 'active' : ''}}"
                    href="{{ route('tr/admin/freelancer/all') }}">All Freelancers</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/service/*') ? 'active' : ''}} {{ Request::is('tr/admin/service') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseServicePages" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-poll-h"></i>
            <span>Services Pages</span>
        </a>
        <div id="collapseServicePages"
            class="collapse {{ Request::is('tr/admin/service/*') ? 'show' : ''}} {{ Request::is('tr/admin/service') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Info Services</h6>
                <a class="collapse-item {{ Request::is('tr/admin/service/create') ? 'active' : ''}}"
                    href="{{route('service.create')}}">Add New Service</a>
                <a class="collapse-item {{ Request::is('tr/admin/service') ? 'active' : ''}} {{ Request::is('tr/admin/service/*/edit') ? 'active' : ''}}"
                    href="{{ route('service.index') }}">All Services</a>
            </div>
        </div>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/user/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse"
            data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse {{ Request::is('tr/admin/user/*') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users</h6>
                <a class="collapse-item" href="{{ route('tr/admin/user/new') }}">Add New</a>
                <a class="collapse-item {{ Request::is('tr/admin/user/all') ? 'active' : ''}} {{ Request::is('tr/admin/user/edit') ? 'active' : ''}}"
                    href="{{ route('tr/admin/user/all') }}">All Users</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/page/*') ? 'active' : ''}} {{ Request::is('tr/admin/page') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseCMS" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Info Pages</span>
        </a>
        <div id="collapseCMS"
            class="collapse {{ Request::is('tr/admin/page/*') ? 'show' : ''}} {{ Request::is('tr/admin/page') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Info Pages</h6>
                <a class="collapse-item {{ Request::is('tr/admin/page/create') ? 'active' : ''}}"
                    href="{{route('page.create')}}">Add New Page</a>
                <a class="collapse-item {{ Request::is('tr/admin/page') ? 'active' : ''}} {{ Request::is('tr/admin/page/*/edit') ? 'active' : ''}}"
                    href="{{ route('page.index') }}">All Pages</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/video/*') ? 'active' : ''}} {{ Request::is('tr/admin/video') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-blog"></i>
            <span>Video</span>
        </a>
        <div id="collapseVideo"
            class="collapse {{ Request::is('tr/admin/video/*') ? 'show' : ''}} {{ Request::is('tr/admin/video') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Videos</h6>
                <a class="collapse-item {{ Request::is('tr/admin/video/create') ? 'active' : ''}}"
                    href="{{route('video.create')}}">Add New Video</a>
                <a class="collapse-item {{ Request::is('tr/admin/video') ? 'active' : ''}} {{ Request::is('tr/admin/video/*/edit') ? 'active' : ''}}"
                    href="{{ route('video.index') }}">All Videos</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/article/*') ? 'active' : ''}} {{ Request::is('tr/admin/article') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-blog"></i>
            <span>Blog</span>
        </a>
        <div id="collapseBlog"
            class="collapse {{ Request::is('tr/admin/article/*') ? 'show' : ''}} {{ Request::is('tr/admin/article') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage articles</h6>
                <a class="collapse-item {{ Request::is('tr/admin/article/create') ? 'active' : ''}}"
                    href="{{route('article.create')}}">Add New Article</a>
                <a class="collapse-item {{ Request::is('tr/admin/article') ? 'active' : ''}} {{ Request::is('tr/admin/article/*/edit') ? 'active' : ''}}"
                    href="{{ route('article.index') }}">All Articles</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/article/*') ? 'active' : ''}} {{ Request::is('tr/admin/article') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseBlogCategory" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Categories</span>
        </a>
        <div id="collapseBlogCategory"
            class="collapse {{ Request::is('tr/admin/category/*') ? 'show' : ''}} {{ Request::is('tr/admin/category') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Catagories</h6>
                <a class="collapse-item {{ Request::is('tr/admin/category/create') ? 'active' : ''}}"
                    href="{{route('category.create')}}">Add New Category</a>
                <a class="collapse-item {{ Request::is('tr/admin/category') ? 'active' : ''}} {{ Request::is('tr/admin/category/*/edit') ? 'active' : ''}}"
                    href="{{ route('category.index') }}">All Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('tr/admin/testimonial/*') ? 'active' : ''}} {{ Request::is('tr/admin/testimonial') ? 'active' : 'collapsed'}}"
            href="#" data-toggle="collapse" data-target="#collapseTestimonials" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Testimonials</span>
        </a>
        <div id="collapseTestimonials"
            class="collapse {{ Request::is('tr/admin/testimonial/*') ? 'show' : ''}} {{ Request::is('tr/admin/testimonial') ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Testimonials</h6>
                <a class="collapse-item {{ Request::is('tr/admin/testimonial/create') ? 'active' : ''}}"
                    href="{{route('testimonial.create')}}">Add New Testimonial</a>
                <a class="collapse-item {{ Request::is('tr/admin/testimonial') ? 'active' : ''}} {{ Request::is('tr/admin/testimonial/*/edit') ? 'active' : ''}}"
                    href="{{ route('testimonial.index') }}">All Testimonials</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->