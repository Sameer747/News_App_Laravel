@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('Dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('Profile') }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <p class="section-lead">
                {{ __('Change information about yourself on this page') }}.
            </p>

            <div class="row mt-sm-4">
                {{-- <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="assets/img/avatar/avatar-1.png"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">Ujang Maman <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Web Developer
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his wife.
                            So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John
                                Doe'</b>.
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow Ujang On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
                {{-- Edit Profile --}}
                <div class="col-12 col-md-6 ">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.update',auth()->guard('admin')->user()->id) }}"
                            class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('Edit Profile') }}</h4>
                            </div>
                            {{-- @if (session()->has('success'))
                                <div class="form-group col-12 ml-4">
                                    <b name="success" style="color: green">{{ session()->get('success') }}</b>
                                </div>
                            @endif --}}
                            <div class="card-body">
                                {{-- image --}}
                                <div class="form-group col-12">
                                    <div id="image-preview" class="image-preview mb-1">
                                        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                        <input type="file" name="image" id="image-upload" />
                                        <input type="hidden" name="old_image" value="{{ $user->image }}" />
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('Please attach the correct image') }}
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ __('Please attach the correct image') }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- name --}}
                                <div class="form-group col-12">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required=""
                                        name="name">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the name') }}
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in the name') }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- email --}}
                                <div class="form-group col-12">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" required=""
                                        name="email">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the email') }}
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ __('Please fill in the email') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Update Password --}}
                <div class="col-12 col-md-6 ">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.profile-password.update', $user->id) }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('Update Password') }}</h4>
                            </div>
                            {{-- old password --}}
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label for="current_password">{{ __('Current Password') }}</label>
                                    <input id="current_password" type="password" class="form-control" value=""
                                        required autofocus name="current_password">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the old password') }}
                                    </div>
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- new password --}}
                                <div class="form-group col-12">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" type="password" class="form-control" required autofocus
                                        name="password">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the new password') }}
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- confirm password --}}
                                <div class="form-group col-12">
                                    <label>{{ __('Confirmed Password') }}</label>
                                    <input id="confirm_password" type="password" class="form-control" required autofocus
                                        name="confirm_password">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the confirmed password') }}
                                    </div>
                                    @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($user->image) }})",
                "background-size": "cover",
                "background-position": "center center",
            });
        })
    </script>
@endpush
