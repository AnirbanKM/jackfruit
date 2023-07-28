<div class="container">

    <div class="row mb-3 seachArea">
        <div class="col-md-8">
            <form action="" method="get">

                <input type="text" name="search" class="form-control mb-2" placeholder="Search By Name" />

                <select class="form-select mb-2" name="status">
                    <option value="">Search By Status</option>
                    <option value="completed">Completed</option>
                    <option value="progress">Progress</option>
                </select>

                <select class="form-select mb-2" name="priority">
                    <option value="">Search By Priority</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <input type="submit" value="Search" class="btn btn-primary" />
            </form>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('createTask') }}" class="btn btn-primary">Create Task</a>
        </div>
    </div>

    <div class="table-responsive taskTable">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Reminders</th>
                    <th scope="col">Set Prioritized</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ Str::limit($item->description, 20) }}</td>
                        <td>
                            <p style="text-transform: capitalize;">
                                @if ($item->status === 'progress')
                                    <span class="badge bg-info">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            @isset($item->due_date)
                                {{ $item->due_date }}
                            @else
                                <a href="{{ route('setReminder', $item->id) }}" class="btn btn-outline-danger">
                                    Set Reminder
                                </a>
                            @endisset
                        </td>
                        <td>
                            @if ($item->is_prioritized)
                                <span class="badge bg-warning text-dark">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status === 'completed')
                                <span class="badge bg-success text-white">No Action Available</span>
                            @else
                                <a href="{{ route('editTask', $item->id) }}" class="btn btn-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('deleteTask', $item->id) }}" class="btn btn-danger"
                                    onclick="alert('Are you sure ?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="{{ route('viewTask', $item->id) }}" class="btn btn-outline-primary">
                                    <i class="fa-solid fa-eye fa-beat"></i>
                                </a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $task->links() !!}
    </div>
</div>
