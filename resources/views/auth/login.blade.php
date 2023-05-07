<!doctype html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="BirjaNews">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <title>{{ config('app.name', 'BirjaNews Admin') }}</title>

    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <script src="{{ asset('js/modernizr.js') }}"></script>

    @yield('styles')

</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-end">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Giriş</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Login</label>
                        <div class="input-group">
                            <input id="login" type="text"
                                   class="form-control form-control-lg {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Şifrə</label>
                        </div>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Yadda saxla
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-end">
                            <button type="submit" class="btn btn-primary mt-2">Daxil ol</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 mb-3">&copy; BirjaNews Copyright 2021. All Rights Reserved.</p>
    </div>
</section>

<script src="{{ 'js/admin.js' }}"></script>

</body>
</html>
