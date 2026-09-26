<!DOCTYPE html>

<html>
<head>
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container">


<div class="header">
    <h1>Personal Task Manager</h1>

    <a href="/tasks/create" class="add-button">
        + Add New Task
    </a>
</div>

@if ($tasks->count() > 0)

    @foreach ($tasks as $task)

        <div class="task-card">

            <h2>{{ $task->task_name }}</h2>

            <p>
                {{ $task->description }}
            </p>

            <p>
                <strong>Status:</strong>

                @if ($task->status === 'Pending')
                    <span class="status pending">Pending</span>
                @else
                    <span class="status completed">Completed</span>
                @endif
            </p>

            <p>
                <strong>Due Date:</strong>
                {{ $task->due_date ?? 'No due date' }}
            </p>

            <div>

                <a href="/tasks/{{ $task->id }}/edit"
                   class="button edit-button">
                    Edit
                </a>

                <form action="/tasks/{{ $task->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="button delete-button">
                        Delete
                    </button>

                </form>

                <form action="/tasks/{{ $task->id }}/status"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('PUT')

                    @if ($task->status === 'Pending')

                        <input type="hidden"
                               name="status"
                               value="Completed">

                        <button type="submit"
                                class="button status-button">
                            Mark as Completed
                        </button>

                    @else

                        <input type="hidden"
                               name="status"
                               value="Pending">

                        <button type="submit"
                                class="button status-button">
                            Mark as Pending
                        </button>

                    @endif

                </form>

            </div>

        </div>

    @endforeach

@else

    <div class="empty-message">
        <p>No tasks found.</p>
        <p>Click <strong>+ Add New Task</strong> to create your first task.</p>
    </div>

@endif


</div>

</body>
</html>
