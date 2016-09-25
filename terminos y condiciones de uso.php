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
            
            <div class="col-md-12 informacionGeneral">
                <article id="condicionesGenerales">
                    <h1>Terminos y condiciones de uso y venta</h1>

Las presentes Condiciones Generales de Uso, Política de Privacidad y Venta (en adelante, las “Condiciones Generales”) regulan el uso del sitio web que Internet 2.0 Factoria de Internet, S.L. (en adelante “Energia Peñolite”), pone a disposición de las personas que accedan a su Sitio Web con el fin de proporcionales información sobre productos y servicios, propios y/o de terceros colaboradores, y facilitarles el acceso a los mismos, así como la contratación de servicios y bienes por medio de la misma (todo ello denominado conjuntamente los “Servicios”).<br><br>

Energia Peñolite, con domicilio social en Avenida Peñolite nº4 puente de genave (23350), es una sociedad de responsabilidad limitada española titular del presente Sitio Web.<br><br>

Para contactar con  Energia Peñolite, puede utilizar la dirección de correo postal arriba indicada, así como la dirección de correo electrónica energiapeñolite.contacto@gmail.com Esta dirección de correo electrónico está protegida contra spambots.<br><br>

Por la propia naturaleza del Sitio Web, así como de su contenido y finalidad, la práctica totalidad de la navegación que se puede llevar a cabo por el mismo ha de hacerse gozando de la condición de Cliente, la cual se adquiere según los procedimientos recogidos en la misma. Por lo tanto, la citada condición de Cliente supone la adhesión a las Condiciones Generales en la versión publicada en el momento en que se acceda al Sitio Web. Energia Peñolite  se reserva el derecho de modificar, en cualquier momento, la presentación y configuración del Sitio Web, así como las presentes Condiciones Generales. Por ello, Energia Peñolite  recomienda al Cliente leer el mismo atentamente cada vez que acceda al Sitio Web.<br><br>

En cualquier caso, existen páginas del Sitio Web accesibles al público en general, respecto a las cuales Energia Peñolite  también desea cumplir con sus obligaciones legales, así como regular el uso de las mismas. En este sentido, los usuarios que accedan a estas partes del Sitio Web aceptan quedar sometidos, por el hecho de acceder a las citadas páginas, por los términos y condiciones recogidos en estas Condiciones Generales, en la medida que ello les pueda ser de aplicación.<br><br>

Por último, por la naturaleza propia del presente Sitio Web, es posible que se modifiquen o incluyan cambios en el contenido de las presentes Condiciones Generales. Por esto, el Cliente, así como otros usuarios que no gocen de esta condición, quedan obligados a acceder a las presente Condiciones Generales cada vez que accedan al Sitio Web, asumiendo que les serán de aplicación las condiciones correspondientes que se encuentren vigentes en el momento de su acceso.<br><br>

Energia Peñolite es un servicio gratuito de diseño y alojamiento de tiendas online, realizando una comisión simbólica del 5% sobre las transacciones de dichas tiendas en concepto de mantenimiento y soporte.<br><br>

                    <h2>ACCESO Y SEGURIDAD</h2>

El acceso a los Servicios requiere el registro previo de los usuarios, una vez acepten las Condiciones Generales, pasando a ser considerados como Clientes .<br><br>

El identificador del Cliente estará compuesto por su dirección de correo electrónico y una contraseña. Para el acceso a la cuenta propia del Cliente, será necesario la inclusión de este identificador, así como de una contraseña que deberá contener como mínimo 4 caracteres.<br><br>

El uso de la contraseña es personal e intransferible, no estando permitida la cesión, ni siquiera temporal, a terceros. En tal sentido, el Cliente se compromete a hacer un uso diligente y a mantener en secreto la misma, asumiendo toda responsabilidad por las consecuencias de su divulgación a terceros.<br><br>

En el supuesto de que el Cliente conozca o sospeche del uso de su contraseña por terceros, deberá modificar la misma de forma inmediata, en el modo en que se recoge en el Sitio Web.<br><br>

                    <h2>UTILIZACIÓN CORRECTA DE LOS SERVICIOS</h2>

El Cliente se obliga a usar los Servicios de forma diligente, correcta y lícita y, en particular, a título meramente enunciativo y no limitativo, se compromete a abstenerse de:<br><br>

