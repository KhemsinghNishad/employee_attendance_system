<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Report</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
        }
        .table tbody tr:hover {
            background: #f2f3f5;
        }
        body {
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <h4 class="mb-4">Employee Attendance Report - {{ Auth::user()->name }}</h4>
         <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">
            Back
        </a>

        <div class="table-responsive shadow-sm">
            <table class="table table-hover bg-white text-nowrap">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                        <th>Tasks</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($reports->isNotEmpty())
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->date }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->clock_in)->format('H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->clock_out)->format('H:i:s') }}</td>
                                <td>
                                   <a href="{{ route('tasks', $report->date) }}"> <i class="fa-solid fa-list-check"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center text-muted">No records found</td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>
