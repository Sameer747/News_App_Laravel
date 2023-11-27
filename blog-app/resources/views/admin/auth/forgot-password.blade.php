<!DOCTYPE html>
<html lang="en">

@include('admin.auth.simple-header')

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ __('Forgot Password') }}</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.forgot-password.send') }}"
                                    class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will send a reset link.') }}
                                    </div>
                                    @if (session()->has('success'))
                                        <b style="color: green">{{ session()->get('success') }}</b>
                                    @endif
                                    {{-- email --}}
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input placeholder="Enter your email here." id="email" type="email"
                                            class="form-control" name="email" tabindex="1" required autofocus>
                                        @error('email')
                                            <code> {{ $message }} </code>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in your email') }}
                                        </div>
                                    </div>
                                    {{-- forgot password --}}
                                    {{-- <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div> --}}
                                    {{-- remember me --}}
                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div> --}}
                                    {{-- login button --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Send') }}
                                        </button>
                                    </div>
                                </form>
                                {{-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>                                
                  </div>
                </div> --}}

                            </div>
                        </div>
                        {{-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> --}}
                        @include('admin.auth.simple-footer')
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ 'admin/assets/modules/jquery.min.js' }}"></script>
    <script src="{{ 'admin/assets/modules/popper.js' }}"></script>
    <script src="{{ 'admin/assets/modules/tooltip.js' }}"></script>
    <script src="{{ 'admin/assets/modules/bootstrap/js/bootstrap.min.js' }}"></script>
    <script src="{{ 'admin/assets/modules/nicescroll/jquery.nicescroll.min.js' }}"></script>
    <script src="{{ 'admin/assets/modules/moment.min.js' }}"></script>
    <script src="{{ 'admin/assets/js/stisla.js' }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ 'admin/assets/js/scripts.js' }}"></script>
    <script src="{{ 'admin/assets/js/custom.js' }}"></script>
</body>

</html>
