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
                        <form action="{{ route('updateTask') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Task Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $task->name }}" placeholder="Enter Name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ $task->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Task Status:</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="progress" @if ($task->status == 'progress') selected @endif>
                                            progress
                                        </option>
                                        <option value="completed" @if ($task->status == 'completed') selected @endif>
                                            completed
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="is_prioritized" class="form-label">Set Task Prioritized:</label>
                                    <select class="form-select" id="is_prioritized" name="is_prioritized">
                                        <option value="1" @if ($task->is_prioritized == 1) selected @endif>
                                            Yes
                                        </option>
                                        <option value="0" @if ($task->is_prioritized == 0) selected @endif>
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="due_date" class="form-label">Task Set Reminder:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date"
                                    value="{{ $task->due_date }}" />
                                @error('due_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
