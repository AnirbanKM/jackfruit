@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">View Task</a>
        </div>

        <div class="row">

            <h6>Edit your Task</h6>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('createReminder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">

                            <div class="mb-3">
                                <label for="due_date" class="form-label">Task Set Reminder:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date"
                                    value="{{ $task->name }}" />
                                @error('due_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info">Set Reminder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
