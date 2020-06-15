<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     Crear Orden de Pedido
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Orden de Pedido</li>
    
    </ol>

  </section>

  <section class="content">
         <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="fa fa-file"></i> Detalle Orden de Pedido</h3>
              <form role="form">
              <div class="box-body">
                <div class="col-md-4">
                  <label>Seleccionar Cliente  (*)</label>

                  <select class="form-control select2" style="width: 100%;" id="cliente" required>
                  
                     <option value='0'>Seleccionar Cliente</option>
                    
                  <?php

                  $item = null;
                  $valor = null;

                 $perfiles = ControladorClientes::ctrMostrarClientes($item, $valor);

                  foreach ($perfiles as $key => $value) {

                    echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].'</option>';
                       
              

            
                  }

                  ?>
                  </select>
                </div>
                  <div class="col-md-4">
                  <label>Seleccionar Sucursal (*)</label>
                   <select class="form-control select2" style="width: 100%;" id="sucursal" onchange="sucursales()">
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Fecha de O.P.</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="fecha_op" value="<?php echo date("d/m/Y") ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask  disabled>
                </div>
                </div>
              <div class="col-md-4">
                  <label>Seleccionar forma de pago (*)</label>
                   <select class="form-control select2" style="width: 100%;" name="formapago" id="formapago">
                    <!--Logica Seleccion forma de pago-->
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Seleccionar Tipo de Medida (*)</label>
                   <select class="form-control select2" style="width: 100%;" name="tipomedida" id="tipomedida">
                    <!--Logica Seleccion Unidad de Medida-->
                  </select>
                </div>

                </div>
              <!-- /.box-body -->
              <div class="pull-right">
                <div clas="col-md-2">
            
                  <button class="btn btn-block btn-success btn-fla" data-toggle="modal" data-target="#modalAgregarUsuario"> <i class="fa fa-cart-plus"></i> Agregar Producto </button>
                </div>
              </div>
               <br></br>
               <div class="form group">
                 <table id="op_detalle" class="table table-bordered table-striped" style="width:100%">  
                                     <thead>
                                        <tr>
                                        <th>Descripcion del Producto</th>
                                        <th>U.M</th>
                                        <th>Cantidad</th>
                                        <th>Precio Neto Caja</th>
                                        <th>Impuesto Adicional</th>
                                        <th>Sub Total</th>
                                        <th>% Descuento </th>
                                        <th>Tipo Dscto.</th>
                                        <th>Total General</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                  </div>
        <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h4 class="box-title"><i class="fa fa-money"></i> Totales</h4>

              <div class="box-tools pull-right">
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <td>Total Neto</td>
                  <td><div id="total_neto"></div></td>
                </tr>
                <tr>
                  <td>IVA</td>
                  <td><div id="total_iva"></div></td>
                </tr>
                <tr>
                 <td>Impto. Adicional</td>
                 <td><div class='col-md-12>'><div id="total_adicional"></div></div></td>
                </tr>
                <tr>
                 <td><label>Total General</label></td>
                 <td><div id="total_general"></div></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

          <div class="col-md-9">
          <div class="box box-success">
            <div class="box-header with-border">
              <h4 class="box-title"><i class="fa fa-edit"></i> Informacion Adicional</h4>

              <div class="box-tools pull-right">
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-6">
                  <label>Direccion</label>
                  <div id="div_direccion"></div>
                </div>
                <div class="col-md-6">
                  <label>Observacion</label>
                  <input type="text" class="form-control" id="observacion_op" placeholder="">
                </div>
                <br></br>
                <div class="col-md-6">
                <label>Fecha de Despacho</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="fecha_despacho_op" value="<?php echo sumasdiasemana(date("Y-m-d"), $row[1]); ?>"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="grabar_op"><i class="fa fa-save"></i> Grabar Pedido</button>
                <button type="button" class="btn btn-info" id="limpiar_op"><i class="fa fa-refresh"></i> Limpiar</button>
              </div>
            </form>                              
            </div>
            </div>
          </div>
        
  </section>

 
 </div>


  <div id="modalAgregarUsuario" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true"     >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-cart-plus"></i> Agregar Productos</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
           <div class="col-md-4">
                  <label>Seleccionar Linea (*)</label>
                   <select class="form-control select2" style="width: 100%;" id="linea_select" name="linea_select">
                  <option value='0'>Seleccionar Linea</option>


                     <?php

                  $item = null;
                  $valor = null;

                  $lineas = ControladorProductos::ctrMostrarLineas($item, $valor);

                  var_dump($lineas);

                  foreach ($lineas as $key => $value) {
                    
                    echo '<option value="'.$value["LproCodigo"].'">'.$value["LproNombre"].'</option>';
                  }

                  ?>

                         
                  </select>
                </div>
            <div class="col-md-4">
                  <label>Seleccionar Producto (*)</label>
                   <select class="form-control select2" style="width: 100%;" id="producto_select" name="producto_select">
                    
                  </select>
                </div>
            <div class="col-md-4">
                  <label>Cantidad (*)</label>
                  <input type="number" class="form-control" id="cantidad_pro" name="cantidad_pro" >
                </div>
            <div class="col-md-4">
                  <label>Tipo Descuento</label>
                  <select class="form-control select2" style="width: 100%;" id="descuento_select" name="descuento_select">
                  <option value="0">Seleccione Descuento</option>
                  <option value="1">PRUEBA</option>
      <option value="2">PROMOCIONES</option>
                  <option value="3">PRONTO VENCIMIENTO</option>
                  <option value="4">SOBRESTOCK</option>
                  <option value="5">VOLUMEN</option>
                  <option value="6">MERMA</option>
      <option value="7">DESCUENTO FIJO</option>
                  </select>
                </div>
            <div class="col-md-4">
                  <label>Porcentaje Dscto.</label>
                  <input type="number" class="form-control" id="descuento_pro" name="descuento_pro" placeholder="">
                </div>
                <br></br>
                       <br></br>
                              <br></br>
                               <br></br>

                <buton type="button" name="agregar" id="agregar" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Agregar Producto</buton>
              </div>
              </form>
              <br>
                                    <table id="Productos" class="table table-bordered table-striped">  
                                     <thead>
                                        <tr>
                                        <th>Linea</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tipo Dscto.</th>
                                        <th>% Dscto.</th>
                                        <th>Acciones</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            
                                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>


 <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    $('#number').inputmask('#,##0.00', { 'placeholder': '#,##0.00' })
    //Money Euro
    $('[data-mask]').inputmask()



    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>

    <script>
        $(document).ready(function() {
        $("#div_direccion").html('<input type="text" class="form-control" id="direccion_op" placeholder="" value="" disabled>');
        $("#total_adicional").html("<input type='text' class='form-control' value='' id='impto' disabled>");
        $("#total_neto").html("<input type='text' class='form-control' value='' id='neto' disabled>");
        $("#total_iva").html("<input type='text' class='form-control' value='' id='iva' disabled>");
        $("#total_general").html("<input type='text' class='form-control' value='' id='general' disabled>");
           var cliente_val = "";
           $("#cliente").change(function(){
            cliente_val = $(this).children("option:selected").val();
            });
         $('#modal_show').click(function(){
          if(cliente_val != ""){
          $("#modal_agregar_producto").modal("show");
        }
        else
        {
          alert("Favor elegir cliente para agregar productos.")
        }

         });

        var dataTable = $('#Productos').DataTable( {
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "ordering": false,
         "language":  {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar   _MENU_   registros",
          "sZeroRecords":    "",
          "sEmptyTable":     "",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:     ",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }

        }
        });

  var linea_grilla;
  var prod_grilla;
  var tipo_grilla = '';
  var cant_grilla = '0';
  var dscto_grilla = '0';

  var count = 1;
  $('#agregar').click(function(){
  if(linea_grilla != 'Seleccionar Linea' && cant_grilla != '0'){
  $('#le').prop('selectedIndex',0);
   count = count +1;
   var html = "<tr id='row"+count+"'>";
   html += "<td id='data1' readonly='readonly' class='linea_detalle'>"+linea_grilla+"</td>";
   html += "<td id='data2' readonly='readonly' class='producto_detalle'>"+prod_grilla+"</td>";
   html += "<td id='data3' readonly='readonly' class='cantidad_detalle'>"+cant_grilla+"</td>";
   html += "<td id='data4' readonly='readonly' class='tipo_detalle'>"+tipo_grilla+"</td>";
   html += "<td id='data5' readonly='readonly' class='dscto_detalle'>"+dscto_grilla+"</td>";
   html += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>Eliminar</button></td>";
   html += '</tr>';
   $('#Productos tbody').prepend(html);
   $('input[name="cantidad_pro"]').val('0');
   $('input[name="descuento_pro"]').val('0');
   $("#linea_select").select2("val", "0");
   $("#descuento_select").select2("val", "0");
   linea_grilla = '';
   prod_grilla = '';
   tipo_grilla = '';
   cant_grilla = '0';
   dscto_grilla = '0';
 }
 else
 {
  alert('Favor ingresar producto y su respectiva cantidad para agregar');
 }
  });


  $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });

  $("#linea_select").change(function(){
        linea_grilla = $(this).children("option:selected").val();
  });
  $("#producto_select").change(function(){
        prod_grilla = $(this).children("option:selected").val();
  });
  $("#descuento_select").change(function(){
        tipo_grilla = $(this).children("option:selected").val();
  });
   $("#cantidad_pro").change(function(){
        cant_grilla = $(this).val();
  });
   $("#descuento_pro").change(function(){
        dscto_grilla = $(this).val();
  });


});

