
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Aplicaciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Aplicaciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">


      <div class="box-header with-border">
  
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarRelacion">
          
         Agregar Relacion Perfil-Aplicacion

        </button>

      </div>


      
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre Aplicacion</th>
           <th>Nombre Funcion</th>
           <th>Estado</th>
           <th>Acciones</th>
         

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $aplicaciones = ControladorPerfil::ctrMostrarAplicacionFuncion($item, $valor);

       foreach ($aplicaciones as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["perfil"].'</td>
                  <td>'.$value["nombre"].'</td>';


                  if($value["estadoAplicPerfil"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivarAplicacion" IdAplicacion="'.$value["id"].'" estadoAplicacion="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivarAplicacion" IdAplicacion="'.$value["id"].'" estadoAplicacion="1">Desactivado</button></td>';

                  }    

                echo  '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-danger btnEliminarAplicacionPerfil" IdAplicacion="'.$value["id"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>';


             '</tr>';

        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



<div id="modalAgregarRelacion" class="modal fade" role="dialog">
  
    
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="asigPerfil" name="asigPerfil" required>
                  
                  <option value="">Selecionar Perfil</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $perfiles = ControladorPerfil::ctrmostrarPerfil($item, $valor);

                  foreach ($perfiles as $key => $value) {

                      if ($value["estadoPerfil"] == 1 ){
                    
                    echo '<option value="'.$value["IdPerfil"].'">'.$value["NombrePerfil"].'</option>';

                   }
                  }

                  ?>
  
                </select>

              </div>

            </div>


            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="asigAplicaciones" name="asigAplicaciones" required>
                  
                  <option value="">Selecionar Aplicacion</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $perfiles = ControladorPerfil::ctrMostrarAplicaciones($item, $valor);

                  foreach ($perfiles as $key => $value) {

                     
                    
                    echo '<option value="'.$value["IdAplicacion"].'">'.$value["NombreAplicacion"].'</option>';

                  
                  }

                  ?>
  
                </select>

              </div>

            </div>





        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

        <?php
 

                  $item = null;
                  $valor = null;

                  $perfiles = ControladorPerfil::ctrMostrarAplicaciones($item, $valor);

                  foreach ($perfiles as $key => $value) {

                     
                    
                    echo '<option value="'.$value["IdAplicacion"].'">'.$value["NombreAplicacion"].'</option>';

                  
                  }

                



          


          $crearRelacion = new ControladorPerfil();
          $crearRelacion -> ctrCreaRelacionPA();


       ?>
       

      </form>

    </div>

  </div>

</div>









<?php


  $borrarAplicacionPerfil = new ControladorPerfil();
  $borrarAplicacionPerfil -> ctrBorrarAplicacionPerfil();
?> 


