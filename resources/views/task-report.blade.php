<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Reports</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        <h4 class="mb-4">Task Report</h4>
        <a href="{{ route('report') }}" class="btn btn-primary mb-3">
            Back
        </a>


        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>Sr. No</th>
                        <th>Title</th>
                        <th>Time Taken</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($tasks->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">No record found</td>
                        </tr>
                    @else
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->time_taken }} minutes</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="alert alert-secondary d-inline-block shadow-sm">
                <h5 class="mb-0 fw-semibold">
                    Total Working Hour: {{ $totalWorkingInHour }}
                </h5>
            </div>

        </div>

    </div>

</body>

</html>
