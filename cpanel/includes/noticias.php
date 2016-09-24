<script src="modulos/texto/ckeditor/ckeditor.js"></script>
<div class="col-md-12">
    <h3 class="bigOne">Listado de Noticias</h3>   
    <div>
        <form class="search_form pull-right">
                 <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> <input type=search id="search_input" name="search_input">

            </form>
    </div>
    <div class="col-md-12"><span class="botonNuevoItem" onclick="nuevaNoticia()">Nueva noticia <i class="fa fa-newspaper-o" aria-hidden="true"></i></span></div>
    <div class="col-md-12 rowsNoticias"></div>
</div>
<div class="col-md-12 contNuevaNoticia" id="contNuevaNoticia">
    <div class="col-md-12 col-md-push">
    <form class="form editorNoticias" id="formNuevaNoticia">
        <h2 class="bigOne">Nueva noticia<i class="fa fa-times pull-right times-cerrar" onclick="cerrarElemento('#contNuevaNoticia')" aria-hidden="true"></i></h2>
        <label>Nombre:&nbsp;</label><input type="text" id="nombreNuevaNoticia">
            <textarea name="editorNuevaNoticia" id="editorNuevaNoticia" rows="10" cols="80">
              <h1>--Título de la noticia--</h1>
                --Cuerpo de la noticia --
            </textarea>
        <span class="checkboxInput"><label>¿Publicar noticia?</label>&nbsp;<input type="checkbox" id="publicarNuevaNoticia"></span>
        <input type="submit" value="Guardar">
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorNuevaNoticia' );
            </script>
        </form>
    </div>
</div>
<div class="col-md-12 contEditarNoticia" id="contEditarNoticia">
    <div class="col-md-12">
    <form class="form editorNoticias" id="formEditarNoticia">
        <h2 class="bigOne">Editar noticia<i class="fa fa-times pull-right times-cerrar" onclick="cerrarElemento('.contEditarNoticia')" aria-hidden="true"></i></h2>
        <label>Nombre:&nbsp;</label><input type="text" id="editNombreNoticia">
            <textarea name="editorEditarNoticia" id="editorEditarNoticia" rows="10" cols="80">
              <h1>--Título de la noticia--</h1>
                --Cuerpo de la noticia --
            </textarea>
         <span class="checkboxInput"><label>¿Publicar noticia?</label>&nbsp;<input type="checkbox" id="publicarEditada"></span>
        <input type="submit" value="Guardar Cambios">
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorEditarNoticia' );
            </script>
        </form>
    </div>
</div>
<script>
    gestion_rellenarNoticias();
    $("#formNuevaNoticia").submit(function( event ){
       event.preventDefault();
        crearNoticia();
    });
    $("#formEditarNoticia").submit(function( event ){
       event.preventDefault();
        actualizarNoticia();
    });
</script>
