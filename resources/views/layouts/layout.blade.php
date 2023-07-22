<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Page Title --}}
  <title>@yield('title')</title>
  <title>Customers List</title>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('ClientsPlugins/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ClientsPlugins/fontawesome-free/css/all.min.css') }}">

  {{-- Other usable css links --}}
	@yield('css_links')

  {{-- styling --}}
  <style>

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
              <a class="nav-link"href="{{ route('CustomerList') }}">Customer List</a>
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
	<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

	@yield('js_links')

	@yield('js_scripts')

  
</body>
</html>