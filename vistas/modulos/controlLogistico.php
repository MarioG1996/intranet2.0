



<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Control Logistico
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Control Logistico</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-xs-12 col-md-9">
        
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

              <h3 class="box-title">Condiciones de Pallet</h3>

              <br>
            

               <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" class="minimal">
                        </span>

                        <input type="text" class="form-control" value="Pallet Manchados" readonly>
                    
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon" >
                           <input type="checkbox" class="minimal"> 

                        </span>


                        <input type="text" class="form-control" value="Pallet Rotos" readonly>
                  
                  </div>
                  <!-- /input-group -->
                </div>



                 <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                           <input type="checkbox" class="minimal">

                        </span>
                     

                      <input type="text" class="form-control" value="Pallet no amarrados correctamente." readonly>
                    

                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>

          </div>


            <hr>



          <div class="form-group">
      
              <h3 class="box-title">Condiciones de Pallet</h3>


              <br>
            
            

               <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" class="minimal">
                        </span>


                        <input type="text" class="form-control" value="Embalaje Manchado." readonly>
                  
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon" >
                           <input type="checkbox" class="minimal"> 

                        </span>

                        <input type="text" class="form-control" value="Embalaje roto." readonly>
                  
                  </div>
                  <!-- /input-group -->
                </div>



                 <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                           <input type="checkbox" class="minimal">

                        </span>


                         <input type="text" class="form-control" value="Embalaje Abierto." readonly>
                     
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>

          </div>



           <hr>



          <div class="form-group">
      
              <h3 class="box-title">Condiciones de Transporte</h3>

              <br>
            
            

               <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" class="minimal">
                        </span>
                    <input type="text" class="form-control" value="Presencia olores extraños" readonly>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon" >
                           <input type="checkbox" class="minimal"> 

                        </span>
                    <input type="text" class="form-control" value="Estructura sucia" readonly>
                  </div>
                  <!-- /input-group -->
                </div>



                 <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                           <input type="checkbox" class="minimal">

                        </span>
                     <input type="text" class="form-control" value="Presencia objetos extraños" readonly>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>

          </div>



          <div class="form-group">

               <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" class="minimal">
                        </span>
                    <input type="text" class="form-control" value="Estructura no aceptable" readonly>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon" >
                           <input type="checkbox" class="minimal"> 

                        </span>
                     <input type="text" class="form-control" value="Presencia de plagas" readonly>
                  </div>
                  <!-- /input-group -->
                </div>



                 <div class="col-md-4">
                  <div class="input-group">
                        <span class="input-group-addon">
                           <input type="checkbox" class="minimal">

                        </span>
                      <input type="text" class="form-control" value="Transporte no aprobado" readonly>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>



             <br>
           <div class="form-group">
                  <label>Obs. Transporte:</label>
                  <textarea class="form-control" rows="3" ></textarea>
            </div>
               

          
            
          
                
                      
                 <div class="form-group row nuevoProducto">

                


                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">


                     <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Grabar</button>

          </div>

        </form>
               

                <hr>

              
               
               
             
      
              </div>

          </div>

         

        </div>
            
      </div>

  
     
        

    </div>
  
  </section>

</div>




