<div class="sidenav-menu-col w-100">
    <div class="sidenav-menu show position-static bg-white h-100 w-100">
        <ul class="side-nav">
            <li class="side-nav-title">Customer Portal</li>
            <li class="side-nav-item {{ request()->routeIs('client.dashboard') ? 'active' : '' }}"><a href="{{ route('client.dashboard') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-dashboard-line"></i></span><span class="menu-text">Dashboard</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.analytics') ? 'active' : '' }}"><a href="{{ route('client.analytics') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-line-chart-line"></i></span><span class="menu-text">Portfolio Analytics</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.meter') ? 'active' : '' }}"><a href="{{ route('client.meter') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-flask-line"></i></span><span class="menu-text">Analytics Demo <span class="badge bg-secondary ms-1">Sample</span></span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.energy-readings') ? 'active' : '' }}"><a href="{{ route('client.energy-readings') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-flashlight-line"></i></span><span class="menu-text">Energy Readings</span></a></li>
            <li class="side-nav-title">Operations</li>
            <li class="side-nav-item {{ request()->routeIs('client.sites*') ? 'active' : '' }}"><a href="{{ route('client.sites') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-building-2-line"></i></span><span class="menu-text">Sites</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.devices*') ? 'active' : '' }}"><a href="{{ route('client.devices') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-cpu-line"></i></span><span class="menu-text">Devices &amp; Sensors</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.notifications') ? 'active' : '' }}"><a href="{{ route('client.notifications') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-notification-3-line"></i></span><span class="menu-text">Notifications</span></a></li>
            <li class="side-nav-title">Account</li>
            <li class="side-nav-item {{ request()->routeIs('client.value-reports*') ? 'active' : '' }}"><a href="{{ route('client.value-reports') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-file-chart-line"></i></span><span class="menu-text">Value Reports</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.subscription') ? 'active' : '' }}"><a href="{{ route('client.subscription') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-bill-line"></i></span><span class="menu-text">Subscription &amp; Billing</span></a></li>
            <li class="side-nav-item {{ request()->routeIs('client.profile') ? 'active' : '' }}"><a href="{{ route('client.profile') }}" class="side-nav-link"><span class="menu-icon"><i class="ri-settings-3-line"></i></span><span class="menu-text">Profile</span></a></li>
            <li class="side-nav-item"><form id="client-logout-sidebar-form" action="{{ route('client.logout') }}" method="POST" class="d-none">@csrf</form><a href="#" class="side-nav-link" onclick="event.preventDefault(); document.getElementById('client-logout-sidebar-form').submit();"><span class="menu-icon"><i class="ri-logout-box-r-line"></i></span><span class="menu-text">Log Out</span></a></li>
        </ul>
    </div>
</div>



<!-- <div class="sidenav-menu show position-static bg-white h-100">
                    <ul class="side-nav">

                        <li class="side-nav-title">Navigation</li>

                        <li class="side-nav-item">
                            <a href="https://aesort.ca/UAT/public/profile" class="side-nav-link">
                                <span class="menu-icon">
                                    <i class="ri-settings-3-fill"></i>
                                </span>
                                <span class="menu-text">Profile</span>
                            </a>
                        </li>

                        <li class="side-nav-item active">
                            <a href="https://aesort.ca/UAT/public/meters"
                               class="side-nav-link active">
                                <span class="menu-icon">
                                    <i class="ri-dashboard-3-line"></i>
                                </span>
                                <span class="menu-text">Analytics Demo</span>
                            </a>
                        </li>

                        <li class="side-nav-title">List</li>

                        <li class="side-nav-item">
                            <a href="https://aesort.ca/UAT/public/sites" class="side-nav-link">
                                <span class="menu-icon">
                                    <i class="ri-computer-fill"></i>
                                </span>
                                <span class="menu-text">Sites</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="https://aesort.ca/UAT/public/devices" class="side-nav-link">
                                <span class="menu-icon">
                                    <i class="ri-git-merge-line"></i>
                                </span>
                                <span class="menu-text">Devices & Sensors</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="https://aesort.ca/UAT/public/subscriptions"
                               class="side-nav-link">
                                <span class="menu-icon">
                                    <i class="ri-bill-fill"></i>
                                </span>
                                <span class="menu-text">Subscription</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="https://aesort.ca/UAT/public/logout" class="side-nav-link">
                                <span class="menu-icon">
                                    <i class="ri-logout-box-r-line"></i>
                                </span>
                                <span class="menu-text">Log Out</span>
                            </a>
                        </li>

                    </ul>
                </div> -->