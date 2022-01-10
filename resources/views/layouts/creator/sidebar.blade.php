<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            {{-- @role('admin|super admin|creator') --}}
            <a href="{{ route('dashboardcreator') }}"
                class="list-group-item list-group-item-action py-2 ripple mt-2 {{ Request()->is('dashboard') ? 'active' : '' }}"
                aria-current="true">
                <i style="font-size: 10px;" class="fas fa-tachometer-alt fa-fw me-3"></i><span
                    style="font-size: 12px;">Main dashboard</span>
            </a>
            {{-- @endrole --}}
            @role('admin|super admin|creator')
            <a href="{{ route('bookcreator') }}"
                class="list-group-item list-group-item-action py-2 ripple mt-2 {{ Request()->is('dashboard/book') ? 'active' : '' }}">
                <i style="font-size: 10px;" class="fas fa-book me-3"></i><span style="font-size: 12px;">Your Books
                </span>
            </a>
            @endrole
            <a href="{{ route('profile') }}"
                class="list-group-item list-group-item-action py-2 ripple mt-2 {{ Request()->is('dashboard/profile') ? 'active' : '' }}">
                <i style="font-size: 10px;" class="fas fa-lock fa-fw me-3"></i><span
                    style="font-size: 12px;">Profile</span></a>
            @role('admin|super admin|creator')
            <a href="#" class="list-group-item list-group-item-action py-2 ripple mt-2"><i style="font-size: 10px;"
                    class="fas fa-chart-line fa-fw me-3"></i><span style="font-size: 12px;">Analytics</span></a>
            @endrole
            <a href="{{ route('favorite') }}"
                class="list-group-item list-group-item-action py-2 ripple mt-2 {{ Request()->is('cart/favorite') ? 'active' : '' }}">
                <i style="font-size: 10px;" class="fas fa-chart-pie fa-fw me-3"></i><span
                    style="font-size: 12px;">favorite</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple mt-2">
                <i style="font-size: 10px;" class="fas fa-chart-pie fa-fw me-3"></i><span
                    style="font-size: 12px;">purchased</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple mt-2"><i style="font-size: 10px;"
                    class="fas fa-globe fa-fw me-3"></i><span style="font-size: 12px;">Transaction</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple mt-2"><i style="font-size: 10px;"
                    class="fas fa-money-bill fa-fw me-3"></i><span style="font-size: 12px;">Sales</span></a>
        </div>
    </div>
</nav>
