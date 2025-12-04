<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assign</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-4">

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-body">

                <h2 class="mb-3">Task Assign {{ $today }}</h2>
                <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">
                    Back
                </a>

                <!-- Success Message -->
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: "{{ session('success') }}",
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000, // 3 seconds
                                timerProgressBar: true
                            });
                        });
                    </script>
                @endif



                <!-- Task Form -->
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Task Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}">

                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Start Time -->
                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="start_time"
                            class="form-control @error('start_time') is-invalid @enderror"
                            value="{{ old('start_time') }}">

                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- End Time -->
                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="time" name="end_time"
                            class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}">

                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-warning">Add Task</button>
                </form>


                <!-- Task List -->
                <h4 class="mt-4">Today's Tasks</h4>

                @if ($tasks->count() == 0)
                    <p class="text-muted">No tasks added for today.</p>
                @else
                    <table class="table table-bordered mt-2">
                        <thead class="table-secondary">
                            <tr>
                                <th>Title</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Time Taken</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->start_time }}</td>
                                    <td>{{ $task->end_time }}</td>
                                    <td>{{ $task->time_taken }} minutes</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
