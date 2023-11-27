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
                            <img src="{{ asset('admin/assets/img/stisla-fill.svg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ __('Reset Password') }}</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.reset-password.send') }}"
                                    class="needs-validation" novalidate="">
                                    @csrf
                                    {{-- email --}}
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input placeholder="Enter your email here." id="email" type="email"
                                            class="form-control" name="email" tabindex="1"
                                            value="{{ @request()->email }}" required autofocus>
                                        <input placeholder="Enter your email here." id="email" type="hidden"
                                            class="form-control" name="token" tabindex="1"
                                            value="{{ @request()->token }}" required autofocus>
                                        @error('email')
                                            <code> {{ $message }} </code>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in your email') }}
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input placeholder="Enter your password here." id="password" type="password"
                                            class="form-control" name="password" tabindex="1" required autofocus>
                                        @error('password')
                                            <code> {{ $message }} </code>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in your password') }}
                                        </div>
                                    </div>
                                    {{-- confirm password --}}
                                    <div class="form-group">
                                        <label for="password">{{ __('Confirmation Password') }}</label>
                                        <input placeholder="Enter your password here." id="password" type="password"
                                            class="form-control" name="password_confirmation" tabindex="1" required
                                            autofocus>
                                        @error('password')
                                            <code> {{ $message }} </code>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in your Confirmation password') }}
                                        </div>
                                    </div>
                                    {{-- login button --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Send') }}
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
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
