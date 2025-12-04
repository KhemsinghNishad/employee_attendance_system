<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-md p-6">

        <h1 class="text-2xl font-semibold mb-6">Welcome, {{ Auth::user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

            <div class="p-4 border rounded">
                <h2 class="font-medium">Name</h2>
                <p class="text-gray-700">{{ Auth::user()->name }}</p>
            </div>

            <div class="p-4 border rounded">
                <h2 class="font-medium">Email</h2>
                <p class="text-gray-700">{{ Auth::user()->email }}</p>
            </div>

        </div>

        <button id="clockInButton" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Clock In
        </button>
        <button id="clockOutButton" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Clock Out    
        </button>
        <a href="{{ route('task.assign') }}">
            <button id="taskAssignButton" class="px-6 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
                Task Assign
            </button>
        </a>
        <a href="{{ route('report') }}">
            <button id="reportButton" class="px-6 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Report
            </button>
        </a>
         <a href="{{ route('logout') }}" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Logout
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#clockInButton').click(function() {
            let btn = $(this);
            btn.prop('disabled', true);
            $.ajax({
                url: '{{ route('clock.in') }}',
                type: 'post',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    btn.prop('disabled', false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });

                },
                error: function(jqXHR) {
                    console.log(jqXHR.responseText);
                    btn.prop('disabled', false);
                }
            });
        })
        $('#clockOutButton').click(function() {
            let btn = $(this);
            btn.prop('disabled', true);
            $.ajax({
                url: '{{ route('clock.out') }}',
                type: 'post',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    btn.prop('disabled', false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                error: function(jqXHR) {
                    console.log(jqXHR.responseText);
                    btn.prop('disabled', false);
                }
            });
        })
    </script>
</body>

</html>
