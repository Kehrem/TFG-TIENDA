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
    <link href="css/comparativaArticulos.css" rel="stylesheet">
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
        </div>

    </nav>

    <!-- Page Content -->
    <section class="bodyHeader row">
        <span class="col-md-12">
            <span class="bodyHeader_container col-md-9 col-md-push-2">
                <h2>Título Tienda</h2>
                <div class="search" role="search">
                    <form class="search_form">
                         <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> <input type=search id="search_input" name="search_input">

                    </form>

                </div>
            </span>
        </span>
    </section>
    <div class="container main">

        <div class="row">

                
        </div>
        <div class="row">
            <div class="current_navigation_container">
                <nav class="current_navigation">
                           <ul class="current_navigation_ul">
                               <li class="current_navigation_ul_li"><a href="#home">Inicio</a></li>

                           </ul>
                </nav>
            </div>
        </div>
        <main id="main">
              <div class="comparativaArticulos col-md-12"></div>

        </main>
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
    var articulos=sessionStorage.getItem("articulosComparacion");
     var cc=articulos.split("|");
    var validKeys=0;
    $.each(cc,function(key,value){
               //control_addCompararArticulo(JSON.parse(sessionStorage.getItem("compararArticulos-"+value))); 
                if(value=="" || value==" "){
                }else{
                    validKeys++;
                    $(".comparativaArticulos").append("<div id='compararArticulos-"+value+"' class='comparativaArticulo'></div>");
                    var dataArticulo=JSON.parse(sessionStorage.getItem("compararArticulos-"+value));
                   $("#compararArticulos-"+value).load("includes/comparativaArticulo.php",{'data': dataArticulo });
                }           
    });
    if(validKeys==1){
        $(".comparativaArticulo").addClass("col-md-12");
    }
    if(validKeys==2){
        $(".comparativaArticulo").addClass("col-md-6");
    }
    if(validKeys==3){
        $(".comparativaArticulo").addClass("col-md-4");
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
     echo '<script>control_cargarCategorias();</script>';   
    }
    ?>
</html>