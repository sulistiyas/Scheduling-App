<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Scheduling - APP</title>
  <link rel="icon" href="{{ asset('assets/dist/img/INL_Logo_Only.png') }}" type="image/gif" sizes="16x16">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="row">
        <div class="col-12" style="background-color: white">
            <div class="row" style="margin: 80px 80px 80px 80px">
                <div class="col-5">
                    <div class="login-box">
                        <div class="login-logo">
                          <a href="../../index2.html"><b>Scheduling</b> - APP</a>
                        </div>
                        <!-- /.login-logo -->
                        
                        <div class="card">
                          <div class="card-body login-card-body">
                            <br>
                            <p class="login-box-msg">Sign in to start your session</p>
                            <br>
                            
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                              <div class="input-group mb-3">
                                  <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fas fa-envelope"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="input-group mb-3">
                                  <input type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fas fa-lock"></span>
                                      </div>
                                  </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-8">
                                      <div class="icheck-primary">
                                          <input type="checkbox" id="remember">
                                          <label for="remember">
                                              Remember Me
                                          </label>
                                      </div>
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-4">
                                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                  </div>
                                  <!-- /.col -->
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('assets/dist/img/car_bg.jpg') }}" width="500" height="350" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>