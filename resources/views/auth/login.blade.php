@extends('layout')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">

        <div class="card-header text-center">
            <h3>Login</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="login">Email or Phone</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Enter email or phone" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        </div>
        </div>

        <div class="d-grid">
            <a href="{{ route('register') }}" class="btn btn-link">Don't have an account? Register here</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
