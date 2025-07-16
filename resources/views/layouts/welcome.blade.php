<!DOCTYPE html>
<html lang="en">


<!-- dashboard.html   -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AgoraWrite</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset(('assets/css/app.min.css'))}}">
  <link rel="stylesheet" href="{{asset(('assets/bundles/bootstrap-social/bootstrap-social.css'))}}">
  <link rel="stylesheet" href="{{asset(('assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css'))}}">
  <link rel="stylesheet" href="{{asset(('assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css'))}}">
  <link rel="stylesheet" href="{{asset(('assets/bundles/summernote/summernote-bs4.css'))}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset(('assets/css/style.css'))}}">
  <link rel="stylesheet" href="{{asset(('assets/css/components.css'))}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset(('assets/css/custom.css'))}}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn"> <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <div class="row navbar-nav navbar-right">
            <a href="/login" class="btn btn-success mr-5" >Login</a>
            <a href="/register"  class="btn btn-info mr-5"  > Register</a>
        </div>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset(('assets/img/logo.png'))}}" class="header-logo" /> <span
                class="logo-name">AgoraWrite</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown">
              <a href="" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li><a href="/login"><i class="fas fa-user-check"></i> <span>Login</span></a></li>
            <li><a href="/register"><i class="fas fa-user-plus"></i> <span>Register</span></a></li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">

            @yield('space-work')
            
          </div>
        </section>
        
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">KMCD</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset(('assets/js/app.min.js'))}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset(('assets/bundles/chartjs/chart.min.js'))}}"></script>
  <script src="{{asset(('assets/bundles/owlcarousel2/dist/owl.carousel.min.js'))}}"></script>
  <script src="{{asset(('assets/bundles/summernote/summernote-bs4.js'))}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset(('assets/js/page/widget-data.js'))}}"></script>
  <!-- Template JS File -->
  <script src="{{asset(('assets/js/scripts.js'))}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset(('assets/js/custom.js'))}}"></script>
</body>

</html>