utilizar los Servicios de forma, con fines o efectos contrarios a la ley, a la moral y a las buenas costumbres generalmente aceptadas o al orden público;
reproducir o copiar, distribuir, permitir el acceso del público a través de cualquier modalidad de comunicación pública, transformar o modificar los Servicios, a menos que se cuente con la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido;
realizar cualquier acto que pueda ser considerado una vulneración de cualesquiera derechos de propiedad intelectual o industrial pertenecientes a Energia Peñolite   o a terceros;
emplear los Servicios y, en particular, la información de cualquier clase obtenida a través del Sitio Web para remitir publicidad, comunicaciones con fines de venta directa o con cualquier otra clase de finalidad comercial, mensajes no solicitados dirigidos a una pluralidad de personas con independencia de su finalidad, así como de comercializar o divulgar de cualquier modo dicha información;
El Cliente responderá de los daños y perjuicios de toda naturaleza que Energia Peñolite  pueda sufrir, con ocasión o como consecuencia del incumplimiento de cualquiera de las obligaciones anteriormente expuestas así como cualesquiera otras incluidas en las presentes Condiciones Generales y/o las impuestas por la Ley en relación con la utilización del Sitio Web .<br><br>

Energia Peñolite  velará en todo momento por el respeto del ordenamiento jurídico vigente, y estará legitimada para interrumpir, a su entera discreción, el Servicio o excluir al Cliente del Sitio Web en caso de presunta comisión, completa o incompleta, de alguno de los delitos o faltas tipificados por el Código Penal vigente, o en caso de observar cualesquiera conductas que a juicio de Energia Peñolite  resulten contrarias a estas Condiciones Generales, las Condiciones Generales de Contratación que operan para este Sitio Web, la Ley, las normas establecidas por Energia Peñolite  o sus colaboradores o puedan perturbar el buen funcionamiento, imagen, credibilidad y/o prestigio de Energia Peñolite  o sus colaboradores.<br><br>

                    <h2>DERECHOS DE PROPIEDAD</h2>

Todos los contenidos del Sitio Web, tales como textos, gráficos, fotografías, logotipos, iconos, imágenes, así como el diseño gráfico, código fuente y software, son de la exclusiva propiedad de Energia Peñolite  o de terceros, cuyos derechos al respecto ostenta legítimamente Energia Peñolite, estando por lo tanto protegidos por la legislación nacional e internacional.<br><br>

Queda estrictamente prohibido la utilización de todos los elementos objeto de propiedad industrial e intelectual con fines comerciales así como su distribución, modificación, alteración o descompilación.<br><br>

La infracción de cualquiera de los citados derechos puede constituir una vulneración de las presentes disposiciones, así como un delito castigado de acuerdo con los artículos 270 y siguientes del Código Penal.<br><br>

Aquellos Clientes que envíen al Sitio Web observaciones, opiniones o comentarios por medio del servicio de correo electrónico o por cualquier otro medio, en los casos en los que por la naturaleza de los Servicios ello sea posible, se entiende que autorizan a Energia Peñolite  para la reproducción, distribución, comunicación pública, transformación, y el ejercicio de cualquier otro derecho de explotación, de tales observaciones, opiniones o comentarios, por todo el tiempo de protección de derecho de autor que esté previsto legalmente y sin limitación territorial. Asimismo, se entiende que esta autorización se hace a título gratuito.<br><br>

Las reclamaciones que pudieran interponerse por los Clientes en relación con posibles incumplimientos de los derechos de propiedad intelectual o industrial sobre cualesquiera de los Servicios de este Sitio Web deberán dirigirse a la siguiente dirección de correo electrónico: energiapeñolite.contacto@gmail.com Esta dirección de correo electrónico está protegida contra spambots.<br><br>

                    <h2>EXCLUSIÓN DE GARANTÍAS Y DE RESPONSABILIDAD</h2>

Con independencia de lo establecido en las Condiciones Generales de Contratación relativas a la contratación de bienes recogidas en el presente Sitio Web, Energia Peñolite  no se hace responsable de la veracidad, exactitud y calidad del presente Sitio Web, sus servicios, información y materiales. Dichos servicios, información y materiales son presentados “tal cual” y son accesibles sin garantías de ninguna clase.<br><br>

Energia Peñolite  se reserva el derecho a interrumpir el acceso al Sitio Web, así como la prestación de cualquiera o de todos los Servicios que se prestan a través del mismo en cualquier momento y sin previo aviso, ya sea por motivos técnicos, de seguridad, de control, de mantenimiento, por fallos de suministro eléctrico o por cualquier otra causa justificada.<br><br>

En consecuencia, Energia Peñolite  no garantiza la fiabilidad, la disponibilidad ni la continuidad de su Sitio Web ni de los Servicios, por lo que la utilización de los mismos por parte del Cliente se lleva a cabo por su propia cuenta y riesgo, sin que, en ningún momento, puedan exigirse responsabilidades a Energia Peñolite  en este sentido.<br><br>

