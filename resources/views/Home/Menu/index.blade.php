@extends('Home.Layouts.master')
@section('content')
    <div id="main-container">
        <header class="navbar navbar-inverse navbar-fixed-top">
            <!-- Left Header Navigation -->
            <ul class="nav navbar-nav-custom">
                <!-- Main Sidebar Toggle Button -->
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                        <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                        <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                    </a>
                </li>
                <!-- END Main Sidebar Toggle Button -->

                <!-- Header Link -->
                <li class="hidden-xs animation-fadeInQuick">
                    <a href=""><strong>菜单管理</strong></a>
                </li>
                <!-- END Header Link -->
            </ul>
            <!-- END Left Header Navigation -->

            <!-- Right Header Navigation -->
            <ul class="nav navbar-nav-custom pull-right">
                <!-- Search Form -->
                <li>
                    <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                        <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                    </form>
                </li>
                <!-- END Search Form -->

                <!-- Alternative Sidebar Toggle Button -->
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
                        <i class="gi gi-settings"></i>
                    </a>
                </li>
                <!-- END Alternative Sidebar Toggle Button -->

                <!-- User Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('img/placeholders/avatars/avatar9.jpg')}}" alt="avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">
                            <strong>ADMINISTRATOR</strong>
                        </li>
                        <li>
                            <a href="page_app_email.html">
                                <i class="fa fa-inbox fa-fw pull-right"></i>
                                Inbox
                            </a>
                        </li>
                        <li>
                            <a href="page_app_social.html">
                                <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="page_app_media.html">
                                <i class="fa fa-picture-o fa-fw pull-right"></i>
                                Media Manager
                            </a>
                        </li>
                        <li class="divider"><li>
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                                <i class="gi gi-settings fa-fw pull-right"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="page_ready_lock_screen.html">
                                <i class="gi gi-lock fa-fw pull-right"></i>
                                Lock Account
                            </a>
                        </li>
                        <li>
                            <a href="page_ready_login.html">
                                <i class="fa fa-power-off fa-fw pull-right"></i>
                                Log out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
        </header>
        <!-- END Header -->

        <!-- Page content -->
        <div id="page-content">
            <!-- Table Styles Header -->
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="header-section">
                            <h1>菜单管理</h1>
                            <a href="{{url('/menu')}}">添加菜单</a>
                        </div>
                    </div>
                    <div class="col-sm-6 hidden-xs">
                        <div class="header-section">
                            <ul class="breadcrumb breadcrumb-top">
                                <li>User Interface</li>
                                <li>Elements</li>
                                <li><a href="">Tables</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Table Styles Header -->

            <!-- Table Styles Block -->
            <div class="block">


                <!-- Table Styles Content -->
                <div class="table-responsive">
                    <!--
                    Available Table Classes:
                        'table'             - basic table
                        'table-bordered'    - table with full borders
                        'table-borderless'  - table with no borders
                        'table-striped'     - striped table
                        'table-condensed'   - table with smaller top and bottom cell padding
                        'table-hover'       - rows highlighted on mouse hover
                        'table-vcenter'     - middle align content vertically
                    -->
                    <table id="general-table" class="table table-striped table-bordered table-vcenter">
                        <thead>
                        <tr>
                            <th style="width: 80px;" class="text-center"><label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label></th>
                            {{--<th>排序</th>--}}
                            <th style="width: 320px;">名称</th>
                            <th style="width: 320px;">状态</th>
                            <th style="width: 120px;" class="text-center">编辑</th>
                        </tr>
                        </thead>

                    </table>
                    <div class="tree well">
                        <ul id="rootUL">

                        </ul>
                    </div>
                </div>
                <!-- END Table Styles Content -->

            </div>
            </div>

            <!-- END Datatables Block -->
        </div>

@endsection
@section('footer')
    @parent
<script src="{{asset('/js/pages/uiTables.js')}}"></script>
    <script src="{{asset('/js/mine/tree.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', '关闭');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', '展开').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', '关闭').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
    @endsection