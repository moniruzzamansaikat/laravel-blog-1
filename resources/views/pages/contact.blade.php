@extends('layouts.app') @section('title', 'Contact') @section('content')

<div class="container">
    <div class="row mainmargin">
        <div class="col-md-8">
            <div class="contact-page">
                <h2 class="underscore mb-5">
                    Please let us know if you have any questions
                </h2>
                <div class="line"></div>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum sunt optio consequuntur ducimus odit. Deleniti optio
                    saepe unde omnis. Sapiente aliquam repellendus error id
                    veniam totam dolores recusandae non dolorum?
                </p>
                <div class="line"></div>
                <form
                    action="{{ route('contact.store') }}"
                    id="contactForm"
                    method="post"
                >
                    @csrf

                    <!-- Name input -->
                    <div class="mb-3">
                        <input
                            class="form-control"
                            id="name"
                            name="name"
                            type="text"
                            placeholder="Name *"
                            data-sb-validations="required"
                        />

                        @error('name')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="name:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Email address input -->
                    <div class="mb-3">
                        <input
                            class="form-control"
                            id="emailAddress"
                            type="email*"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email Address *"
                            data-sb-validations="required, email"
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

                    <!-- Form submissions success message -->
                    @if(session()->has('success'))
                    <div class="text-success" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            {{session()->get('success')}}
                        </div>
                    </div>
                    @endif

                    <!-- Message input -->
                    <div class="mb-3">
                        <textarea
                            class="form-control"
                            id="contact"
                            name="message"
                            type="text"
                            placeholder="Leave a Message"
                            style="height: 10rem"
                            data-sb-validations="required"
                        ></textarea>

                        @error('message')
                        <div
                            class="invalid-feedback"
                            data-sb-feedback="message:required"
                        >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button
                            class="main-button mt-0 disabled"
                            id="submitButton"
                            type="submit"
                        >
                            Send message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
