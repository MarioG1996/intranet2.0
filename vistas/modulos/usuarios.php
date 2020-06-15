
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
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Apellido Paterno</th>
           <th>Email</th>
           <th>Password</th>
           <th>Usuario</th>  
           <th>Foto</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>
           <th>Perfil</th>
           

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["rut"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["apellidoPat"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["password"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                 
                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivarUsuario" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivarUsuario" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'fotoUsuario="'.$value["foto"].'" Idrut="'.$value["rut"].'""><i class="fa fa-times"></i></button>

                    </div>  

                  </td>';


            

                 $item1 = null;
                   $valor1 = null;


                  $Perfil = ControladorPerfil::ctrMostrarDescripcionPerfil($item1, $valor1);

                  echo '<td>';
                
                  foreach ($Perfil as $key => $value2){

                    if($value["rut"] == $value2["IdRut"]){

                    
                    echo "<b>".$value2["NombrePerfil"]."</b> <br>";

                  }
                  }
                    '</td>';
                  '</tr>';
        }
        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
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

          <div class="box-body">


           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoRut" placeholder="Ingrese Rut" required>

              </div>

            </div>

            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-male"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoapellidoPat" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-female"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoapellidoMat" placeholder="Ingresar Apellido Materno" required>

              </div>

            </div>


             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="correo@prosud.cl" required>

              </div>

            </div>

       

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoPerfil" name="nuevoPerfil" required>
                  
                  <option value="">Selecionar Perfil</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $perfiles = ControladorPerfil::ctrMostrarPerfil($item, $valor);

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
              
                <span class="input-group-addon"><i class="fa fa-cogs"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevocodEmpleado" placeholder="Ingrese Codigo de Empleado" required>

              </div>

            </div>



             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevodepartamento">
                  
                  <option value="">Selecionar Departamento</option>

                  <option value="COMERCIAL">COMERCIAL</option>
                  <option value="ADMINISTRACION Y FINANZAS">ADMINISTRACION Y FINANZAS</option>
                  <option value="MARKETING">MARKETING</option>
                  <option value="RRHH">RRHH</option>
                  <option value="SUPPLY CHAIN">SUPPLY CHAIN</option>
                  <option value="GERENCIA GENERAL">GERENCIA GENERAL</option>


                </select>

              </div>

            </div>


             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevodiasDespacho" placeholder="Ingrese dias Despacho" value="0">

              </div>

            </div>



            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuarios = new ControladorUsuarios();
          $crearUsuarios -> ctrCrearUsuario();

          $AsignaPerfil = new ControladorPerfil();
          $AsignaPerfil -> ctrAsignaPerfil();
        ?>

      </form>

    </div>

  </div>

</div>



<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
            <div class="form-group">
              
               <label>Nombre :</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
               <label>Usuario :</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <div class="form-group">
              
               <label>Rut :</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarRut" name="editarRut" value="" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
               <label>Password :</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil" required>
                  
                  <option value="">Selecionar Perfil</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $perfiles = ControladorPerfil::ctrMostrarPerfil($item, $valor);

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
              
              <label>Departamento :</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarDepartamento">
                  
                  <option value="" id="editarDepartamento"></option>
                  <option value="COMERCIAL">COMERCIAL</option>
                  <option value="ADMINISTRACION Y FINANZAS">ADMINISTRACION Y FINANZAS</option>
                  <option value="MARKETING">MARKETING</option>
                  <option value="RRHH">RRHH</option>
                  <option value="SUPPLY CHAIN">SUPPLY CHAIN</option>
                  <option value="GERENCIA GENERAL">GERENCIA GENERAL</option>

                </select>

              </div>

            </div>
            
            <div class="form-group">

               <label>Dias de Despacho :</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" id="editardiasDespacho" name="editardiasDespacho"  required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

          $EditarPerfiles = new ControladorPerfil();
          $EditarPerfiles -> ctrEditarPerfilUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>




<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();


  $borrarperfilUsuario = new ControladorPerfil();
  $borrarperfilUsuario -> ctrBorrarperfilUsuario();









?> 


