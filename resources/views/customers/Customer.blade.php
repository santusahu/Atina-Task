@extends('layouts.layout')
{{-- Page Title --}}
@section('title')
  Client Dashboard
@endsection

{{-- Other usable css links --}}
@section('css_links')
	<link rel="stylesheet" href="">
@endsection

{{-- Other css --}}
@section('other_css')
	<style>

  </style>
@endsection

{{-- Main content of the pages --}}
@section('main_content')

@if(session('success'))
    <div class="alert alert-success alert-dismissable fade show">
        {{session('success')}}
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show">
        {{session('error')}}
    </div>
@endif

<div class="container mt-3">
  <h2>Add Customer form</h2>
  <form action="{{route('SaveCustomer')}}" onsubmit="return validateForm(event)"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label for="first_name">First name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="{{ old('first_name') }}" onkeypress ="return isAlphabet(event)">
      @error('first_name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isValidFirstName"></span>      
    </div>
    <div class="mb-3 mt-3">
      <label for="last_name">Last name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="{{ old('last_name') }}" onkeypress ="return isAlphabet(event)">
      @error('last_name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      
    </div>
    <div class="mb-3 mt-3">
      <label for="mobile_number">Mobile Number:</label>
      <input type="text" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number" value="{{ old('mobile_number') }}" maxlength="10" onkeypress="return isNumber(event)" onchange="isVaildNumber()" >
      @error('mobile_number')
        <span class="text-danger ">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildNumber"></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildEmail"></span>

    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      @error('password')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildPassword"></span>
    </div>
    <div class="mb-3">
      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation">
      @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildConfirmPassword"></span>
    </div>
    <div class="mb-3">
      <label for="profile_image">Profile Image:</label>
      <input type="file" class="form-control" id="profile_image" placeholder="Profile Image" name="profile_image" accept="image/png, image/jpeg">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
{{-- Main content End --}}

{{-- Other Js pluging   --}}
@section('js_links')
  <script type="text/javascript" src=""></script>
@endsection

{{-- Custom Js Scripts --}}
@section('js_scripts')

<!-- validateForm script -->
<script>
  function validateForm(event) {
    // event.preventDefault() // this will stop the form from submitting

    const first_name = $('#first_name').val().trim();
    const mobile_number = $('#mobile_number').val().trim();
    const email = $('#email').val().trim();     
    const password = $('#password').val().trim();     
    const password_confirmation = $('#password_confirmation').val().trim();   
    
    let isValidFirstName = true;
    let isVaildNumber = true;
    let isVaildEmail = true;
    let isVaildPassword = true;
    let isVaildConfirmPassword = true;      
    
    $(".text-danger").text("");
    if (first_name === '') {
      $(".isValidFirstName").text("Pleace enter first name");
      isValidFirstName = false;
    }

    if(mobile_number.length != 10){
      $('.isVaildNumber').text('Not a vaild number')
      if (first_name == '') {
        $(".isVaildNumber").text("Pleace enter mobile number");
      }
      isVaildNumber = false;
    }

    if (email == '') {
      $(".isVaildEmail").text("Pleace enter email addaress");
      isVaildEmail = false;
    }else{
      isVaildEmail = validateEmail(email)
      if(!isVaildEmail){
        $(".isVaildEmail").text("Pleace enter vaild Email addaress");
      }
    }

    if (email == '') {
      $(".isVaildEmail").text("Pleace enter email addaress");
      isVaildEmail = false;
    }else{
      isVaildEmail = validateEmail(email)
      if(!isVaildEmail){
        $(".isVaildEmail").text("Pleace enter vaild Email addaress");
      }
    }

    if(password == ''){
      $(".isVaildPassword").text("Pleace enter password");
      isVaildPassword = false;
    }
    
    if(password_confirmation == ''){
      $(".isVaildConfirmPassword").text("Pleace enter Confirm password");
      isVaildConfirmPassword = false;
    }
    
    if(password != '' && password_confirmation != ''){
      if(password.length < 8){
        $(".isVaildPassword").text("The password field must be at least 8 characters.");
        isVaildPassword = false;

      }else if(password != password_confirmation){
        $(".isVaildPassword").text("The password field confirmation does not match.");
          isVaildPassword = false;
      }
    }
    
    if(!isVaildPassword){
      $('#password').val('')
      $('#password_confirmation').val('')

    }
    console.log({
      isValidFirstName,
      isVaildNumber,
      isVaildEmail,
      isVaildPassword,
      isVaildConfirmPassword
    })
    if(isValidFirstName && isVaildNumber && isVaildEmail && isVaildPassword && isVaildConfirmPassword){
      return true
    } else {
      return false
    }
  }
</script>

@endsection