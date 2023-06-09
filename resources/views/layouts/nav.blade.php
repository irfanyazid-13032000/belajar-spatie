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
                   


                    @foreach (getMenus() as $menu)
                  

                    @can('read '.$menu->url)

                    <li class="{{ request()->segment(1) === $menu->url ? 'active' : '' }}">
                        <a href="#" class="main-menu has-dropdown">
                            <i class="{{$menu->icon}}"></i>
                            <span>{{$menu->name}}</span>
                        </a>
                        <ul class="sub-menu {{ request()->segment(1) === $menu->url ? 'expand' : '' }}">
                        @foreach ($menu->sub_menus as $subMenu)
                        @can('read '.$subMenu->url)
                        <li class="{{ request()->segment(1) === explode('/',$subMenu->url)[0] && request()->segment(2) === explode('/',$subMenu->url)[1] ? 'active' : '' }}"><a href="{{url($subMenu->url)}}" class="link"><span>{{$subMenu->name}}</span></a></li>
                        @endcan
                        @endforeach
                        </ul>
                    </li>

                    @endcan
                        
                    @endforeach


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