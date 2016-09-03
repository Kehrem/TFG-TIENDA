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
              <li><a href="#" onclick="control_navegarA('index.php')">Inicio</a></li>
              <!--<li class="liDesplegable"><a href="#">Categorías/Artículos</a>
                  <ul class="despliegaCategorias">
                  
                </ul>
            </li>-->
                <li><a href="#">Noticias</a></li>
              <li><a href="#">Conócenos</a></li>
              <li><a href="#">Más información</a></li>
              <li><a href="#">Contacto</a></li>
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
                         <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> <input type=search id="search_input" name="search_input">

                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="row cnc col-md-9 col-md-push-2">
            <div class="current_navigation_container">
                <nav class="current_navigation">
                           <ul class="current_navigation_ul">
                               <li class="current_navigation_ul_li"><a href="#home">Inicio</a></li>

                           </ul>
                </nav>
            </div>
        </div>            
    <div class="container main col-md-12">
        
        <div class="col-md-2">
                <p class="lead">Energía Peñolite</p>
                <div class="catalogoProductos">
                   
                </div>
        </div>
        <main id="main" class="col-md-9">
              

        </main>
        <div class='col-md-7 contenedor_compararArticulos display_none'>
            <i onclick="control_minimizar('compararArticulos')" class="minimizarCompararArticulos fa fa-minus fa-2x" aria-hidden="true"></i>
            <i onclick="control_cerrar('compararArticulos')" class="cerrarCompararArticulos fa fa-times fa-2x" aria-hidden="true"></i>
            <div class='col-md-12 contCompararArticulos'></div>
            <div class='col-md-12'><span class='col-md-2 col-md-push-5 contenedor_compararArticulosButton'><button onclick="control_compararArticulos();">Comparar</button></span></div>
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

</body>

    <!--SI NO SE HA REALIZADO NINGÚN REGISTRO SE CARGA EL MAIN -->
    <?php
    //session_start();
    $main=true; //carga main de forma normal=
    if(isset($_SESSION["registro"])){

        $main=false;
        
        if($_SESSION["registro"]=="error"){
            echo '<script>control_cargarRegistroError();</script>';
        }
        if($_SESSION["registro"]=="completado"){
            echo '<script>control_cargarRegistroCompletado();</script>';
        }
        if($_SESSION["registro"]=="activado"){
            echo '<script>control_cargarRegistroActivado();</script>';    
        }
        if($_SESSION["registro"]=="ya_activado"){
            echo '<script>control_cargarRegistroYaActivado();</script>';    
        }
        unset($_SESSION["registro"]);
        
    }
    if(isset($_SESSION["bienvenida"])){
    //        echo '<script>alert("BIENVENIDO");</script>';
    }

    if($main==true){
     echo '<script>control_cargarCategorias();</script><script>control_cargarMain();</script>';   
    }
    ?>

</html>