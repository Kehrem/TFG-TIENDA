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
    <link href="css/shop-homepage2.css" rel="stylesheet">
    <link href="css/shop-item.css" rel="stylesheet">
    
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
    
    <nav class="main_nav navbar">
        <div class="user_area">
            <?php 
            session_start();
            
            if(isset($_SESSION["acceso"])){
                echo '<script>control_cargarAreaUsuarios("acceso");</script>';
            }else{
                echo '<script>control_cargarAreaUsuarios("sinAcceso");</script>';
            }
            ?>
        </div>
        <div class="navigation" role="navigation">
            <ul class="topnav">
              <li><a href="index.php">Inicio</a></li>
              <!--<li class="liDesplegable"><a href="#">Categorías/Artículos</a>
                  <ul class="despliegaCategorias">
                  
                </ul>
            </li>-->
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="pagosyenvios.php">Información</a></li>
                <li><a href="tiendafisica.php">Tienda Física</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li class="icon">
                <a href="javascript:void(0);" onclick="control_toggleResponsiveNav()"><i class="fa fa-bars" aria-hidden="true"></i></a>
              </li>
            </ul>
            <div class="col-md-12 contenedorCatalogoProductos">
               <div class="catalogoProductos2 col-md-12">
                    
                </div>
                <div class="subCategorias col-md-10">
                    
                </div>
            </div>
        </div>

    </nav>

    <!-- Page Content -->
    <section class="bodyHeader row">
        <div class="col-md-12">
            <div class="bodyHeader_container col-md-6 col-md-push-3">
               
                <div class="search" role="search">
                    <form class="search_form pull-right">
                      
                         <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i>
                        <input type=search id="search_input" name="search_input" onkeyup="control_recogerDatosBusqueda($(this).val())">
                        <br>
                        <a href="buscar.php">Búsqueda por filtros&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i></a>
                        <br>
                        <div id="contResultadosBusqueda">
                            <div id="resultadosBusqueda">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
      
    <div class="container main">

        <main id="main" class="">
            
           

        </main>
        <div class='col-md-10 col-md-push-1 contenedor_compararArticulos display_none'>
            <i onclick="control_minimizar('compararArticulos')" class="minimizarCompararArticulos fa fa-minus fa-2x" aria-hidden="true"></i>
            <i onclick="control_cerrar('compararArticulos')" class="cerrarCompararArticulos fa fa-times fa-2x" aria-hidden="true"></i>
            <div class='col-md-12 contCompararArticulos'></div>
            <div class='col-md-12'><span class='col-md-2 col-md-push-5 contenedor_compararArticulosButton'><button onclick="control_compararArticulos();">Comparar</button></span></div>
        </div>
    </div>
    <!-- /.container -->
   
     <div class="stayAtBottom">
        <div class="container pie">


            <!-- Footer -->
            <footer class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <ul><h3 class="">Información</h3>
                            <li><a>Formas de Pago</a></li>
                            <li><a>Envío</a></li>
                            <li><a>Condiciones de uso</a></li>
                            <li><a>Devoluciones</a></li>
                            <li><a>Política de privacidad</a></li>
                        </ul>
                        <ul class="footer_contactanos"><h3 class="">Contáctanos</h3>
                            <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
                            <li><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></li>
                            <li><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></li>
                            <li><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></li>

                        </ul>
                        <ul class="footer_contactanos"><h3 class="">Quejas y sugerencias</h3>
                            <li><a>Reportar un problema</a></li>
                            <li><a>Buzón de sugerencias</a></li>
                        </ul>

                    </div>
                </div>
            </footer>

        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    
</body>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>control_cargarLogIn()</script>
        <script>
            //console.log((sessionStorage.getItem("articulosComparacion")));
        if(sessionStorage.getItem("articulosComparacion")){
            var cnt=sessionStorage.getItem("articulosComparacion");
            sessionStorage.removeItem("articulosComparacion");
            var cc=cnt.split("|");
            $.each(cc,function(key,value){
               //control_addCompararArticulo(JSON.parse(sessionStorage.getItem("compararArticulos-"+value))); 
                if(value=="" || value==" "){
                    
                }else{
                    control_addCompararArticulo(JSON.parse(sessionStorage.getItem("compararArticulos-"+value))); 
                }
                
            });
        }
    </script>
</html>