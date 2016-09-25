<?php 
session_start();
if(!isset($_SESSION["admin"])){
    //header("Location: index.php");
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

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Panel de Control
                    </a>
                </li>
                <ul id="Misc" class="categorias"><h4>Misc</h4>
                    <li id="avisos">
                        <a href="#" onclick="abrir_avisosAdmin(this)">Avisos |&nbsp;<span id="numAvisosSinLeer"></span>&nbsp;Sin Leer</a>
                    </li>
                    <li id="estadisticas">
                        <a href="#" onclick="abrir_GraficasKpis(this);">Estadísticas</a>
                    </li>
                    <li id="log_seguridad">
                        <a href="#">Log Seguridad</a>
                    </li>
                    <li id="export_db">
                        <a href="#">Exportar Database</a>
                    </li>
                </ul>
                <ul id="gestion_general" class="categorias"><h4>Gestion General</h4>
                    <li>
                        <a href="#" onclick="abrir_elementosPortada(this)">Portada</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_modulos(this)">Módulos</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_noticias(this)">Noticias</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_categorias(this)">Categorías</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_articulos(this)">Artículos</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_proveedores(this)">Proveedores</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_databases(this)">Base de datos</a>
                    </li>
                    <li>
                        <a href="#">Administradores</a>
                    </li>
                </ul>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <main>
                   
                </main>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/gestion.js"></script>
    <script src="js/abrir.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrapCarousel.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script>
    $.ajax({
        url:"json/getNumNoticiasSinLeer.php",
        method:"POST",
        success: function(result){
            console.log(result);        
            $("#numAvisosSinLeer").html(result);
        }
    });
    </script>
     <script>abrir_avisosAdmin()</script>
</body>

</html>
