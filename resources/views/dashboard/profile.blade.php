@extends('layouts.admin') @section('title', 'Profile') @section('content')

<div class="card card-body mb-4">
    <div class="d-flex align-items-center">
        <img
            src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
            style="width: 100px"
            class="img-fluid me-3"
            alt=""
        />
        <div>
            <h4 class="alert-heading">Hey, {{auth()->user()->name}}!</h4>
            <hr />
            <p class="mb-0">
                You can change your profile information here if needed.
            </p>
        </div>
    </div>
</div>

<!-- update name, email and thumbnail -->
<div class="card p-4">
    <form action="">
        <h3>Basic Information</h3>

        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input
                        type="file"
                        name="thumbnail"
                        class="form-control mt-2"
                    />
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        tabindex="1"
                        type="text"
                        class="form-control mt-2"
                        id="name"
                        name="name"
                        value="{{auth()->user()->name}}"
                    />
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        tabindex="2"
                        type="email"
                        class="form-control mt-2"
                        id="email"
                        name="email"
                        value="{{auth()->user()->email}}"
                    />
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<!-- update password -->
<div class="card p-4 my-5">
    <form action="{{ route('dashboard.profile.security') }}" method="POST">
        @csrf

        <h3>Security</h3>
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="old_password">Old password</label>
                    <input
                        tabindex="1"
                        type="password"
                        class="form-control mt-2"
                        id="old_password"
                        name="old_password"
                    />
                    @error('old_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input
                        tabindex="2"
                        type="password"
                        class="form-control mt-2"
                        id="new_password"
                        name="new_password"
                    />
                    @error('old_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="confirm_password">Confirm new passowrd</label>
                    <input
                        tabindex="2"
                        type="password"
                        class="form-control mt-2"
                        id="confirm_password"
                        name="confirm_password"
                    />
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">
                Update password
            </button>
        </div>
    </form>
</div>

@endsection
