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
                        <a href="#" onclick="abrir_avisosAdmin()">Avisos |&nbsp;<span id="numAvisosSinLeer"></span>&nbsp;Sin Leer</a>
                    </li>
                    <li id="estadisticas">
                        <a href="#" onclick="abrir_GraficasKpis();">Estadísticas</a>
                    </li>
                    <li id="log_seguridad">
                        <a href="#">Log Seguridad</a>
                    </li>
                </ul>
                <ul id="gestion_general" class="categorias"><h4>Gestion General</h4>
                    <li>
                        <a href="#" onclick="abrir_elementosPortada()">Portada</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrir_elementosPortada()">Módulos</a>
                    </li>
                    <li>
                        <a href="#">Categorías</a>
                    </li>
                    <li>
                        <a href="#">Artículos</a>
                    </li>
                    <li>
                        <a href="#">Usuarios</a>
                    </li>
                    <li>
                        <a href="#">Provincias / Localidades</a>
                    </li>
                    <li>
                        <a href="#">Pedidos</a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Simple Sidebar</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
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
</body>

</html>
