
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Funciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Funciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre Aplicacion</th>
           <th>Nombre Funcion</th>
           <th>Estado</th>
         

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $aplicaciones = ControladorPerfil::ctrMostrarFuncionAplicacion($item, $valor);

       foreach ($aplicaciones as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["NombreAplicacion"].'</td>
                  <td>'.$value["NombreFuncion"].'</td>';


                  if($value["estadoFuncion"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivarFuncion" IdFuncion="'.$value["IdFuncion"].'" estadoFuncion="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivarFuncion" IdFuncion="'.$value["IdFuncion"].'" estadoFuncion="1">Desactivado</button></td>';

                  }    

                  '</tr>';

        }



        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>




