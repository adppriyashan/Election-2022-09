    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item">
                    <a href="/">
                        <i class="mbri-desktop"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>

                @if (doPermitted('//voters'))
                    <li class=" nav-item">
                        <a href="/voters">
                            <i class="mbri-user"></i>
                            <span class="menu-title" data-i18n="Voters">Voters</span>
                        </a>
                    </li>
                @endif

                @if (doPermitted('//nominators'))
                    <li class=" nav-item">
                        <a href="/nominators">
                            <i class="mbri-user"></i>
                            <span class="menu-title" data-i18n="Nominators">Nominators</span>
                        </a>
                    </li>
                @endif

                @if (doPermitted('//election'))
                    <li class=" nav-item">
                        <a href="/election">
                            <i class="mbri-user"></i>
                            <span class="menu-title" data-i18n="Election">Election</span>
                        </a>
                    </li>
                @endif

                @if (doPermitted('//party'))
                    <li class=" nav-item"><a href="/party"><i class="la la-balance-scale"></i><span class="menu-title"
                                data-i18n="Apps">Parties</span></a>

                    </li>
                @endif

                @if (doPermitted('//nominators'))
                    <li class=" nav-item"><a href="/nominators"><i class="la la-chain-broken"></i><span class="menu-title"
                                data-i18n="Apps">Nominators</span></a>

                    </li>
                @endif

                @if (doPermitted('//results') || doPermitted('//complain'))
                    <li class=" nav-item"><a href="#"><i class="
                        la la-caret-up"></i><span
                                class="menu-title" data-i18n="Pages">Reports</span></a>
                        <ul class="menu-content">
                            @if (doPermitted('//results'))
                                <li><a class="menu-item" href="/results"><i class="la la-bar-chart"></i><span>Results Report</span></a>
                                </li>
                            @endif
                            @if (doPermitted('//complain'))
                                <li><a class="menu-item" href="/complain"><i class="la la-bar-chart"></i><span>Complains Report</span></a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (doPermitted('//users'))
                    <li class=" nav-item"><a href="#"><i class="mbri-setting3"></i><span class="menu-title"
                                data-i18n="Pages">System</span></a>
                        <ul class="menu-content">
                            @if (doPermitted('//users'))
                                <li><a class="menu-item" href="/users"><i
                                            class="la la-user-plus"></i><span>Users</span></a>
                                </li>
                            @endif
                            @if (doPermitted('//users'))
                                <li><a class="menu-item" href="/usertypes"><i class="la la-key"></i><span>Permission
                                            Levels</span></a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
