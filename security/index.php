<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Energía Peñolite - Tienda</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <!-- font awesome icons-->
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui/jquery-ui.js"></script>
    
    <!-- Custom JSs -->
    
    <script src="js/control.js"></script>
    <script src="js/funciones.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    
    <nav class="main_nav navbar-fixed-top">
        <div class="user_area">
            <ul class="user_area_list">
              <li><a href="#home">Registrarse</a></li>
              <li><a href="#news">Iniciar Sesión</a></li>
            </ul>
        </div>
        <div class="navigation" role="navigation">
            <ul class="topnav">
              <li><a href="#home">Inicio</a></li>
              <li><a href="#news">Novedades</a></li>
              <li><a href="#contact">Contacto</a></li>
              <li><a href="#about">Acerca</a></li>
              <li class="icon">
                <a href="javascript:void(0);" onclick="control_toggleResponsiveNav()"><i class="fa fa-bars" aria-hidden="true"></i></a>
              </li>
            </ul>
        </div>

    </nav>

    <!-- Page Content -->
    <section>
    <div class="search" role="search">
            <form class="search_form">
                Buscar <input type=search id="search_input" name="search_input"> <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> 
            
            </form>
            
        </div>
    
    </section>
    <div class="container main">
        
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                   <!-- <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>-->
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    
                      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-10 col-lg-10 col-md-10">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

    <script>control_cargarCategorias();</script>
</html>
