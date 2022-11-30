<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin {{ Auth::user()->name }}</title>

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
        <span class="align-middle">Admin Panel</span>
      </a>

      <ul class="sidebar-nav">

        <li class="sidebar-item">
            <a style="font-size: 20px;" class="sidebar-link" href="{{ url('/')}}">
              <i class="fas fa-user-shield"></i> <span class="align-middle">{{ Auth::user()->urole }} Panel</span>
            </a>
          </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.dashboard')}}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
          </a>
        </li>


        <li class="sidebar-item">
            <a class="sidebar-link"  href="{{ route('admin.users.index') }}">
                <i class="align-middle fas fa-users"></i> <span class="align-middle">Agent & Role </span>
            </a>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#calender" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle far fa-calendar-alt"></i> <span class="align-middle">Calender <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="calender" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.calender') }}">My Calender</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.app') }}">Appointment Type</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('day.day') }}">Default Availability</a></li>
            {{--  --}}
          </ul>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#crm" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-id-card-alt"></i>
            <span class="align-middle">CRM <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="crm" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('company.view') }}">Company</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.contract') }}">Contacts</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.circle') }}">Circles</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.event') }}">Events</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.deal') }}">Deals</a></li>

          </ul>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#billing" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-money-bill-wave"></i>
            <span class="align-middle">Billing <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="billing" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Invoice</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Estimates</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Proposals</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Contacts</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Payments</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Gateways</a></li>

          </ul>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#project" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-tasks"></i>
            <span class="align-middle">Projects <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="project" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Projects</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">My Task</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">All Task</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Work Request</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Timers</a></li>

          </ul>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#marketing" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-bullhorn"></i>
            <span class="align-middle">Marketing <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="marketing" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Campaigns</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Templates</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Audiences</a></li>

          </ul>
        </li>

        <li class="sidebar-item">
          <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-file-alt"></i>
            <span class="align-middle">Pages <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Portal Page</a></li>
            {{-- Add New Page, Manage Page, Manage Template, Manage Order --}}
            <li class="sidebar-item"><a class="sidebar-link" href="#">Workspace</a></li>
            {{-- Add New Page, Manage Page, Manage Order --}}

          </ul>
        </li>

        {{-- <li class="sidebar-item">
          <a data-bs-target="#message" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle far fa-envelope"></i>
            <span class="align-middle">Message <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="message" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Send</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Inbox</a></li>
          </ul>
        </li> --}}


        <li class="sidebar-item">
            <a data-bs-target="#message" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle far fa-address-card"></i>
              <span class="align-middle">Profile Settings <i class="fas fa-chevron-circle-down"></i></span>
            </a>
            <ul id="message" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item"><a class="sidebar-link" href="#">My Profile/Settings</a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="#">Site Settings</a></li>
            </ul>
        </li>


        <li class="sidebar-item">
          <a data-bs-target="#setting" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle fas fa-cog"></i>
            <span class="align-middle">Settings <i class="fas fa-chevron-circle-down"></i></span>
          </a>
          <ul id="setting" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">Categories</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Content</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">CRM</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Projects</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Billing</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Marketing</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Portal Page</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">Workspace</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light fixed-top navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle"><i class="hamburger align-self-center"></i></a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000; font-size:18px;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</li>
					</ul>
				</div>
			</nav>


	<div class="container-fluid p-0 py-4 mb-3">
          <div class="py-4">

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

                @yield('content')
            </div>
    </div>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>


@yield('footer_js')
<script>
    function myFunction() {
        if(!confirm("Are You Sure?"))
        event.preventDefault();
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('admin/js/app.js')}}"></script>
{{-- <script src="{{ asset('admin/js/bootstrap.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

