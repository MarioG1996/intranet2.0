<?php

$requestData= $_REQUEST;

$columns2 = array( 
  0 => 'RutCliente',
  1 => 'NrOP',
    2 => 'CodProducto',
    3 => 'Cantidad',
    4 => 'UnidadMedida',
    5 => 'FechaCreacion'
  );

$sql2 =" select a.RutCliente, a.NrOP, a.CodProducto, case when a.UnidadMedida = 'CAJA' then (a.Cantidad)/(c.UMPEquivalencia) else a.Cantidad END as Cantidad, a.UnidadMedida, b.FechaCreacion from MLPedidoDetalle a inner join MLPedidoEncabezado b on b.NrOP = a.NrOP inner join equivalencia c on a.CodProducto = c.ProdCodigo ";
$sql2 .=" where a.NrOP = '".$_GET["my_modal"]."'";
$sql2 .=" ORDER BY a.CodProducto ";

$result=mysqli_query($conn, $sql2);


$data[] = $result; 

?>



<table id="tabla" class="table table-bordered table-striped " >
         <tr>
        <th>Rut Clienteeeee</th>
        <th>Codigo Producto</th>
        <th>Cantidad</th>
        <th>Unidad de Medida</th>
        <th>Fecha Creacion</th>
      </tr> 
          <?php
              $item = null;
              $valor = null;

              $aplicaciones = ControladorStatus::ctrMostrarOpStatus($item, $valor);

              foreach ($aplicaciones as $key => $value){

                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["RutCliente"].'</td>
                <td>'.$value["NrOP"].'</td>
                <td>'.$value["CodProducto"].'</td>
                <td>'.$value["Cantidad"].'</td>
                <td>'.$value["UnidadMedida"].'</td>
                <td>'.$value["FechaCreacion"].'</td>';

                '</tr>';

              }       

                ?>




      </table>



