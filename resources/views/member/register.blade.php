<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @vite(['resources/theme/vendor/fontawesome-free/css/all.css', 'resources/theme/css/sb-admin-2.css'])

</head>

<body class="bg-gray-300">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <form action="{{route('register.store')}}" method="post" class="user"> 
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-user" id="name"  aria-describedby="emailHelp"
                                                placeholder="Firstname..."> 
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('username') }}" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" value="{{ old('password') }}" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                       
                                        <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                        <hr>
                                        
                                        
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    {{-- <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script> --}}

    @vite(['resources/theme/vendor/jquery/jquery.js', 'resources/theme/vendor/bootstrap/js/bootstrap.bundle.js', 'resources/theme/vendor/jquery-easing/jquery.easing.js', 'resources/theme/js/sb-admin-2.js', 'resources/theme/vendor/chart.js/Chart.js', 'resources/theme/js/demo/chart-area-demo.js', 'resources/theme/js/demo/chart-pie-demo.js'])

</body>

</html>