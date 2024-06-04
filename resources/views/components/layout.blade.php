<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>{{isset($title) ? $title:"Tee-M"}}</title>


  <link rel="stylesheet" href="{{asset("modules/ionicons/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css")}}">

  <link rel="stylesheet" href="{{asset("modules/summernote/summernote-lite.css")}}">
  <link rel="stylesheet" href="{{asset("modules/flag-icon-css/css/flag-icon.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/demo.css")}}">
  <link rel="stylesheet" href="{{asset("css/style.css")}}">

  <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("css/datatables.css")}}" rel="stylesheet">
  <link href="{{asset("css/dataTables.bootstrap.css")}}" rel="stylesheet">
  <link href="{{asset("css/custom.css")}}" rel="stylesheet">
  



    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>

    <script src="{{asset("js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("js/dataTables.bootstrap5.min.js")}}"></script>
    <script src="{{asset("js/jszip.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/pdfmake.js")}}"></script>
    <script src="{{asset("js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("js/buttons.print.min.js")}}"></script>
    <script src="{{asset("js/custom.js")}}"></script>

  


  {{-- DATATABLE --}}

</head>

<body>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
  
  <div id="app">

     
    {{-- Top Nav --}}
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            {{-- <button class="btn" type="submit"><i class="ion ion-search"></i></button> --}}
          </div>
        </form>
        
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="ion ion-ios-bell-outline"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">View All</a>
                </div>
              </div>
              <div class="dropdown-list-content">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <img alt="image" src="{{asset("img/avatar/avatar-1.jpeg")}} class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <img alt="image" src="{{asset("img/avatar/avatar-2.jpeg")}} class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b>Ujang Maman</b> has moved task <b>Fix bug footer</b> to <b>Progress</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <img alt="image" src="{{asset("img/avatar/avatar-3.jpeg")}} class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b> has moved task <b>Fix bug sidebar</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <img alt="image" src="{{asset("img/avatar/avatar-4.jpeg")}} class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b> has moved task <b>Fix bug navbar</b> to <b>Done</b>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <img alt="image" src="{{asset("img/avatar/avatar-5.jpeg")}} class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b> has moved task <b>Add logo</b> to <b>Done</b>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile.html" class="dropdown-item has-icon">
                <i class="ion ion-android-person"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
    {{-- Top Nav Ends --}}

    {{-- Side Bar Begins --}}
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('home')}}">{{env('APP_NAME')}}</a>
          </div>
            <div class="sidebar-user">
                <div class="sidebar-user-picture">
                <img alt="image" src="{{auth()->user()->get_avatar()}}">
                </div>
                <div class="sidebar-user-details">
                <div class="user-name">{{auth()->user()->fullname()}}</div>
                <div class="user-role">
                    Administrator
                </div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="active">
                <a href="index.html"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
                </li>

                <li class="menu-header">Group</li>
                {{-- GROUP A --}}
                <li>
                <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Group A</span></a>
                <ul class="menu-dropdown">
                    <li><a href="general.html"><i class="ion ion-ios-circle-outline"></i> College</a></li>
                    <li><a href="components.html"><i class="ion ion-ios-circle-outline"></i>Faculty</a></li>
                    <li><a href="buttons.html"><i class="ion ion-ios-circle-outline"></i> Departments</a></li>
                    <li><a href="buttons.html"><i class="ion ion-ios-circle-outline"></i> Programs</a></li>
                    <li><a href="buttons.html"><i class="ion ion-ios-circle-outline"></i> Courses</a></li>
                    <li><a href="{{route('classgroups')}}"><i class="ion ion-ios-circle-outline"></i> ClassGroups</a></li>
                </ul>
                </li>

                {{-- GROUP B --}}
                <li>
                <a href="#" class="has-dropdown"><i class="ion ion-flag"></i><span>Group B</span></a>
                <ul class="menu-dropdown">
                    <li><a href="fontawesome.html"><i class="ion ion-ios-circle-outline"></i> Lecture</a></li>
                    <li><a href="flag.html"><i class="ion ion-ios-circle-outline"></i> Flag</a></li>
                </ul>
                </li>
            
            

                <li class="menu-header">More</li>
                <li>
                <a href="#" class="has-dropdown"><i class="ion ion-ios-nutrition"></i> Click Me</a>
                <ul class="menu-dropdown">
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Menu 1</a></li>
                    <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i> Menu 2</a>
                    <ul class="menu-dropdown">
                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 1</a></li>
                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 2</a></li>
                        <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i> Child Menu 3</a>
                        <ul class="menu-dropdown">
                            <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 1</a></li>
                            <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 2</a></li>
                            <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 3</a></li>
                        </ul>
                        </li>
                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu 4</a></li>
                    </ul>
                    </li>
                </ul>
                </li>
                <li>
                <a href="#"><i class="ion ion-heart"></i> Badges <div class="badge badge-primary">10</div></a>
                </li>
                <li>
                <a href="credits.html"><i class="ion ion-ios-information-outline"></i> Credits</a>
                </li>          
            </ul>
            <div class="p-3 mt-4 mb-4">
            <a href="http://stisla.multinity.com/" class="btn btn-danger btn-shadow btn-round has-icon has-icon-nofloat btn-block">
              <i class="ion ion-help-buoy"></i> <div>Go PRO!</div>
            </a>
          </div>
        </aside>
      </div>
    {{-- SideBar Ends --}}

    {{-- Session Variables for Success or Failure Messages --}}           

      {{-- Success --}}
      @if(session()->has('success'))
      <div class='container container--narrow PopMessage'>
          <div id="success_msg" class='alert alert-success text-center text-white '>
          {{session('success')}}
          </div>
      </div>

      {{-- Failure --}}
      @elseif(session()->has('failure'))
      <div class='container container--narrow PopMessage'>
          <div class='alert alert-danger text-center text-white'>
          {{session('failure')}}
          </div>
      </div> 

      {{-- Warning --}}
      @elseif(session()->has('warning'))
      <div class='container container--narrow PopMessage'>
          <div class='alert alert-warning text-center text-white'>
          {{session('warning')}}
          </div>
      </div> 

      @endif

      {{$slot}}

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://multinity.com/">Multinity</a>
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  {{-- <script src={{asset("modules/jquery.min.js")}}></script> --}}
  {{-- <script src={{asset("modules/popper.js")}}></script> --}}
  <script src={{asset("modules/tooltip.js")}}></script>
  {{-- <script src={{asset("modules/bootstrap/js/bootstrap.min.js")}}></script> --}}
  <script src={{asset("modules/nicescroll/jquery.nicescroll.min.js")}}></script>
  <script src={{asset("modules/scroll-up-bar/dist/scroll-up-bar.min.js")}}></script>
  <script src={{asset("js/sa-functions.js")}}></script>
  
  {{-- <script src={{asset("modules/chart.min.js")}}></script> --}}
  <script src={{asset("modules/summernote/summernote-lite.js")}}></script>


  <script src={{asset("js/scripts.js")}}></script>
  <script src={{asset("js/custom.js")}}></script>
  <script src={{asset("js/demo.js")}}></script>
  
</body>
</html>