<script src="modulos/texto/ckeditor/ckeditor.js"></script>
<div class="col-md-12 rowsNoticias">
    <h3 class="bigOne">Listado de Noticias</h3>   
    <div>
        <form class="search_form pull-right">
                 <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> <input type=search id="search_input" name="search_input">

            </form>
    </div>
</div>
<div class="col-md-12 contNuevaNoticia">
    <div class="col-md-9 col-md-push-1">
    <form class="form editorNoticias">
        <h2 class="bigOne">Nueva noticia</h2>
        <label>Nombre:&nbsp;</label><input type="text">
            <textarea name="editor1" id="editor1" rows="10" cols="80">
              <h1>--Título de la noticia--</h1>
                --Cuerpo de la noticia --
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </div>
</div>
<script>
gestion_rellenarNoticias();
</script>
