<!DOCTYPE html>
<html>
<head>
  <title>Practica 1</title>
  <!--diseño, trabajo de boostrap y jquery-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="Librerias/Data Tables/jquery.dataTables.min.js"></script>
  <script src="Librerias/Data Tables/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Librerias/Data Tables/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Librerias/Data Tables/dataTables.bootstrap4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="Librerias/fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="Librerias/alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="Librerias/alertify/css/themes/bootstrap.css">
  <script src="Librerias/alertify/alertify.js"></script>
</head>
<body background="pac-man.jpg">  
</style>
      <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 align="center"> 
        <img width="300" height="200" src="ps1.png" style="position:absolute;top:0px;left: 0px"> 
        <br><p style="color:#FFFFFF;"> El MUNDO DE LOS VIDEOJUEGOS</p>
        <img width="260" heigth="200" src="konami.jpg" style="position:absolute;top:0px;right:0px;">
        <br>      
        </h1>
        <br>
        <br>
        <br>
        <div id="tablaCrudLoad"></div>        
      </div>
    </div>
    
  </div>  
  <!-- Propiedades de dialogo (MODAL) agregar-->

  <div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Agregar nuevo videojuego </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <FORM id="videojuego">

          <label> Nombre </label>
          <input type="text" name="nom" id="nom" class="form-control">
          <label>Tipo </label>
          <input type="text" name="tip" id="tip" class="form-control">
          <label>fecha_lanzamiento</label>
          <input type="text" name="fecha" id="fecha" class="form-control">
          <label>Descripción</label>
          <input type="text" name="descri" id="descri" class="form-control">
        </FORM>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
           <span class="fas fa-times-circle"></span> 
         </button >

          <button id="btnnuevo" type="button" class="btn btn-primary">Guardar
            <span class="fas fa-arrow-alt-circle-up"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Propiedades de dialogo (MODAL) editar-->

  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> editar  videojuego </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <FORM id="frmnuevoU"> 
            <input type="text" hidden="" id="idjuego" name="idjuego">
          <label> Nombre </label>
          <input type="text" name="nombre1" id="nombre1" class="form-control">
          <label>Tipo </label>
          <input type="text" name="tipo1" id="tipo1" class="form-control">
          <label>fecha_lanzamiento</label>
          <input type="text" name="fecha2" id="fecha2" class="form-control">
          <label>Descripción</label>
          <input type="text" name="descri1" id="descri1" class="form-control">
        </FORM>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
           <span class="fas fa-times-circle"></span> 
         </button >

          <button id="btnActualizar" type="button" class="btn btn-primary">actualizar
            <span class="fas fa-arrow-alt-circle-up"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</body>
    <script type="text/Javascript">
  $(document).ready(function(){
    $('#btnnuevo').click(function(){
      datos=$('#videojuego').serialize();

      $.ajax({
        type:"POST",
        data:datos,
        url:"procesos/agregar.php",
        success:function(r){
          if(r==1){
            $('#videojuego')[0].reset();
            $('#tablaCrudLoad').load('vistas/tablaCrud.php');
            alertify.success("Agregado con exito ");
          }
          else{
            alertify.error("Fallo al agregar");
          }
        }
      });
    });

    $('#btnActualizar').click(function(){
      datos=$('#frmnuevoU').serialize();

      $.ajax({
        type:"POST",
        data:datos,
        url:"procesos/actualizar.php",
        success:function(r){
          if(r==1){
            $('#tablaCrudLoad').load('vistas/tablaCrud.php');
            alertify.success("Actualizado con exito ");
          }
          else{
            alertify.error("Fallo al actualizar");
          }
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    //funcion load de jquery
    //primero agregamos el id de la sección donde se cargara el archivo
    $('#tablaCrudLoad').load('Vistas/tablacrud.php')
  });
</script>

<script type="text/javascript">
  function agregaFrmActualizar(idjuego){
    $.ajax({
      type:"POST",
      data:"idjuego=" + idjuego,
      url:"procesos/obtenDatos.php",
      success:function(r){
        datos=jQuery.parseJSON(r);
        $('#idjuego').val(datos['id_videojuego']);
        $('#nombre1').val(datos['nombre']);
        $('#tipo1').val(datos['tipo']);
        $('#fecha2').val(datos['fecha_lanzamiento']);
        $('#descri1').val(datos['descripcion']);
      }
    });
  }

  function eliminarDatos(idjuego){
    alertify.confirm('Eliminar un juego', '¿Seguro de eliminar este juego?', function(){ 

      $.ajax({
        type:"POST",
        data:"idjuego=" + idjuego,
        url:"procesos/eliminar.php",
        success:function(r){
          if(r==1){
            $('#tablaCrudLoad').load('vistas/tablaCrud.php');
            alertify.success("Eliminado con exito !");
          }
          else{
            alertify.error("No se pudo eliminar...");
          }
        }
      });
    }
    , function(){

    });
  }
</script>
</html>
