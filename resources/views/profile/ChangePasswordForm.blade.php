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
        ul li{
            color:red;
        }
    </style>
@endsection

{{-- Main content of the pages --}}
@section('main_content')

@if(session('status') === 'password-updated')
    <div class="alert alert-success alert-dismissable fade show">
       Password changed
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show">
        {{session('error')}}
    </div>
@endif

<div class="container mt-3">
  <h2>Change password form</h2>
  @php
    //   dd($errors);
  @endphp

    
  <form method="POST" action="{{route('password.update')}}">
    @csrf
    @method('put')
    <div class="mb-3 mt-3">
      <label class="required" for="current_password">Current Password:</label>
      <input type="password" class="form-control" id="current_password" placeholder="Enter Current Password" name="current_password">
      <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        
      
      <span class="text-danger isValidFirstName"></span>      
    </div>

    <div class="mb-3 mt-3">
      <label class="required" for="password">New Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password">
      <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    
    </div>

    <div class="mb-3 mt-3">
      <label class="required" for="password_confirmation">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password" name="password_confirmation">
      <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
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