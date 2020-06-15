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

    $subtotal = round(($precio * $cantidad_clean)-(($precio * $cantidad_clean) * ($dscto_clean/100)));
    $iva = round($subtotal * (19/100));
    $produ_impto_adic = round($subtotal * ($impto_adicional/100));
    $total_general = round($subtotal + $iva + $produ_impto_adic);

    $total_neto = round($total_neto + $subtotal);
    $total_iva = round($total_iva + $iva);
    $total_impto = round($total_impto + $produ_impto_adic);
    $total_total = round($total_total + $total_general);




    }

  echo "<input type='text' class='form-control' value='".moneda_chilena($total_neto)."' id='neto' disabled>" ;

?>