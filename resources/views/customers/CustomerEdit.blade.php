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

@php
    // dd($customer);
@endphp

<div class="container mt-3">
  <h2>Update Customer form</h2>
  <form action="{{route('UpdateCustomer' , [$customer->id])}}" method="POST" enctype="multipart/form-data"  onsubmit="return validateForm(event)" >
    @csrf
    <div class="mb-3 mt-3">
      <label class="required"  for="first_name">First name:</label>
      <input type="hidden" name="user_id" value="{{$customer->user_id}}">
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="{{$customer->first_name}}" onkeypress ="return isAlphabet(event)">
      @error('first_name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isValidFirstName"></span>            
    </div>

    <div class="mb-3 mt-3">
      <label for="last_name">Last name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="{{$customer->last_name}}">
      @error('last_name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3 mt-3">
      <label class="required"  for="mobile_number">Mobile Number:</label>
      <input type="text" class="form-control" id="mobile_number" minlength="10" maxlength="10" placeholder="Enter Mobile Number" name="mobile_number" value="{{$customer->mobile_number}}" onkeypress="return isNumber(event)" onchange="isVaildNumber()" >
      @error('mobile_number')
        <span class="text-danger ">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildNumber"></span>
    </div>

    <div class="mb-3 mt-3">
      <label class="required" for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$customer->email}}">
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <span class="text-danger isVaildEmail"></span>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
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
   
    if(isValidFirstName && isVaildNumber && isVaildEmail){
      return true
    } else {
      return false
    }
  }
</script>

@endsection