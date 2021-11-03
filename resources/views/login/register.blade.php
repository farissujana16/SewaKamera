<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration | High Speed Studio</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
</head>
<body>



    <div class="main">

      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ url('/register') }} "method="post" class="register-form" id="register-form">
                          @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="name" placeholder="Nama Lengkap"/>
                            </div>
                            <div class="form-group">
                                <label for="tmp_lhr"><i class="zmdi zmdi-my-location material-icons-name"></i></label>
                                <input type="text" name="tempat_lahir" id="tmp_lhr" placeholder="Tempat Lahir"/>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lhr"><i class="zmdi zmdi-calendar material-icons-name"></i></label>
                                <input type="date" name="tanggal_lahir" id="tgl_lhr" placeholder="Tanggal Lahir"/>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-my-location material-icons-name"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                    </div>
                    <div class="signup-image">
                      <br><br><br><br><br><br>
                      <figure><a href="{{ url('/') }}"><img src="login/images/highspeed.png" alt="sing up image"></a></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
