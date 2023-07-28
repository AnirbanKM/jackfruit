@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">View Task</a>
        </div>

        <div class="row">

            <h6>Create Task</h6>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('storeTask') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Task Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
