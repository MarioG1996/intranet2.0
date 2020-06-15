


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Agendamiento
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Agendamiento</li>
    
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

          <form role="form" method="post" class="formularioAgendamiento">

            <div class="box-body">
  
              <div class="box">

           <div class="form-group">
                   <label>Correlativo</label>
                  <div class="input-group">
                   
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

                    $item = null;
                    $valor = null;

                    $agendamiento = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$agendamiento){

                      echo '<input type="text" class="form-control" id="nuevoAgendamiento" name="nuevoAgendamiento" value="10001" readonly>';
                  

                    }else{

                      foreach ($agendamiento as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control" id="nuevoAgendamiento" name="nuevoAgendamiento" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div>



                <div class="form-group">
                   <label>N° Camion</label>
                  <div class="input-group">
                   
                    <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                    <input type="number" class="form-control" id="nuevoCamion" name="nuevoCamion" value="10001" >


                   </div>
                
                </div>
                



                <div class="form-group">
                   <label>N° de anden</label>
                  <div class="input-group">
                   
                    <span class="input-group-addon"><i class="fa fa-terminal"></i></span>
                    <input type="number" class="form-control" id="nuevoAnden" name="nuevoAnden" value="10001" >


                   </div>
                
                </div>   


             <div class="form-group">
                    <label>Fecha</label>

                    <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" id="nuevoFecha" name="nuevoFecha" data-mask>
                     </div>

              </div>
                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
            


                 <div class="form-group">
                  
                   <label>Coordinador/Superivor</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="nuevoCoordinador" name="nuevoCoordinador" required>

                    <option value="">Seleccionar Coordinador/Superivor</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $coordinador = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                       foreach ($coordinador as $key => $value) {



                          if($value["Cargo"] == "Coordinador/Supervisor"){
                        


                         echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';



                         }

                       }

                    ?>

                    </select>
                    
                
                  
                  </div>
                
                </div>


                
                <div class="form-group">

                   <label>Maquinista/Pickeator</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="nuevoMaquinista" name="nuevoMaquinista" required>

                    <option value="">Seleccionar Maquinista/Pickeator</option>

                 <?php

                      $item = null;
                      $valor = null;

                      $coordinador = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                       foreach ($coordinador as $key => $value) {



                          if($value["Cargo"] == "Maquinista/Pickeador"){
                        


                         echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';



                         }

                       }

                    ?>

                    </select>
                    
                   
                  
                  </div>
                
                </div>





                <div class="form-group">

                   <label>Agregar Paletizador</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="id" id="nuevoPaletizador" name="nuevoPaletizador"  required>

                    <option value="">Seleccionar Paletizador</option>

                     <?php

                      $item = null;
                      $valor = null;

                      $coordinador = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                       foreach ($coordinador as $key => $value) {



                          if($value["Cargo"] == "Paletizador"){
                        


                         echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';



                         }

                       }

                    ?>

                    </select>
                    
                   
                      
                    <span class="input-group-btn">

                

                      <button type="button" class="btn btn-info btn-flat btnAgregarPaletizador" >Agregar Paletizador</button>
                      
                   
                    </span>
            
                  
                  </div>
                
                </div>



                <table class="table table-bordered table-striped dt-responsive " width="100%" >
            <thead>
                <tr>


                    <th>Nombre</th>
                    <th>Acciones</th>
                   
                    
                </tr>
            </thead>
            <tbody id="tablita">



            </tbody >
            
                </table>

                
                      
                 <div class="form-group row nuevoProducto">

                


                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">


                
          

                <hr>

               
              

               
               
        
              </div>

          </div>

         

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-6 col-xs-12  ">
        
        <div class="box box-info">

          <div class="box-header with-border"></div>

          <div class="box-body">
            

           <div class="form-group">
                   
                 

             <div class="form-group">
                    <label>Fecha Agendamiento y Despacho</label>

                    <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="nuevoFechaAgendamiento" name="nuevoFechaAgendamiento"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                     </div>

              </div>
                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
            <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Agendamiento:</label>

                  <div class="input-group">
                    <input type="time" id="nuevoHoraAgendamiento" name="nuevoHoraAgendamiento"   class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>


                

          <div class="form-group">        
                <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat"    >Agregar OP</button>
                    </span>
              </div>


          </div>


             <table class="table table-bordered table-striped dt-responsive ">
              
               <thead>

                 <tr>
                  <th style="width: 10px">OP</th>
                  <th>N° </th>
                  
                </tr>

              </thead>

            </table>


           <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Inicio Paletizado:</label>

                  <div class="input-group">
                    <input type="time" id="nuevoHoraInicioPaletizado" name="nuevoHoraInicioPaletizado"  class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                 
                </div>
                
              </div>



               <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Termino Paletizado:</label>

                  <div class="input-group">
                    <input type="time"  id="nuevoHoraTerminoPaletizado" name="nuevoHoraTerminoPaletizado"  class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>



           

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar</button>

          </div>

        </form>

        <?php

          //$guardarAgenda= new ControladorAgendamiento();
          //$guardarAgenda -> ctrCrearAgendamiento();
          
        ?>

        </div>


      </div>

        

    </div>


  
  </section>

</div>




