
<div class="content-wrapper">

<section class="content-header">
  
  <h1>    
    Status OP  
  </h1>

  <ol class="breadcrumb">    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>    
    <li class="active">Status OP</li>  
  </ol>

</section>

<section class="content">
  <div class="box">

    <div class="box-body">      
     <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
       
      <thead>       
                    <tr >
                      <th style="width:10px">#</th>
                        <th >Numero Pedido</th>
                        <th >Estado</th>
                        <th >Info</th>
                        <th >Fecha</th>
                        <th >Estado Documento</th>
                        <th >Tipo Documento</th>    
                        <th >Hora</th>  
                        <th >Detalle      
                      </th>                            
                    </tr>    
      </thead>

      <tbody>

      <?php

$item = null;
$valor = null;
$aplicaciones = ControladorStatus::ctrMostrarOpStatus($item, $valor);
foreach ($aplicaciones as $key => $value){

  echo ' <tr>
          <td>'.($key+1).'</td>
          <td>'.$value["MLPnroPedido"].'</td>
          <td class='.$value["MLPEstado"].'>'.$value["MLPEstado"].'</td>
          <td>'.$value["LogInfo"].'</td>
          <td>'.$value["LogFecha"].'</td>
          <td>'.$value["LogEstadoDoc"].'</td>
          <td>'.$value["LogTipoDoc"].'</td>
          <td>'.$value["LogHora"].'</td>';                                                     

                echo '
                <td>
                  <div class="btn-group">

                    <button type="button" class="btn btn-info btn-view-contrato" data-toggle="modal" data-target="#modal_contrato';                  
                    echo $value["MLPnroPedido"];                  
                    echo '"><i class="fa fa-align-justify"></i></button>

                  </div>  
                </td>
                </tr>';

      }

      ?> 
      </tbody>
     </table>
     
     
          <?php 
                      $item = null;
                      $valor = null;
                      $aplicaciones = ControladorStatus::ctrMostrarOpStatus($item, $valor);
                      foreach ($aplicaciones as $key => $value){
          ?>
                        
    <div class="modal fade" id="modal_contrato<?php echo $value["MLPnroPedido"]; ?>" role="dialog" >
      <div class="modal-dialog">                
        <div class="modal-content">

                        <div class="modal-header">     
                        <button class="close" data-dismiss="modal">×</button>                   
                          <h3 class="modal-title">Detalle</h3>                          
                        </div>

  <div class="modal-body">
    <form id="form1" runat="server" >
        <div class="Table">      

        <div class="Heading">
            <div class="Cell">
                <p>Rut Cliente</p>
            </div>

            <div class="Cell">
                <p>Codigo Producto</p>
            </div>

            <div class="Cell">
                <p>Cantidad</p>
            </div>

            <div class="Cell">
                <p>Unidad de Medida</p>
            </div>

            <div class="Cell">
                <p>Fecha Creacion</p>
            </div>

        </div>

        <?php                
        $valor = null;                       
                       $aplicaciones = ControladorStatus::ctrMostrarDetalleOP($value["MLPnroPedido"], $valor);         
                       foreach ($aplicaciones as $key => $value){
        ?>

            <div class="Row">

            <div class="Cell">
                <p><?php echo $value["RutCliente"]?></p>
            </div>

            <div class="Cell">
                <p><?php echo $value["CodProducto"]?></p>
            </div>

            <div class="Cell">
                <p><?php echo $value["Cantidad"]?></p>
            </div>

            <div class="Cell">
                <p><?php echo $value["UnidadMedida"]?></p>
            </div>

            <div class="Cell">
                <p><?php echo $value["FechaCreacion"]?></p>
            </div>

            </div>
                      <?php 
                       }
                      ?>
        </div>
    </form>
  </div>
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>

      </div>                  
    </div>
 
</div>
  <?php
            }  
?>
  
<style type="text/css">
    .RECIBIDO  {
        background: #BBF1AE ; /* green for solved status */
        text-align:center;
    }

    .ENVIADO  {
        text-align:center;
    }

    .Table
    {
    display: table;
    width:100%;
    border:0;
    }

.Title
{
    display: table-caption;
    text-align: center;
    font-weight: bold;
    font-size: larger;
}

.Heading
{
    display: table-row;
    font-weight: bold;
    text-align: center;
    background: #E8E8E8;
}

.Row
{
    display: table-row;
    text-align: center;
    
}

.Cell
{
    display: table-cell;
    border-width: thin;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid #E8E8E8;
}
.modal-content  {
    -webkit-border-radius: 10px !important;
    -moz-border-radius:10px !important;
    border-radius: 10px !important; 
}

</style>    

    </div>
  </div>
  </section>
</div>


