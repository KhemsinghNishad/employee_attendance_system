<!DOCTYPE html>
<html>

<head>
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #eef2f3, #dfe9f3);
            /* soft grey-blue gradient */
            height: 100vh;
        }

        .login-card {
            border-radius: 15px;
            padding: 30px;
            background: #fff;
        }

        .login-title {
            font-weight: 700;
            color: #333;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .btn-login {
            height: 45px;
            font-weight: 600;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-md-4">

            <div class="login-card shadow">

                <h3 class="text-center login-title mb-4">Employee Login</h3>

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 btn-login">Login</button>

                </form>

            </div>

        </div>
    </div>

</body>

</html>
