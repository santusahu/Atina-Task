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

<div class="container">
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
  <h1>Customer List</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Action</th>
              <!-- Add more columns as needed -->
          </tr>
      </thead>
      <tbody>
          @foreach ($customers as $key => $customer)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $customer->first_name }}</td>
                  <td>{{ $customer->last_name }}</td>
                  <td>{{ $customer->email }}</td>
                  <td>{{ $customer->mobile_number }}</td>
                  <td>
                    <a class="btn" href="{{route('EditCustomer' , [$customer->id])}}"> Edit </a>
                    <a class="btn" href="{{route('DeleteCustomer' , [$customer->user_id])}}">Delete</a>
                  </td>
                  <!-- Add more columns as needed -->
              </tr>
          @endforeach
      </tbody>
  </table>

  {{ $customers->links() }} <!-- Render pagination links -->

@endsection
{{-- Main content End --}}

{{-- Other Js pluging   --}}
@section('js_links')
  <script type="text/javascript" src=""></script>
@endsection

{{-- Custom Js Scripts --}}
@section('js_scripts')

@endsection