
<?php
session_start();
if(isset($_SESSION["admin"])){
    header("location: cpanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/bootstrapCarousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <main>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="centrado col-md-6 col-md-push-2">
                                <form class="form" action="json/login.php" method="post">
                                    <h1>Acceso</h1>
                                    <span><label>Nombre de usuario: </label>
                                        <input type="text" name="username"></span>
                                    <span><label>Contraseña: </label>
                                        <input type="password" name="pwd"></span>
                                    <input type=submit value="Acceder">
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <!-- Menu Toggle Script -->
</body>

</html>
