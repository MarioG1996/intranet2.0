<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Descarga PDF
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Descarga PDF</li>
  
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
                        <th >Nombre Archivo</th>
                        <th >Descargar      
                        </th>                            
                      </tr>       

      </thead>

      <tbody>

      <?php

                      $item = null;
                      $valor = null;

                      $aplicaciones = ControladorStatus::ctrDescargaPDF($item, $valor);

                      foreach ($aplicaciones as $key => $value){
                      
                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["DoctNumero"].'</td>';                                                   
                                echo '<td>'.$value["Archivo"].'</td>';
                                $ID = 'modelos/descargar2.php?variable1='.$value["DoctNumero"].'&variable2='.$value["Ruta"].'&variable3='.$value["Archivo"];
                     ?>

                  <td>
                    <div id="center_button">
                    
                    <button onclick="location.href='<?PHP echo $ID; ?>'"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                    </div>                            
                  </td>   

                  <?php
                      }       
                  ?>

      </tbody>
     </table>
     <div>    
  </div>  
  
    </div>
  </div>
</section>
</div>

