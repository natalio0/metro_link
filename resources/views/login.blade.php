<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/loginStyle.css">
    <style>
        .error-box {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
        }

        .alert-success {
            height: 30px;
            align-items: center;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            display: flex;
            width: 300px;
            justify-content: space-around;
            margin-bottom: 15px;
            border-radius: 20px;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 300px;
            margin-bottom: 15px;
            border-radius: 20px;
            padding: 10px;
            font-size: 13px;
            margin-top: 27px;
        }
    </style>
    <title>METROLINK</title>
</head>
<body>

    {{-- Register --}}
    <div class="error-box" id="error-box"></div>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{ route('register.post') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="confirmPassword" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">

            <form action="{{ route('login.post') }}" method="POST">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @csrf
                <h1>Sign In</h1>
                <span>or use your email for login</span>
                <input type="email" placeholder="Email"  name="email" class="form-control" required>
                <input type="password" placeholder="Password" name="password" class="form-control" required>
                <button name="submit" type="submit" class="btn btn-primary">Sign In</button>

            </form>
        </div>


        {{-- Log in --}}
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <a href="#" class="logo">
                        <img src="/assets/logo-01.png" style="
                        max-width: 71px
                        ">
                    </a>
                    <p>Already have an account?</p>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <a href="#" class="logo">
                        <img src="/assets/logo-01.png" style="
                        max-width: 71px
                        ">
                    </a>
                    <p>don't have an account?</p>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const errorBox = document.getElementById('error-box');

        function showError(message) {
            errorBox.textContent = message;
            errorBox.style.display = 'block';
        }

        function clearError() {
            errorBox.textContent = '';
            errorBox.style.display = 'none';
        }

        function validateEmail(email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function validateForm() {
            const emailInput = document.querySelector('input[name="email"]');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');

            if (!validateEmail(emailInput.value)) {
                showError('Invalid email format');
                return false;
            }

            if (passwordInput.value !== confirmPasswordInput.value) {
                showError('Passwords do not match');
                return false;
            }

            clearError();
            return true;
        }
    </script>
    <script src="/js/loginScript.js"></script>

</body>
</html>
