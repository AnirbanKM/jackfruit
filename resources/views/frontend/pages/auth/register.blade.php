@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Register Page</h5>

                        <form action="{{ route('createUser') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="name" class="form-control" id="name" name="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
