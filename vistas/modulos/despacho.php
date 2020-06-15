

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Despacho
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Despacho</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-6 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">




            <div class="form-group">        
                <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Buscar Correlativo</button>
                    </span>
              </div>


          </div>


             <div class="form-group">

                   <label>Despachador</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar Despachador</option>

                 <?php

                      $item = null;
                      $valor = null;

                      $coordinador = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                       foreach ($coordinador as $key => $value) {



                          if($value["Cargo"] == "Despachador"){
                        


                         echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';



                         }

                       }

                    ?>

                    </select>
                    
                   
                  
                  </div>
                
                </div>

              <div class="form-group">
                    <label>Fecha</label>

                    <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                     </div>

              </div>    

         

            <div class="form-group">

                   <label>Agregar Traspaleta</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="id" name="seleccionarPaletizador" required>

                    <option value="">Seleccionar Traspaleta</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $coordinador = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                       foreach ($coordinador as $key => $value) {



                          if($value["Cargo"] == "Traspaleta"){
                        


                         echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';



                         }

                       }

                    ?>

                    </select>
                    
                   
                      
                    <span class="input-group-btn">

                

                      <button type="button" class="btn btn-info btn-flat" onclick="guardar()" id="btn_guardar" >Agregar</button>
                      
                   
                    </span>
            
                  
                  </div>
                
                </div>


              
        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                  <label>Hora Inicio de Carga :</label>

                  <div class="input-group">
                    <input type="time" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>



                  <div class="col-lg-6">
                <div class="form-group">
                  <label>Hora Termino de Carga :</label>

                  <div class="input-group">
                    <input type="time" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

            
             </div>


               

                
                      
                 <div class="form-group row nuevoProducto">

                


                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">


                
               

                <hr>


                   <div class="form-group">

        <div class="row">
                <div class="col-xs-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          Pallet Blanco
                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-xs-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          
                          Pallet Azul:

                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>
              

                 <div class="col-xs-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          
                          Pallet Azul:

                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>
                  


              </div>
           

          </div>


               
                <hr>
 <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          N° Folio
                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-xs-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          
                          Pallet Recepcionados:

                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>

              </div>
           

          </div>


             <hr>

              <div class="form-group">
                  <label>Observación :</label>
                  <textarea class="form-control" rows="3" ></textarea>
                </div>
               
               
                <br>
      
              </div>

          </div>

         

        </div>
            
      </div>

      <!--=====================================
      
      ======================================-->

      <div class="col-lg-6 col-xs-12">
        
        <div class="box box-info">

          <div class="box-header with-border"></div>

          <div class="box-body">
            

           <div class="form-group">
                
                 
            <div class="form-group">        
                <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Factura</button>
                    </span>
              </div>


          </div>



               
            
            <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Postura:</label>

                  <div class="input-group">
                    <input type="time" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>





          <div class="form-group">

                   <label>Trasporte</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="id" name="seleccionarPaletizador" required>

                    <option value="">Seleccionar Transporte</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = Controladorusuarios::ctrMostrarusuarios($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["nombre"].' '.$value["apellidoPat"].'">'.$value["nombre"].' '.$value["apellidoPat"].'</option>';

                       }

                    ?>

                    </select>
                    
                   
                      
                    <span class="input-group-btn">

                

                      <button type="button" class="btn btn-info btn-flat" onclick="guardar()" id="btn_guardar" >Agregar Transporte</button>
                      
                   
                    </span>
            
                  
                  </div>
                
                </div>




                 <div class="form-group">

                   <label>Chofer</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar Chofer</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                   
                  
                  </div>
                
                </div>


            <div class="form-group">
                <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          Patente Rampla
                        </span>
                    <input type="text" class="form-control" placeholder="DX3423/ADED75">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          Patente Tracto Camión
                        </span>
                    <input type="text" class="form-control" placeholder="DX3423/ADED75">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>

                
          </div>
      


           
                <hr>


            <div class="form-group">

        <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          Cantidad de Sellos
                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                
                </div>
               
                <div class="col-lg-6">
                  
                  <div class="input-group">
                      
                      Chofer Presente

                <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                      Si
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      No
                    </label>
                  </div>
                 
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>


                </div>




              <div class="form-group">

                   <label>Rechazo Pallet</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Motivo de Rechazo</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                   
                  
                  </div>
                
                </div>

           <div class="form-group">

        <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          Pallet devueltos
                        </span>
                    <input type="number" class="form-control" value="0">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox">
                        </span>
                    <input type="text" class="form-control" value="Picking" readonly >
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>
           

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar</button>

          </div>

        </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>


      </div>

        

    </div>
  
  </section>

</div>




