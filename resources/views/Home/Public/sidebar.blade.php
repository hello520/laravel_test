<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="" class="sidebar-title">
            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">管理系统</span>
        </a>
    </div>
    <!-- END Sidebar Brand -->

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="index.html" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> 仪表盘 </span></a>
                </li>
                <li class="sidebar-separator">
                    <i class="fa fa-ellipsis-h"></i>
                </li>
                @if(isset($side_menus))
                @foreach($side_menus as $sidemenu)
                    <li>
                            <a href="javascript:void(0)" class="sidebar-nav-menu">
                            <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                            <i class="fa fa-rocket sidebar-nav-icon"></i>
                            <span class="sidebar-nav-mini-hide">{{$sidemenu->name}}</span>
                        </a>
                        @if(!empty($sidemenu->child))
                            <ul>
                                @foreach($sidemenu->child as $menuson1)
                                    <li>
                                        @if(!empty($menuson1->child))
                                            <a href="javascript:void(0)" class="sidebar-nav-submenu">
                                                <i class="fa fa-chevron-left sidebar-nav-indicator"></i>{{$menuson1->name}}</a>
                                        @else
                                            <a href="{{url($menuson1->mark)}}">{{$menuson1->name}}</a>
                                        @endif
                                            @if(!empty($menuson1->child))
                                            <ul>
                                                @foreach($sidemenu1->child as $menuson2)
                                                    <li>
                                                        <a href="{{url($menuson2->mark)}}">{{$menuson2->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach
                @endif
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        </div>
</div>