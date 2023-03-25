<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->



    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 
    @vite(['resources/theme_be/vendor/fontawesome-free/css/all.css', 'resources/theme_be/css/sb-admin-2.css'])
</head>

<body id="page-top">

        @yield('content')
    
    @vite(['resources/theme_be/vendor/jquery/jquery.js', 
    'resources/theme_be/vendor/bootstrap/js/bootstrap.bundle.js', 
    'resources/theme_be/vendor/jquery-easing/jquery.easing.js', 
    'resources/theme_be/js/sb-admin-2.js', 'resources/theme_be/vendor/chart.js/Chart.js',
    'resources/theme_be/js/demo/chart-area-demo.js', 
    'resources/theme_be/js/demo/chart-pie-demo.js',
    'resources/js/sweetalert.js'
    ])

    @if (session()->has('swal'))
        <script type="module">
            $(function(){
                Swal.fire({
                    icon: 'success',
                    title: 'success message',
                    text: '{{session()->get("swal")}}',  
                })
            })
        </script>

    @endif
    

</body>

</html>
