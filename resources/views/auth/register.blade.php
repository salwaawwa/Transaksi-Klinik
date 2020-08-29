@extends('auth.main')
@section('title','Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user"  method="POST" action="{{route('register')}}">
              {{csrf_field()}}
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="off" autofocus 
                    id="FirstName" placeholder="Nama">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="email">{{ __('E-Mail Address') }}</label>
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                  name="email" value="{{ old('email') }}" required autocomplete="off" 
                  id="inputEmail" placeholder="Email Address">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password">{{ __('Password') }}</label>
                  <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                  name="password" value="{{ old('password') }}" required autocomplete="off" 
                  id="inputPassword" placeholder="Password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password-confirm">{{ __('Confirm Password') }}</label>
                  <input type="password" class="form-control form-control-user"
                  name="password_confirmation" required autocomplete="off" 
                  id="inputPassword" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                </button>
              <br>
              <div class="text-center">
                <a class="small" href="login">Already have an account? Login!</a>
              </div>
      </div>
    </div>
@endsection

