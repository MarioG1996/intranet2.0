<?php
  include_once "../database/database_1.php";
    include_once "convertMoneda.php";

    $linea= $_POST['linea_arr'];
    $producto = $_POST['producto_arr'];
    $cantidad = $_POST['cantidad_arr'];
    $tipo = $_POST['tipo_arr'];
    $dscto = $_POST['dscto_arr'];
    $cliente = $_POST['cliente_select'];

    $iva = 0;
    $impto_adicional = 0;
    $precio = '0';
    $um = 'CAJA';
    $subtotal = 0; 
    $total= 0; 
    $total_impto = 0;
    $total_neto = 0;
    $total_iva = 0;
    $total_total = 0;
    $produ_impto_adic = 0;
    $contador = 0;
    $subtotal_1= 0;

    $html= '';

    for($count = 0; $count<count($cantidad); $count++)
    {
     $linea_clean = mysqli_real_escape_string($conn, $linea[$count]);
     $producto_clean = mysqli_real_escape_string($conn, $producto[$count]);
     $cantidad_clean = mysqli_real_escape_string($conn, $cantidad[$count]);
     $tipo_clean = mysqli_real_escape_string($conn, $tipo[$count]);
     $dscto_clean = mysqli_real_escape_string($conn, $dscto[$count]);


    $query = "select a.NetoCaja as Precio, ImptoAdic from vw_productos_precios as a inner join clientes2 as b on a.ListCodigo = b.lista where concat('[',a.ProdCodigo,'] ',a.ProdNombre) = '$producto_clean' and b.descripcion = '$cliente' ";

    $results = mysqli_query($conn, $query);

    $row=mysqli_fetch_row($results);
    $precio = $row[0];
    $impto_adicional = $row[1];
    $sub = round($precio * $cantidad_clean);
    $imp = round(($precio * $impto_adicional)/100);
    $subtotal = round(($precio * $cantidad_clean)-(($precio * $cantidad_clean) * ($dscto_clean/100)));
    $iva = round($subtotal * (19/100));
    $produ_impto_adic = round($subtotal * ($impto_adicional/100));
    $total_general = round($subtotal + $iva + $produ_impto_adic);
    $imp_adi = round($imp * $cantidad_clean);

    $total_neto = round($total_neto + $subtotal);
    $total_iva = round($total_iva + $iva);
    $total_impto = round($total_impto + $produ_impto_adic);
    $total_total = round($total_total + $total_general);


    $contador  = $contador +1;
   $html.= "<tr id='row".$contador."'>";
   $html.= "<td id='data1' readonly='readonly' class='producto_pri'>".$producto_clean."</td>";
   $html.= "<td id='data2' readonly='readonly' class='um_pri'>".$um."</td>";
   $html.= "<td id='data3' readonly='readonly' class='cantidad_pri'>".$cantidad_clean."</td>";
   $html.= "<td id='data4' readonly='readonly' class='precio_pri'>".moneda_chilena($precio)."</td>";
   $html.= "<td id='data6' readonly='readonly' class='impto_pri'>".moneda_chilena($imp_adi)."</td>";
   $html.= "<td id='data7' readonly='readonly' class='subtotal_pri'>".moneda_chilena($sub)."</td>";
   $html.= "<td id='data8' readonly='readonly' class='descuento_pri'>".$dscto_clean."</td>";
   $html.= "<td id='data8' readonly='readonly' class='tipo_pri'>".$tipo_clean."</td>";
   $html.= "<td id='data9' readonly='readonly' class='total_pri'>".moneda_chilena($subtotal)."<td>";
   $html.= '</tr>';


    }


echo utf8_encode($html);



?>

