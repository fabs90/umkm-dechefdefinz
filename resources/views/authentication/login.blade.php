<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="shortcut icon" href="{{ asset('umkm-baru') }}/images/Logo-dechefdefinz-baru-transparent.png" />
    <link rel="stylesheet" type="text/css" href="{{ asset('login-resources') }}/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <img class="wave" src="{{ asset('login-resources/img/blue-wave2.png') }}" />
    <div class="container">
        <div class="img">
            <img src="{{ asset('login-resources') }}/img/bg.svg" />
        </div>
        <div class="login-content">
            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <img src="{{ asset('login-resources') }}/img/avatar.svg" />
                <h2 class="title">Login</h2>
                <a href="{{ route('home') }}" class="back-home">Kembali ke home</a>
                @if (session('custom_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('custom_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" value="{{ Session::get('username') }}" />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" />
                    </div>
                </div>
                {{-- <a href="#">Forgot Password?</a> --}}
                <input type="submit" class="button_login" value="Login" name="submit" />
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('login-resources') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
