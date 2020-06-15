<?php

require_once "conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;



$columns = array( 
// datatable column index  => database column name
0 => 'MLPnroPedido',
1 => 'MLPEstado',
  2 => 'LogInfo',
  3 => 'LogFecha',
  4 => 'LogEstadoDoc',
  5 => 'LogTipoDoc',
  6 => 'Detalle',
  7 => 'LogHora'
);
$item = null;
$valor = null;

$aplicaciones = ControladorStatus::ctrMostrarOpStatus($item, $valor);
$data = array();
foreach ($aplicaciones as $key => $value){
  $nestedData=array(); 
 

      $nestedData[] = $value["MLPnroPedido"];
      $nestedData[] = "<p class=".$value["MLPEstado"].">".$value["MLPEstado"]."</p>";
      $nestedData[] =$value["LogInfo"];
      $nestedData[] = $value["LogFecha"];
      $nestedData[] = $value["LogEstadoDoc"];
      $nestedData[] = $value["LogTipoDoc"];
      $nestedData[] = $value["LogHora"];



      $g = '<div id="fondo">

        <div onClick="loadDynamicContentModal('.$value["MLPnroPedido"].')"
            class="btn btn-info">Ver</div>
        </div>        
          
      <div class="modal fade" id="bootstrap-modal" role="dialog">
        <div class="modal-dialog" role="document"> 
         
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Detalle Orden de Pedido</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>';



   $nestedData[] = $g;


        $data[] = $nestedData;
}

$json_data = array(
      "draw"            => intval( $requestData['draw'] ), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
      "data"            => $data
      );

echo json_encode($json_data);  // send data as json format
?>




