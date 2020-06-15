<?php



$valor = null;

$aplicaciones = ControladorStatus::ctrMostrarDetalleOP($userid, $valor);



$response = "prueba";


//     foreach ($aplicaciones as $key => $value){
             
//     $response .= "<tr>";
//     $response .= "<td>".$value["RutCliente"]."</td>";
//     $response .= "</tr>";

//     $response .= "<tr>";
//     $response .= "<td>".$value["CodProducto"]."</td>";
//     $response .= "</tr>";

//     $response .= "<tr>";
//     $response .= "<td>".$value["Cantidad"]."</td>";
//     $response .= "</tr>";

//     $response .= "<tr>";
//     $response .= "<td>".$value["UnidadMedida"]."</td>";
//     $response .= "</tr>";
    
//     $response .= "<tr>";
//     $response .= "<td>".$value["FechaCreacion"]."</td>";
//     $response .= "</tr>";

// }

// $response .= "</table>";

echo $response;
exit;