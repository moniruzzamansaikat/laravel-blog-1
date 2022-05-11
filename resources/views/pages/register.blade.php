@extends('layouts.app') @section('title', "Register") @section('content')

<div class="container">
    <div class="row mainmargin">
        <div class="card" style="max-width: 350px; margin: 0 auto">
            <form action="{{ route('auth.register') }}" method="post">
                @csrf

                <div class="card-body">
                    <h4 class="text-center mb-4">Register</h4>
                    <div class="form-group">
                        <input
                            tabindex="1"
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                        />
                        @error('name')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="emailAddress:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input
                            tabindex="1"
                            type="text"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email address"
                            value="{{ old('email') }}"
                        />
                        @error('email')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="emailAddress:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input
                            tabindex="2"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            value="{{ old('password') }}"
                        />
                        @error('password')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="emailAddress:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input
                            tabindex="2"
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Repeat your password"
                            value="{{ old('password_confirmation') }}"
                        />
                        @error('password_confirmation')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="emailAddress:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button
                            type="submit"
                            class="main-button c-button login-submit-button"
                        >
                            register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