Energia Peñolite  no será responsable en caso de que existan interrupciones de los Servicios, demoras, errores, mal funcionamiento del mismo y, en general, demás inconvenientes que tengan su origen en causas que escapan del control de Energia Peñolite, y/o debida a una actuación dolosa o culposa del Cliente y/o tenga por origen causas de caso fortuito o fuerza Mayor. Sin perjuicio de lo establecido en el artículo 1105 del Código Civil, se entenderán incluidos en el concepto de Fuerza Mayor, además, y a los efectos de las presentes Condiciones Generales, todos aquellos acontecimientos acaecidos fuera del control de Energia Peñolite, tales como: fallo de terceros, operadores o compañías de servicios, actos de Gobierno, falta de acceso a redes de terceros, actos u omisiones de las Autoridades Públicas, aquellos otros producidos como consecuencia de fenómenos naturales, apagones, etc y el ataque de hackers o terceros especializados en la seguridad o integridad del sistema informático, siempre que Energia Peñolite  haya adoptado las medidas de seguridad razonables de acuerdo con el estado de la técnica. En cualquier caso, sea cual fuere su causa, Energia Peñolite  no asumirá responsabilidad alguna ya sea por daños directos o indirectos, daño emergente y/o por lucro cesante.<br><br>

Energia Peñolite  excluye cualquier responsabilidad por los daños y perjuicios de toda naturaleza que puedan deberse a la falta de veracidad, exactitud, exhaustividad y/o actualidad de los Servicios transmitidos, difundidos, almacenados, puestos a disposición o recibidos, obtenidos o a los que se haya accedido a través del Sitio Web así como por los Servicios prestados u ofertados por terceras personas o entidades. Energia Peñolite  tratará en la medida de lo posible de actualizar y rectificar aquella información alojada en su Sitio Web que no cumpla con las mínimas garantías de veracidad. No obstante quedará exonerada de responsabilidad por su no actualización o rectificación así como por los contenidos e informaciones vertidos en la misma. En este sentido, Energia Peñolite  no tiene obligación de controlar y no controla los contenidos transmitidos, difundidos o puestos a disposición de terceros por los Clientes o colaboradores, salvo los supuestos en que así lo exija la legislación vigente o cuando sea requerido por una Autoridad Judicial o Administrativa competente.<br><br>

De igual modo, Energia Peñolite  excluye cualquier responsabilidad por los daños y perjuicios de toda clase que puedan deberse a la presencia de virus o a la presencia de otros elementos lesivos en los contenidos que puedan producir alteración en los sistemas informáticos así como en los documentos o sistemas almacenados en los mismos.<br><br>

Energia Peñolite  no se hace responsable por la utilización que el Cliente realice de los Servicios del Sitio Web ni de sus contraseñas, así como de cualquier otro material del mismo, infringiendo los derechos de propiedad intelectual o industrial o cualquier otro derecho de terceros.<br><br>

El Cliente se obliga a mantener indemne a Energia Peñolite, por cualquier daño, perjuicio, sanción, gasto (incluyendo, sin limitación, honorarios de abogados) o responsabilidad civil, administrativa o de cualquier otra índole, que pudiera sufrir Energia Peñolite  que guarde relación con el incumplimiento o cumplimiento parcial o defectuoso por su parte de lo establecido en las presentes Condiciones Generales o en la legislación aplicable, y, en especial, en relación con sus obligaciones relativas a protección de datos de carácter personal recogidas en las presentes condiciones o establecidas en la LOPD y normativa de desarrollo.
<br><br>
                    
                    <h2>ENLACES A OTROS SITIOS WEB</h2>

Energia Peñolite  no garantiza ni asume ningún tipo de responsabilidad por los daños y perjuicios sufridos por el acceso a Servicios de terceros a través de conexiones, vínculos o links de los sitios enlazados ni sobre la exactitud o fiabilidad de los mismos. La función de los enlaces que aparecen en Energia Peñolite  es exclusivamente la de informar al Cliente sobre la existencia de otras fuentes de información en Internet, donde podrá ampliar los Servicios ofrecidos por el Portal. Energia Peñolite  no será en ningún caso responsable del resultado obtenido a través de dichos enlaces o de las consecuencias que se deriven del acceso por los Clientes a los mismos. Estos Servicios de terceros son proporcionados por éstos, por lo que Energia Peñolite  no puede controlar y no controla la licitud de los Servicios ni su calidad. En consecuencia, el Cliente debe extremar la prudencia en la valoración y utilización de la información y servicios existentes en los contenidos de terceros.<br><br>

                    <h2>LEY APLICABLE Y JURISDICCIÓN</h2>

Para cuantas cuestiones interpretativas o litigiosas que pudieran plantearse será de aplicación la legislación española y en caso de controversia, ambas partes acuerdan someterse, con renuncia a cualquier otro fuero que pudiera corresponderle, a la jurisdicción de los Juzgados y Tribunales de la ciudad de Madrid.<br><br>
                </article>
            </div>

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