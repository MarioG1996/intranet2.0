
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">N° Nota Venta</th>
           <th>Estado</th>
           <th>Fecha</th>
           <th>Rut Cliente</th>
           <th>Nombre Cliente</th>
           <th>Total Neto</th>
           <th>Total Impto</th> 
           <th>Total</th>
           <th>Estado ERP</th>
           <th>Correlativo ERP</th>
           <th>Solicitante</th>
           <th>Fecha Ingreso ERP</th>
           <th>Acciones</th>


         </tr> 

        </thead>

        <tbody>

        <?php

         /*if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal); */




        $item = null;
        $valor = null;

        $ordenes = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);

          foreach ($ordenes as $key => $value) {
           
             echo ' <tr>
              
                  <td>'.$value["id"].'</td>
                  <td>'.$value["estado"].'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>'.$value["rut_cliente"].'</td>
                  <td>'.$value["nombre_cliente"].'</td>
                  <td>'.$value["total_neto"].'</td>
                  <td>'.$value["total_impto"].'
                   <td>'.$value["total"].'</td>
                     <td>'.$value["estado_erp"].'</td>
                       <td>'.$value["correlativo_erp"].'</td>
                      <td>'.$value["solicitante"].'</td>
                       <td>'.$value["fecha_erp"].'</td>';
                   

              
                 
           

                  echo '
                  <td>

                    <div class="btn-group">


                     <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["id"].'">

                        <i class="fa fa-print"></i>

                      </button>';


                        
                     echo ' <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'""><i class="fa fa-times"></i></button>

                    </div>  

                  </td>';





                  '</tr>';






        }



        ?> 

        </tbody>


       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>

