<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My App</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
   
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages21" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Rapat FKOM</span>
                </a>
                <div id="collapsePages21" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('notulen.index') }}">Notulen Rapat</a>
                    </div>
                </div>
            </li>
             </li><li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesurat" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>E-Surat FKOM</span>
                </a>
                <div id="collapsePagesurat" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('surat.index') }}">E-Surat</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagedosen" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Dosen FKOM</span>
                </a>
                <div id="collapsePagedosen" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('dosen.index') }}">Data Dosen</a>
                    </div>
                </div>
            </li>
           
            <li class="nav-item">
            <a class="nav-link" href="{{ route('slide.index') }}">
                 <i class="fas fa-fw fa-folder"></i>
                <span>Data Slide Web</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('project.index') }}">
                 <i class="fas fa-fw fa-folder"></i>
                <span>Data Project MHS</span>
            </a>
            </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
