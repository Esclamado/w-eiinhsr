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
        <form method="post" action="{{ route('register.perform') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3 mb-5">Register</p>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required" autofocus>
            <label class="form-label">Email address</label>
            <div>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
          </div>

          <!-- Username input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" required="required" autofocus>
            <label class="form-label">Username</label>
            <div>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
          </div>

          <!-- User Roles input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <select class="form-control" name="user_access" id="user_access" style="height: 34px">
                <option value="option_select" disabled selected>---</option>
                <option value="1" {{old('user_access') =="2" ? 'selected' : ''}}>Admin</option>
                <option value="2" {{old('user_access') =="2" ? 'selected' : ''}}>Faculty</option>
                <option value="3" {{old('user_access') =="3" ? 'selected' : ''}}>Student</option>
                <option value="4" {{old('user_access') =="4" ? 'selected' : ''}}>Registrar</option>
                <!-- <option value="option_select" disabled>Student</option> -->
            </select>
            <label class="form-label">User Roles</label>
            <div>
                @if ($errors->has('user_access'))
                <span class="text-danger text-left">{{ $errors->first('user_access') }}</span>
                @endif
            </div>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label class="form-label">Password</label>
            <div>
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
          </div>

          <!-- Password Confirmation input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password Confirmation" required="required">
            <label class="form-label">Password Confirmation</label>
            <div>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

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