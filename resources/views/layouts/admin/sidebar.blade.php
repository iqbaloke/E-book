<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    @role('super admin|admin')
    <li class="nav-item {{ Request()->is('dashboard-admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endrole

    <hr class="sidebar-divider">

    @role('super admin|admin')
    <div class="sidebar-heading">
        Master Data
    </div>
    <li class="nav-item {{ Request()->is('dashboard-admin/master-data/category') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categoryindex') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item {{ Request()->is('dashboard-admin/master-data/tag') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tagindex') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tags</span></a>
    </li>

    <li class="nav-item {{ Request()->is('dashboard-admin/master-data/file') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('fileindex') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>File</span></a>
    </li>

    @endrole

    @can('create user')
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        All Users
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesusertable"
            aria-expanded="true" aria-controls="collapsePagesusertable">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
        </a>
        <div id="collapsePagesusertable" class="collapse {{ Request()->is('dashboard-admin/user/table') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/user/create') ? 'show' : '' }}" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request()->is('dashboard-admin/user/table') ? 'active' : '' }}"
                    href="{{ route('usertable') }}">Users Table</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/user/create') ? 'active' : '' }}"
                    href="{{ route('usercreate') }}">Create New Users</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagestransaction"
            aria-expanded="true" aria-controls="collapsePagestransaction">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaction</span>
        </a>
        <div id="collapsePagestransaction" class="collapse {{ Request()->is('dashboard-admin/transaction/success') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/transaction/pending') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/transaction/faild') ? 'show' : '' }}" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request()->is('dashboard-admin/transaction/success') ? 'active' : '' }}"
                    href="{{ route('transactionadminsuccess') }}">success</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/transaction/pending') ? 'active' : '' }}"
                    href="{{ route('transactionadminpending') }}">pending</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/transaction/faild') ? 'active' : '' }}"
                    href="{{ route('transactionadminfaild') }}">faild</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageswidraw"
            aria-expanded="true" aria-controls="collapsePageswidraw">
            <i class="fas fa-fw fa-folder"></i>
            <span>Widraw</span>
        </a>
        <div id="collapsePageswidraw" class="collapse {{ Request()->is('dashboard-admin/widraw/request') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/widraw/success') ? 'show' : '' }}" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request()->is('dashboard-admin/widraw/request') ? 'active' : '' }}"
                    href="{{ route('widrawrequest') }}">Widraw Request</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/widraw/success') ? 'active' : '' }}"
                    href="{{ route('widrawsuccess') }}">Widraw Success</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Book</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ Request()->is('dashboard-admin/book/request-book') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/book/approved-book') ? 'show' : '' }} ||
            {{ Request()->is('dashboard-admin/book/publish-book-byuser') ? 'active' : '' }} ||
            {{ Request()->is('dashboard-admin/book/not-publish-book-byuser') ? 'active' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Book</h6>
                <a class="collapse-item {{ Request()->is('dashboard-admin/book/request-book') ? 'active' : '' }}"
                    href="{{ route('requestbook') }}">Request Book</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/book/approved-book') ? 'active' : '' }}"
                    href="{{ route('approvedbook') }}">Book Approved</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/book/publish-book-byuser') ? 'active' : '' }}"
                    href="{{ route('publishbyuser') }}">Book publish by user</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/book/not-publish-book-byuser') ? 'active' : '' }}"
                    href="{{ route('notpublishbyuser') }}">Book not publish by user</a>
            </div>
        </div>
    </li>
    @endcan

    @can('role and permission')
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Roles And Permissions
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Role And Permissions</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request()->is('dashboard-admin/role-and-permission/roles') ? 'show' : '' }} ||
                 {{ Request()->is('dashboard-admin/role-and-permission/permission') ? 'show' : '' }} ||
                 {{ Request()->is('dashboard-admin/role-and-permission/give-permission') ? 'show' : '' }} ||
                 {{ Request()->is('dashboard-admin/role-and-permission/user-role') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item {{ Request()->is('dashboard-admin/role-and-permission/roles') ? 'active' : '' }}"
                    href="{{ route('roleindex') }}">Roles</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/role-and-permission/permission') ? 'active' : '' }}"
                    href="{{ route('permissionindex') }}">Permissions</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/role-and-permission/give-permission') ? 'active' : '' }}"
                    href="{{ route('givepermissionindex') }}">Give Permissions</a>
                <a class="collapse-item {{ Request()->is('dashboard-admin/role-and-permission/user-role') ? 'active' : '' }}"
                    href="{{ route('userroleindex') }}">User Roles</a>
            </div>
        </div>
    </li>
    @endcan


    {{-- <li class="nav-item">
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
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Addons
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
