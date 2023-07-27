<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Page Title --}}
  <title>@yield('title')</title>

	<link rel="stylesheet" href="{{ asset('ClientsPlugins/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ClientsPlugins/fontawesome-free/css/all.min.css') }}">

  {{-- Other usable css links --}}
	@yield('css_links')

  {{-- styling --}}
  <style>
    .required::after{
      Content:  " * ";
      Color: #f00;
    }
  </style>

  {{-- Other Css Styles --}}
	@yield('other_css')
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}"><div>{{ Auth::user()->name }}</div></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('profile.edit') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('AddCustomer') }}">Add Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('CustomerList') }}">Customer List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ChangePassword') }}">Change Password</a>
            </li>
            <li>
              <!-- Authentication -->
              <form class="d-none" method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
              </form>
              <a class="nav-link" href="route('logout')" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield('main_content')


  <script src="{{ asset('ClientsPlugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ClientsPlugins\jquery\jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ClientsPlugins\jquery-nice-select-1.1.0\js\jquery.nice-select.js') }}"></script>

  {{-- common js script --}}
  <script src="{{ asset('ClientsPlugins\js\common_js_new.js') }}"></script>

	@yield('js_links')

	@yield('js_scripts')

  <script>
    // mobile number validation
    const isVaildNumber = () => {
      console.log('isVaildNumber')

      const mobile_number = $('#mobile_number').val().trim();
      if(mobile_number.length != 10){
        $('.isVaildNumber').text('Not a vaild number')
      }else{
        $('.isVaildNumber').text('')
      }
    }
  </script>
  
</body>
</html>