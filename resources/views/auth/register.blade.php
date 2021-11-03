@extends('layouts.auth')

@section('title')
Register | DK Pancing
@endsection

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="/images/login-placeholder.jpg" alt="" class="w-50 mb-4 mb-lg-none rounded" />
                </div>
                <div class="col-lg-5">
                    <h2>
                        Buat akun Anda 😊
                    </h2>
                    <form class="mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input v-model="name" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input v-model="email" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Gender</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" @error('gender') is-invalid @enderror"
                                    name="gender" id="male" v-model="gender" value="male" {{ old('gender')=='male'
                                    ? 'checked' : '' }} required />
                                <label for="male" class="custom-control-label">
                                    🤵 Male
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" @error('gender') is-invalid @enderror"
                                    name="gender" id="female" v-model="gender" value="female" {{ old('gender')=='female'
                                    ? 'checked' : '' }} required />
                                <label for="female" class="custom-control-label">
                                    🧕 Female
                                </label>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Register Now
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2 mb-5">
                            Back to Log In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection