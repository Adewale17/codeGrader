@extends('includes.layout')
@section('content')
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <h3 class="text-center">Login</h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter your email">

                            @error('email')
                                <div class="invalid-feedback">
                                    ` {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter your password">

                            @error('password')
                                <div class="invalid-feedback">
                                    `{{ $message }}
                                </div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                    </form>
                    <p class="text-center mt-3">Don't have an account? <a href="signup.html">Sign up</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
