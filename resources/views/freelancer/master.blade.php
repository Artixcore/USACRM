    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ Auth::user()->name }}</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link href="{{ asset('admin/css/app.css')}}" rel="stylesheet">
      <link href="{{ asset('admin/css/bootstrap.css')}}" rel="stylesheet">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      @yield('style_css')
    </head>
    <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
          <a class="sidebar-brand" href="{{url('/')}}">
            <span class="align-middle">Panel</span>
          </a>

          <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a style="font-size: 20px;" class="sidebar-link" href="{{ url('/')}}">
                  <i class="fas fa-user-shield"></i> <span class="align-middle">Panel</span>
                </a>
              </li>

            <li class="sidebar-item">

              <a class="sidebar-link" href="{{ route('freelancer.dashboard')}}">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
              </a>
            </li>
{{--        <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('freelancer.index')}}">
                  <i class="align-middle fas fa-users"></i> <span class="align-middle">Payment History</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('freelancer.index')}}">
                  <i class="align-middle fas fa-users"></i> <span class="align-middle">Invoice</span>
                </a>
            </li> --}}
          </ul>
        </div>
      </nav>

            <div class="main">
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle"><i class="hamburger align-self-center"></i></a>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                                     </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                     </form>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>


        <div class="container-fluid p-0 py-4 mb-3">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show alert-block">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($message = Session::get('delete'))
            <div class="alert alert-danger alert-dismissible fade show alert-block">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>

        </div>

            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>


    @yield('footer_js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('admin/js/app.js')}}"></script>
    {{-- <script src="{{ asset('admin/js/bootstrap.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
