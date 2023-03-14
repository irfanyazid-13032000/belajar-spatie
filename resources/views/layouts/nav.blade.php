<nav class="main-sidebar ps-menu">
            <div class="sidebar-toggle action-toggle">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <div class="sidebar-opener action-toggle">
                <a href="#">
                    <i class="ti-angle-right"></i>
                </a>
            </div>
            <div class="sidebar-header">
                <div class="text">AR</div>
                <div class="close-sidebar action-toggle">
                    <i class="ti-close"></i>
                </div>
            </div>
            <div class="sidebar-content">
                <ul>
                    <li class="{{ request()->segment(1) === 'dashboard' ? 'active' : '' }}">
                        <a href="{{route('dashboard')}}" class="link">
                            <i class="ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @can('read konfigurasi')
                    <li class="{{ request()->segment(1) === 'konfigurasi' ? 'active' : '' }}">
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-desktop"></i>
                            <span>Konfigurasi</span>
                        </a>
                        <ul class="sub-menu {{ request()->segment(1) === 'konfigurasi' ? 'expand' : '' }}">
                          @can('read role')
                            <li><a href="{{route('konfigurasi.roles')}}" class="link"><span>Roles</span></a></li>
                          @endcan
                        </ul>
                    </li>
                    @endcan
                    <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-book"></i>
                            <span>Form</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="form-element.html" class="link">
                                    <span>Form Element</span></a>
                            </li>
                            <li><a href="form-datepicker.html" class="link">
                                    <span>Datepicker</span></a>
                            </li>
                            <li><a href="form-select2.html" class="link">
                                    <span>Select2</span></a>
                            </li>
                        </ul>
                   
                </ul>
            </div>
        </nav>  