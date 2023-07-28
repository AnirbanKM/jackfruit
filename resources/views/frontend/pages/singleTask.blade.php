@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">Return Back</a>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Name: {{ $task->name }}</h4>
                        <p class="mb-1">Description: {{ $task->description }}</p>
                        <h6>Status:
                            @if ($task->status === 'progress')
                                <span class="badge bg-info">{{ $task->status }}</span>
                            @else
                                <span class="badge bg-success">{{ $task->status }}</span>
                            @endif
                        </h6>
                        <h6>Due Date:
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d F Y') : '---' }}</h6>
                        <h6>Prioritized:
                            @if ($task->is_prioritized)
                                <span class="badge bg-warning text-dark">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
