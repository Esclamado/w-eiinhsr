@extends('layouts.auth-master')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" action="{{ route('login.perform') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
         
          @include('layouts.partials.messages')

          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3 mb-5">Login</p>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Email / Username" required="required" autofocus>
            <label class="form-label">Email / Username</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label class="form-label">Password</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection

<style>
    .container {
    padding: 16px;
    }
</style>