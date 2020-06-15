<?php
  include_once "../database/database_1.php";
  include_once "convertMoneda.php";

  $id_orden = $_POST['id_orden']; 

    $query = "select ID, CodigoProducto, concat('[',CodigoProducto,'] ', DescripcionProducto) as DescripcionProducto, Cantidad, Subtotal, Total  from vw_ordenes_detalle where ID = ".$id_orden." ";

    $results = mysqli_query($conn, $query);

    $html= '';
    
    $contador = 0;
    while($row = mysqli_fetch_row($results))
    {

    $precio = 0;
    $impto_adicional = 0;
    $iva = 0;
    $produ_impto_adic = 0;
    $subtotal = $row[4];
    $subtotal_1 = $row[4];
    $total =  $row[5];
    $total_total = $row[5];;
    $total_neto = 0;
    $total_iva = 0;
    $total_impto = 0;

   $contador  = $contador +1;
   $html.= "<tr id='row".$contador."'>";
   $html.= "<td id='data1' readonly='readonly' class='producto_pri'>".$row[2]."</td>";
   $html.= "<td id='data2' readonly='readonly' class='um_pri'>CAJA</td>";
   $html.= "<td id='data3' contenteditable class='cantidad_pri'>".$row[3]."</td>";
   $html.= "<td id='data4' readonly='readonly' class='precio_pri'>".$precio."</td>";
   $html.= "<td id='data6' readonly='readonly' class='impto_pri'>".$produ_impto_adic."</td>";
   $html.= "<td id='data7' contenteditable class='subtotal_pri'>".$subtotal_1."</td>";
   $html.= "<td id='data8' readonly='readonly' class='descuento_pri'>0</td>";
   $html.= "<td id='data9' contenteditable class='total_pri'>".$total."<td>";
   $html.= '</tr>';


    }


echo utf8_encode($html);



?>

