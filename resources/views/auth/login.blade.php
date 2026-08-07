@extends('auth.layouts.app')
@section('title') Login @endsection
@section('content')

        <div  class="auth-wrapper  d-flex no-block justify-content-center align-items-center ">
            <div class="auth-box">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db"><img src="{{url('/theme')}}/assets/images/ibb.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form" class="form-horizontal mt-3" id="loginform" method="POST" data-route="{{ route('login') }}">
                    @csrf
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus aria-label="Username" aria-describedby="basic-addon1">
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <!-- <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock me-1"></i> Lost password?</button> -->
                                        <button class="btn btn-success text-white" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{--<div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row mt-3">
                        <!-- Form -->
                            <form class="form" class="col-12" data-route="{{ route('password.email') }}">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <!-- pwd -->
                                <div class="row mt-3 pt-3 border-top border-secondary">
                                    <div class="col-12">
                                        <a class="btn btn-success text-white" href="#" id="to-login" name="action">Back To Login</a>
                                        <button class="btn btn-info float-end" type="submit" name="action">Recover</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>--}}
            </div>
            
        </div>
        




@endsection
