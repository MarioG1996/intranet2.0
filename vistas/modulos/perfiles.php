<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
          
          Crear nuevo Perfil

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Perfil</th>
            <th>Estado</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

         $Perfil = ControladorPerfil::ctrMostrarPerfil($item, $valor);

         
        foreach ($Perfil as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["NombrePerfil"].'</td>';
                  
                    if($value["estadoPerfil"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" IdPerfil="'.$value["IdPerfil"].'" estadoPerfil="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" IdPerfil="'.$value["IdPerfil"].'" estadoPerfil="1">Desactivado</button></td>';

                  }          



                  echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarPerfil" IdPerfil="'.$value["IdPerfil"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarPerfil" IdPerfil="'.$value["IdPerfil"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

               </tr>';
               
        }

        ?> 
      

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<div id="modalAgregarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Crear Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre del Perfil" required>

              </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Perfil</button>

        </div>

        <?php


         $creaPerfil = new ControladorPerfil();
         $creaPerfil -> ctrCreaPerfil();

          
        ?>

      </form>

    </div>

  </div>

</div>




<?php


  $borrarPerfil = new ControladorPerfil();
  $borrarPerfil -> ctrBorrarperfil();
?> 


