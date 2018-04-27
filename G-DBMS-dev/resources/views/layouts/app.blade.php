<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.min.css" integrity="sha256-BQ3m8birKYRzXjofYJeErdZ/SMsXgOoBPXt0d6c3FZc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" integrity="sha256-xJOZHfpxLR/uhh1BwYFS5fhmOAdIRQaiOul5F/b7v3s=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha256-nbyata2PJRjImhByQzik2ot6gSHSU4Cqdz5bNYL2zcU=" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset("css/app.css") }}" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Allows for page-specific CSS to be inserted here -->
    @yield('styles')

    <style>
        body {
            font-family: 'Lato';
            margin-top: 75px;
        }

        .fa-btn {
            margin-right: 6px;
        }
	</style>
	
</head>
<body id="app-layout">
    <nav class="navbar navbar-und navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{-- <img src="{{ asset('storage/csci_logo.png') }}" alt="UND Computer Science - GDBMS" class="img-responsive" /> --}}
                     G-DBMS <i class="fa fa-database"></i>
                </a>
            </div>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::check())
                    <?php $role = Auth::user()->role->name; ?>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/budget') }}">Budget</a></li>

                        @if ($role == 'Director' || $role == 'Chair')
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">GQE <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/gqe/result') }}">Result</a></li>
                                    <li><a href="{{ url('/gqe/offering') }}">Offering</a></li>
                                    <li><a href="{{ url('/gqe/section') }}">Section</a></li>
                                    <li><a href="{{ url('/gqe/passlevel') }}">Pass Level</a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($role == 'Director')
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">GCE <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/gce/add') }}">Add</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->full_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user.update', Auth::user()) }}"><i class="fa fa-btn fa-vcard"></i>Edit Profile</a></li>
                                @if ($role == 'Director')
                                    <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-user-plus"></i>Register New User</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
	<!-- Navigation on left -->
	@if (Auth::check())
                    <?php $role = Auth::user()->role->name; ?>
	<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:160px;">
		
		
		<button class="w3-button w3-block w3-left-align" onclick="studentAccFunc()">Student <i class="fa fa-caret-down"></i></button>
			<div id="studentAcc" class="w3-hide w3-white w3-card">
				<a href="{{ url('/student') }}" class="w3-bar-item w3-button">Info</a>
				@if($role == 'Director' || $role == 'Secretary')
					<a href="{{ url('/student/add') }}" class="w3-bar-item w3-button">Add</a>
				@endif
				<a href="{{ url('/prospective_student') }}" class="w3-bar-item w3-button"> Prospective Students</a>
			</div>
			
		<button class="w3-button w3-block w3-left-align" onclick="advisorAccFunc()">Advisor <i class="fa fa-caret-down"></i></button>
			<div id="advisorAcc" class="w3-hide w3-white w3-card">
				<a href="{{ url('/advisor') }}" class="w3-bar-item w3-button">Info</a>
				@if($role == 'Director')
					<a href="{{ url('/advisor/add') }}" class="w3-bar-item w3-button">Add</a>
				@endif
			</div>
			
		@if ($role == 'Director' || $role == 'Chair' || $role === 'Secretary')
			
			<button class="w3-button w3-block w3-left-align" onclick="assistantshipAccFunc()">Assistantship <i class="fa fa-caret-down"></i></button>
				<div id="assistantshipAcc" class="w3-hide w3-white w3-card">
					<a href="{{ url('/assistantship/') }}" class="w3-bar-item w3-button">Info</a>
					@if($role == 'Director')
						<a href="{{ url('/assistantship/add') }}" class="w3-bar-item w3-button">Add</a>
					@endif
					<a href="{{ url('/assistantship/positions/') }}" class="w3-bar-item w3-button">Positions</a>
					<a href="{{ url('/assistantship/status/') }}" class="w3-bar-item w3-button">Statuses</a>
					<a href="{{ url('/assistantship/gta_assignments/') }}" class="w3-bar-item w3-button">GTA Assignments</a>
				</div>
				
			
			<button class="w3-button w3-block w3-left-align" onclick="waiverAccFunc()">Tuition Waiver <i class="fa fa-caret-down"></i></button>
				<div id="waiverAcc" class="w3-hide w3-white w3-card">
					<a href="{{ url('/waiver') }}" class="w3-bar-item w3-button">Info</a>
					@if ($role == 'Director')
						<a href="{{ url('/waiver/add') }}" class="w3-bar-item w3-button">Add</a>
					@endif
				</div>
				
			
			<button class="w3-button w3-block w3-left-align" onclick="fundingAccFunc()">Funding Source <i class="fa fa-caret-down"></i></button>
				<div id="fundingAcc" class="w3-hide w3-white w3-card">
					<a href="{{ url('/source') }}" class="w3-bar-item w3-button">Info</a>
					@if ($role == 'Director')
						<a href="{{ url('/source/add') }}" class="w3-bar-item w3-button">Add</a>
					@endif
				</div>
		@endif
	</div>
	@endif
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" integrity="sha256-+mWd/G69S4qtgPowSELIeVAv7+FuL871WXaolgXnrwQ=" crossorigin="anonymous"></script>

    <script src="{{ elixir('js/app.js') }}"></script>
	
	<script>
		function studentAccFunc() {
			var x = document.getElementById("studentAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
				x.previousElementSibling.className += " w3-green";
			} else { 
				x.className = x.className.replace(" w3-show", "");
				x.previousElementSibling.className = 
				x.previousElementSibling.className.replace(" w3-green", "");
			}
		}
		function advisorAccFunc() {
			var x = document.getElementById("advisorAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
				x.previousElementSibling.className += " w3-green";
			} else { 
				x.className = x.className.replace(" w3-show", "");
				x.previousElementSibling.className = 
				x.previousElementSibling.className.replace(" w3-green", "");
			}
		}
		function assistantshipAccFunc() {
			var x = document.getElementById("assistantshipAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
				x.previousElementSibling.className += " w3-green";
			} else { 
				x.className = x.className.replace(" w3-show", "");
				x.previousElementSibling.className = 
				x.previousElementSibling.className.replace(" w3-green", "");
			}
		}
		function waiverAccFunc() {
			var x = document.getElementById("waiverAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
				x.previousElementSibling.className += " w3-green";
			} else { 
				x.className = x.className.replace(" w3-show", "");
				x.previousElementSibling.className = 
				x.previousElementSibling.className.replace(" w3-green", "");
			}
		}
		function fundingAccFunc() {
			var x = document.getElementById("fundingAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
				x.previousElementSibling.className += " w3-green";
			} else { 
				x.className = x.className.replace(" w3-show", "");
				x.previousElementSibling.className = 
				x.previousElementSibling.className.replace(" w3-green", "");
			}
		}
	</script>

    <!-- Allows for page-specific JavaScript to be inserted here -->
    @yield('scripts')

</body>
</html>
