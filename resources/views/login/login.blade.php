<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | High Speed Studio</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
</head>
<body>
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif


    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <br><br><br><br>
                        <figure>
                          <a href="{{ url('/') }}"><img src="login/images/highspeed.png" alt="sing up image"></a>
                        </figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title"><center>Sign in</center></h2>
                        @if (session('salah'))
                        <div class="alert alert-danger">
                          {{ session('salah') }}
                        </div>
                        @endif
                        <form method="POST" class="register-form" id="login-form" action="{{ url('/masuk') }}">
                            @csrf
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                              <center>
                                <input type="submit" name="login" id="signin" class="form-submit" value="Sign In"/>
                              </center>
                            </div>
                        </form>
                        <br>
                        <center>
                        <a href="{{ url('/lupa') }}" class="signup-image-link">Forgot Password</a>
                    </center>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>
</body>
</html>
