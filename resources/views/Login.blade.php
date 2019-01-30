<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet" id="login">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pr-wrap">
                    <div class="pass-reset">
                        <label>
                            Enter the email you signed up with</label>
                        <input type="email" placeholder="Email" />
                        <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                    </div>
                </div>
                <div class="wrap">
                   <p class="form-title">
                        Iniciar Sesion</p>
                    <form class="login" action="{{ route('elvin') }}" method="POST">
                        <input type="text" name="usuario" required="required" placeholder="Usuario" />
                        <input type="password" name="password" required="required" placeholder="Password" />
                        <input type="submit" value="Ingresar" class="btn btn-success btn-sm" />
                        <div class="remember-forgot">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" />
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 forgot-pass-content">
                                    <a href="javascription:void(0)" class="forgot-pass">Forgot Password</a>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="posted-by">Powered By: <a href="http://www.jquery2dotnet.com">EcSe</a></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4"></div>
            @if(session('avisousuario'))
            <div class="alert alert-danger col-6 col-md-4 text-center" role="alert">
                {{session('avisousuario')}}
            <div>
            @endif
            <div class="col-6 col-md-4"></div>
        </div>
    </div>
                    



    <script src="js/login.js"></script>
</body>