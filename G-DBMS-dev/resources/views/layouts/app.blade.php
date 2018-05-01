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

        
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #green;
        }

        ul li {
        display: block;
        position: relative;
        float: left;
        background: #green;
        }

        /* This hides the dropdowns */


        li ul { display: none; }

        ul li a {
        display: block;
        padding: 1em;
        text-decoration: none;
        white-space: nowrap;
        color: #black;
        }

        ul li a:hover { background: #2c3e50; }

        /* Display the dropdown */


        li:hover > ul {
        display: block;
        position: absolute;
        }

        li:hover li { float: none; }

        li:hover a { background: #green; }

        li:hover li a:hover { background:grey; }

        .main-navigation li ul li { border-top: 0; }

        /* Displays second level dropdowns to the right of the first level dropdown */

        ul ul ul {
        left: 100%;
        top: 0;
        background: #fff;
        }

        /* Simple clearfix */



        ul:before,
        ul:after {
        content: " "; /* 1 */
        display: table; /* 2 */
        }

        ul:after { clear: both; }


</style>
	</style>
	
</head>
<body id="app-layout">
    <nav class="navbar navbar-und navbar-fixed-top">
	<a class="navbar-brand" href="{{ url('/home') }}">
				<img src="{{ asset('UND-Logo.png') }}" alt="UND Computer Science - GDBMS" class="img-responsive" />
				</a>
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
				
                <a class="navbar-brand" href="{{ url('/home') }}" style="margin-top:20px; margin-left:-40px;">
                    
                     G-DBMS <i class="fa fa-database"></i>
                </a>
            </div>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::check())
                    <?php $role = Auth::user()->role->name; ?>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        @if ($role == 'Director' || $role == 'Chair')
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">MS Thesis<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">GQE<span class="caret"></span></a>
                                                <ul>
                                                    <li><a href="{{ url('/gqe/result') }}">Result</a></li>
                                                    <li><a href="{{ url('/gqe/offering') }}">Offering</a></li>
                                                    <li><a href="{{ url('/gqe/section') }}">Section</a></li>
                                                    <li><a href="{{ url('/gqe/passlevel') }}">Pass Level</a></li>
                                                </ul>
                                    </li>
                                    <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">GCE <span class="caret"></span></a>
                                            <ul>
                                                <li><a href="{{ url('/gce/add') }}">Add</a></li>
                                                <li><a href="{{ url('/gce/result') }}">Report</a></li>
                                            </ul>
                                    </li>
                                    <li><a href="{{ url('/gqe/passlevel') }}">Assistantship</a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($role == 'Director')
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">MS Non-Thesis<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">GQE<span class="caret"></span></a>
                                                <ul>
                                                    <li><a href="{{ url('/gqe/result') }}">Result</a></li>
                                                    <li><a href="{{ url('/gqe/offering') }}">Offering</a></li>
                                                    <li><a href="{{ url('/gqe/section') }}">Section</a></li>
                                                    <li><a href="{{ url('/gqe/passlevel') }}">Pass Level</a></li>
                                                </ul>
                                    </li>
                                    <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">GCE <span class="caret"></span></a>
                                            <ul>
                                                <li><a href="{{ url('/gce/add') }}">Add</a></li>
                                                <li><a href="{{ url('/gce/result') }}">Report</a></li>
                                            </ul>
                                    </li>
                                    <li><a href="{{ url('/gqe/passlevel') }}">Assistantship</a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($role == 'Director')
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">PhD Scientific Computing<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                 <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">GQE<span class="caret"></span></a>
                                            <ul>
                                                <li><a href="{{ url('/gqe/result') }}">Result</a></li>
                                                <li><a href="{{ url('/gqe/offering') }}">Offering</a></li>
                                                <li><a href="{{ url('/gqe/section') }}">Section</a></li>
                                            </ul>
                                </li>
                                <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">GCE <span class="caret"></span></a>
                                        <ul>
                                            <li><a href="{{ url('/gce/add') }}">Add</a></li>
                                            <li><a href="{{ url('/gce/result') }}">Report</a></li>
                                        </ul>
                                </li>
                                <li><a href="{{ url('/gqe/passlevel') }}">Assistantship</a></li>
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
	
	<style>
		/* This styling is for the left side navigation */
		.w3-btn,.w3-button{border:none;display:inline-block;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}
		.w3-btn,.w3-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}   
		.w3-disabled,.w3-btn:disabled,.w3-button:disabled{cursor:not-allowed;opacity:0.3}.w3-disabled *,:disabled *{pointer-events:none}
		.w3-dropdown-hover:hover > .w3-button:first-child,.w3-dropdown-click:hover > .w3-button:first-child{background-color:#ccc;color:#000}
		.w3-bar-block .w3-dropdown-hover .w3-button,.w3-bar-block .w3-dropdown-click .w3-button{width:100%;text-align:left;padding:8px 16px}
		.w3-button:hover{color:#000!important;background-color:#ccc!important}
		.w3-dropdown-hover.w3-mobile,.w3-dropdown-hover.w3-mobile .w3-btn,.w3-dropdown-hover.w3-mobile .w3-button,.w3-dropdown-click.w3-mobile,.w3-dropdown-click.w3-mobile .w3-btn,.w3-dropdown-click.w3-mobile .w3-button{width:100%}}
		.w3-bar .w3-button{white-space:normal}
		.w3-hide{display:none!important}.w3-show-block,.w3-show{display:block!important}.w3-show-inline-block{display:inline-block!important}
		.w3-green,.w3-hover-green:hover{color:#fff!important;background-color:#00b34d!important}
		.w3-bar-block.w3-center .w3-bar-item{text-align:center}.w3-block{display:block;width:100%}
		.w3-card,.w3-card-2{box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)}
		.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)}
		.w3-sidebar{height:100%;width:200px;background-color:#fff;position:fixed!important;z-index:1;overflow:auto}
		@media (max-width:992px){.w3-sidebar.w3-collapse{display:none}.w3-main{margin-left:0!important;margin-right:0!important}}
		@media (min-width:993px){.w3-modal-content{width:900px}.w3-hide-large{display:none!important}.w3-sidebar.w3-collapse{display:block!important}}
		.w3-hide{display:none!important}.w3-show-block,.w3-show{display:block!important}.w3-show-inline-block{display:inline-block!important}
		.w3-hide-small{display:none!important}.w3-mobile{display:block;width:100%!important}.w3-bar-item.w3-mobile,.w3-dropdown-hover.w3-mobile,.w3-dropdown-click.w3-mobile{text-align:center}
		@media (min-width:993px){.w3-modal-content{width:900px}.w3-hide-large{display:none!important}.w3-sidebar.w3-collapse{display:block!important}}
		@media (max-width:992px) and (min-width:601px){.w3-hide-medium{display:none!important}}
		@media (max-width:992px){.w3-sidebar.w3-collapse{display:none}.w3-main{margin-left:0!important;margin-right:0!important}}
		.w3-left-align{text-align:left!important}.w3-right-align{text-align:right!important}.w3-justify{text-align:justify!important}.w3-center{text-align:center!important}
		.w3-bar .w3-bar-item{padding:8px 16px;float:left;width:auto;border:none;display:block;outline:0}
		.w3-bar .w3-dropdown-hover,.w3-bar .w3-dropdown-click{position:static;float:left}
		.w3-bar .w3-button{white-space:normal}
		.w3-bar-block .w3-bar-item{width:100%;display:block;padding:8px 16px;text-align:left;border:none;white-space:normal;float:none;outline:0}
		.w3-bar-block.w3-center .w3-bar-item{text-align:center}.w3-block{display:block;width:100%}
	</style>
	<!-- Navigation on left -->
	@if (Auth::check())
                    <?php $role = Auth::user()->role->name; ?>
	<div class="w3-sidebar w3-bar-block w3-card" style="width:160px;">
		
		
		<button class="w3-button w3-block w3-left-align" onclick="studentAccFunc()">Student <i class="fa fa-caret-down"></i></button>
			<div id="studentAcc" class="w3-hide w3-white w3-card">
                <a href="{{ url('/ms') }}" class="w3-bar-item w3-button">MS Thesis</a>
                <a href="{{ url('/msnon') }}" class="w3-bar-item w3-button">MS Non-Thesis</a>
                <a href="{{ url('/phd') }}" class="w3-bar-item w3-button">PhD</a>
				<a href="{{ url('/student') }}" class="w3-bar-item w3-button">All Students</a>
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