</script>
 <script>
      $(document).ready(function(){
        var cli;
        $("#cliente").change(function () {
          $("#cliente option:selected").each(function () {
            cliente_select = $(this).val();
            cli = cliente_select;
      
      
      
            $.post("../controller/getSucursal.php", { cliente_select: cliente_select }, function(data){
              $("#sucursal").html(data);
            });
          });
        })
        $("#sucursal").change(function () {
          $("#sucursal option:selected").each(function () {
            sucursal_select = $(this).val();
            $.post("../controller/getFormaPago.php", { cli: cli, sucursal_select: sucursal_select }, function(data){
              $("#formapago").html(data);
            });
              $.post("../controller/getDireccion.php", { cli: cli, sucursal_select: sucursal_select }, function(data){
              $("#div_direccion").html(data);
            });
          });
        })
      $("#linea_select").change(function () {
          $("#linea_select option:selected").each(function () {
            linea_select = $(this).val();
            $.post("../controller/getProducto.php", { cli: cli, linea_select: linea_select }, function(data){
              $("#producto_select").html(data);
            });
          });
        })
      });


    </script>
    <script>
    $(document).ready(function() {

        var dataTable = $('#op_detalle').DataTable( {
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "ordering": false,
         "language":  {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar   _MENU_   registros",
          "sZeroRecords":    "",
          "sEmptyTable":     "",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:     ",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }

           });
        });
    </script>
    <script>

    $(document).ready(function() {
        $("#cliente_select").change(function(){
        cliente_select = $(this).children("option:selected").val();
  });
      $('#guardar').click(function(){
        if(confirm("Estas seguro de agregar estos productos?")){
        var table = $('#op_detalle').DataTable();
        table.clear().draw();

                var linea_arr = [];
                var producto_arr = [];
                var cantidad_arr = [];
                var tipo_arr = [];
                var dscto_arr = [];
                $('.linea_detalle').each(function(){
                linea_arr.push($(this).text());
                });
                $('.producto_detalle').each(function(){
                producto_arr.push($(this).text());
                });
                $('.cantidad_detalle').each(function(){
                cantidad_arr.push($(this).text());
                });
                $('.tipo_detalle').each(function(){
                tipo_arr.push($(this).text());
                });
                $('.dscto_detalle').each(function(){
                dscto_arr.push($(this).text());
                });
                $.ajax({
                url:"../controller/getProductosSetDetalle.php",
                method:"POST",
                data:{linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select},
                success:function(data){
                $.post("../controller/getProductosSetDetalle.php", {linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select}, function(html){
                $('#op_detalle tbody').prepend(html);
                  });
                $.post("../controller/getTotalNeto.php",{linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select}, function(total_neto){
                $("#total_neto").html(total_neto);
                  });
                $.post("../controller/getTotalIva.php",{linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select}, function(total_iva){
                $("#total_iva").html(total_iva);
                  });
                $.post("../controller/getTotalAdic.php",{linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select}, function(total_impto){
                $("#total_adicional").html(total_impto);
                  });
                $.post("../controller/getTotalGeneral.php",{linea_arr:linea_arr, producto_arr:producto_arr, cantidad_arr:cantidad_arr, tipo_arr:tipo_arr, dscto_arr:dscto_arr, cliente_select:cliente_select}, function(total_total){
                $("#total_general").html(total_total);
                  });


                  }

             });
              }

          });

      });
    </script>
    <script>
    $(document).ready(function(){

      function encabezado()
      {

        var cliente_insert=$("#cliente").val();
        var sucursal_insert=$("#sucursal").val();
        var fecha_insert=$("#fecha_op").val();
        var formapago_insert=$("#formapago").val();
        var direccion_insert=$("#direccion_op").val();
        var fecha_despacho_insert=$("#fecha_despacho_op").val();
        var observacion_insert=$("#observacion_op").val();
        var neto_insert=$("#neto").val();
        var iva_insert=$("#iva").val();
        var impto_insert=$("#impto").val();
        var general_insert=$("#general").val();

          $.ajax({
                    url:'../controller/setEncabezadoOP.php',
                    method:'POST',
                    data:{
                        cliente_insert:cliente_insert,
                        sucursal_insert:sucursal_insert,
                        fecha_insert:fecha_insert,
                        formapago_insert:formapago_insert,
                        direccion_insert:direccion_insert,
                        fecha_despacho_insert:fecha_despacho_insert,
                        observacion_insert:observacion_insert,
                        neto_insert:neto_insert,
                        iva_insert:iva_insert,
                        impto_insert:impto_insert,
                        general_insert:general_insert
                    },
                   success:function(data){


                            detalle();

                   }
                });

      }

      function detalle()
      {
             var producto_insert = [];
                var um_insert = [];
                var cantidad_insert = [];
                var precio_insert = [];
                var impuesto_insert = [];
                var subtotal_insert = [];
                var descuento_insert = [];
                var tipo_insert = [];
                var total_insert = [];

                $('.producto_pri').each(function(){
                producto_insert.push($(this).text());
                });

                $('.cantidad_pri').each(function(){
                cantidad_insert.push($(this).text());
                });

                $('.precio_pri').each(function(){
                precio_insert.push($(this).text());
                });

                $('.subtotal_pri').each(function(){
                subtotal_insert.push($(this).text());
                });

                $('.descuento_pri').each(function(){
                descuento_insert.push($(this).text());
                });

                $('.tipo_pri').each(function(){
                tipo_insert.push($(this).text());
                });

                $('.total_pri').each(function(){
                total_insert.push($(this).text());
                });
                if (producto_insert != ''){
                $.ajax({
                url:"../controller/setDetalleOP.php",
                method:"POST",
                data:{
                  producto_insert:producto_insert,
                  cantidad_insert:cantidad_insert,
                  precio_insert:precio_insert,
                  subtotal_insert:subtotal_insert,
                  descuento_insert:descuento_insert,
                  tipo_insert: tipo_insert,
                  total_insert:total_insert
                },
                success:function(data){
                    alert(data);
                }
                });
                location.reload();
              }
              else
              {
                alert("Tienes que ingresar al menos 1 producto en la orden.");
              }
      }

    $('#grabar_op').click(function(){



        encabezado();





  });
  });

    </script>
