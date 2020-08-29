@extends('auth.main')
@section('title','Login')
@section('content')
  <div class="row justify-content-center">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="p-5">
              <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Login</h1>
              </div>
              <form class="user" method="POST" action="{{route('login')}}">
              {{csrf_field()}}
              <div class="form-group">
                  <label for="inputEmail">Email Address</label>
                  <input type="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : ''}}" 
                  name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  @if($errors->has('email'))
                  <div class="invalid-feedbak">{{$errors->first('email')}}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="inputPassword ">Password</label>
                  <input type="password" class="form-control form-control-user  {{$errors->has('password') ? 'is-invalid' : ''}}" 
                  name="password" id="inputPassword" placeholder="Password">
                  @if($errors->has('password'))
                  <div class="invalid-feedbak">{{$errors->first('password')}}</div>
                  @endif
              </div>
              <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="customCheck" 
                  name="remember" {{ old('remember') ? 'checked' : ''}}>
                  <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
              </div>
              <button class="btn btn-primary btn-user btn-block" type="submit">
                  Login
              </button>
              <br>
              <div class="text-center">
              <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
              </div>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection
  