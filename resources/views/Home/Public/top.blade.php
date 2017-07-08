</head>
<body>
<div id="page-wrapper" class="page-loading">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader">
        <div class="inner">
            <!-- Animation spinner for all modern browsers -->
            <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

            <!-- Text for IE9 -->
            <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
        </div>
    </div>
    <!-- END Preloader -->

    <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
        <!-- Alternative Sidebar -->
        <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
            <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
            <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll-alt">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Profile -->
                    <div class="sidebar-section">
                        <h2 class="text-light">Profile</h2>
                        <form action="index.html" method="post" class="form-control-borderless" onsubmit="return false;">
                            <div class="form-group">
                                <label for="side-profile-name">Name</label>
                                <input type="text" id="side-profile-name" name="side-profile-name" class="form-control" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="side-profile-email">Email</label>
                                <input type="email" id="side-profile-email" name="side-profile-email" class="form-control" value="john.doe@example.com">
                            </div>
                            <div class="form-group">
                                <label for="side-profile-password">New Password</label>
                                <input type="password" id="side-profile-password" name="side-profile-password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="side-profile-password-confirm">Confirm New Password</label>
                                <input type="password" id="side-profile-password-confirm" name="side-profile-password-confirm" class="form-control">
                            </div>
                            <div class="form-group remove-margin">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- END Profile -->

                    <!-- Settings -->
                    <div class="sidebar-section">
                        <h2 class="text-light">Settings</h2>
                        <form action="index.html" method="post" class="form-horizontal form-control-borderless" onsubmit="return false;">
                            <div class="form-group">
                                <label class="col-xs-7 control-label-fixed">Notifications</label>
                                <div class="col-xs-5">
                                    <label class="switch switch-success"><input type="checkbox" checked><span></span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-7 control-label-fixed">Public Profile</label>
                                <div class="col-xs-5">
                                    <label class="switch switch-success"><input type="checkbox" checked><span></span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-7 control-label-fixed">Enable API</label>
                                <div class="col-xs-5">
                                    <label class="switch switch-success"><input type="checkbox"><span></span></label>
                                </div>
                            </div>
                            <div class="form-group remove-margin">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- END Settings -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Alternative Sidebar -->