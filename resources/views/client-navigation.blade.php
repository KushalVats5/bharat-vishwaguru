<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('tr/user/dashboard') }}">User Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('tr/user/itr') }}">Income Tax</a>
            </li>
            <!--             <li class="nav-item">
                <a class="nav-link" href="#">GST</a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuGST" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    GST
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuGST">
                    <a class="dropdown-item" href="{{ route('tr/user/gst-return-file') }}">New GST Registation</a>
                    <a class="dropdown-item" href="{{ route('tr/user/gst-return-file') }}">GST Return File</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Accounting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tax Saving</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Registrations
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Import Export Code</a>
                    <a class="dropdown-item" href="#">PF/ESIC Registation</a>
                    <a class="dropdown-item" href="#">TRUST/NGO Registation</a>
                    <a class="dropdown-item" href="#">PAN Card (New/Correction)</a>
                    <a class="dropdown-item" href="#">MSME Registation</a>
                    <a class="dropdown-item" href="#">Company / Firm Registation</a>
                </div>
            </li>
        </ul>
    </div>
</nav>