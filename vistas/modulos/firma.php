

<!DOCTYPE html>

<html ng-app="kitdigital" >

<head>


  <script src="../ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script> 

  <script>

    var myapp;
    myApp = angular.module('kitdigital', []);

    myApp.config(function ($interpolateProvider) {    
       return  $interpolateProvider.startSymbol('[[').endSymbol(']]');
      });

document.addEventListener('DOMContentLoaded', () => {
    for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
        const pattern = el.getAttribute("placeholder"),
            slots = new Set(el.dataset.slots || "_"),
            prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
            first = [...pattern].findIndex(c => slots.has(c)),
            accept = new RegExp(el.dataset.accept || "\\d", "g"),
            clean = input => {
                input = input.match(accept) || [];
                return Array.from(pattern, c =>
                    input[0] === c || slots.has(c) ? input.shift() || c : c
                );
            },
            format = () => {
                const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                    i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                    return i<0? prev[prev.length-1]: back? prev[i-1] || first: i;
                });
                el.value = clean(el.value).join``;
                el.setSelectionRange(i, j);
                back = false;
            };
        let back = false;
        el.addEventListener("keydown", (e) => back = e.key === "Backspace");
        el.addEventListener("input", format);
        el.addEventListener("focus", format);
        el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
});


  </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

<style>
input:invalid {
    background-color: rgb(223, 189, 196);
}                    

input:invalid+span:after {
    content: '✖ - Formato incorrecto, Ej: +560 0000 00 00';
    padding-left: 5px;
    color:red;
}
[data-slots] { font-family: monospace }
</style>
<div class="content-wrapper">

<section class="content-header">
    
    <h1>
      
     Generador de Firmas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Generador de Firmas</li>
    
    </ol>

  </section>

<section class="content">
         <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">


       <div align="center" class="container" style="padding-bottom:10px;"  >       
     
        <br>
        <div style="width: 450px; " >
      <form  id="FormularioCorreo" name="DatosCorreo" >

        <div class="form-group row" >
          <label for="inputPassword1" class="col-sm-2 col-form-label" style="font-weight: bolder;">Nombre:</label>
          <div class="col-sm-10" align="left">
            <input type="text"   class="form-control" ng-model="nombre" name= "nombre" id="nombre" placeholder="Ingresa tu nombre completo">
          </div>
        </div>

          <div class="form-group row">
            <label for="inputPassword2" class="col-sm-2 col-form-label"  style="font-weight: bolder;">Cargo:</label>
            <div class="col-sm-10"  >
              <input  type="text"  class="form-control" ng-model="cargo" name="cargoname" placeholder="Ingresa tu cargo" >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-weight: bolder;">Telefono:</label>
            <div class="col-sm-10">
              <input type="text" name="tel" data-slots="_"  class="form-control"  ng-model="tel"  id="tel" placeholder="+56_ ____ __ __">
              <span class="validity"></span>
            </div>
            
          </div>

          <div class="form-group row " >
            <label for="inputPassword4" class="col-sm-2 col-form-label" style="font-weight: bolder;">Celular:</label>
            <div class="col-sm-10">
              <input type="text" name="cel"  class="form-control" maxlenght="12" ng-model="tel2" id="cel" data-slots="_" placeholder="+56_ ____ __ __">
              <span class="validity"></span>
              
            </div>
          </div>
          
        </form>
       
        </div>
<div>
<hr class="mt-5 mb-5">
        
        <ul class="ul" style="font-family: Arial, Helvetica, sans-serif; font-size: medium; " >
          <p > 1. Seleccione la firma generada.</p>
          <p >2. Haz click derecho sobre la selección y seleccione “copiar”</p>
          <p >3. Diríjase a la configuración de su mail (Archivo > Opciones > Correo > Firma).</p>
          <p >4. Haga click derecho sobre el cuadrado para Editar firma y selecione pegar".​</p>
          <p >5. Configura en elegir firma predeterminada la nueva firma para mensajes nuevos y respuestas o reenvíos.​</p>
          <p >6. En caso de presentar un problema comunicarse con soporte informática: <strong>soporte@prosud.cl</strong>.​</p>
        </ul>
        <!-- <img src="img/imgGeneradorCorreo/instr.png" width="250" height="150" style="border-width:5px; border-style:double;"> -->
        <!-- <p></p> -->
  
</div>

<hr class="mt-5 mb-5">
<div  style=" margin:auto; background-color: white; border-radius: 20px; height: 230px;  width: 469px;padding: 20px; border-style: dotted; color: #062244;">
        <table  >
          <tr > 
            <td><img src="vistas/img/imgGeneradorCorreo/logo6.png" >
            </td>
  
            <td align="left"style="width:20px; " >
            <img src="vistas/img/imgGeneradorCorreo/line2.png"  ></td>
      
<td align="left" style="width:235px;" >

      <strong id="nombrefirma" style="font-family: calibri;">[[nombre  || "Nombre Completo"]]</strong><br>
        <strong  id="cargo" style="font-family: calibri;">[[cargo || "Cargo"]]</strong><br>
        <img src="vistas/img/imgGeneradorCorreo/tel2.png" width="15" height="15"><span id="telnum" style="font-family: calibri;"> Tel. [[tel]]</span><br>
        <img src="vistas/img/imgGeneradorCorreo/cell2.png" width="15" height="15"><span id="celnum" style="font-family: calibri;">Cel. [[tel2]]</span> <br> 
        <img src="vistas/img/imgGeneradorCorreo/web2.png"  width="15" height="15"><a href="https://www.prosud.cl" style="font-family: calibri;">  www.<strong >prosud</strong>.cl</a><br>
        Lautaro 2102-D, Quilicura
       
      </td>
          </tr>    
      
            <tr >
            <td colspan="3" style="height:70px; ">         
            <img src="vistas/img/imgGeneradorCorreo/firma2.png" width=419 height=50></td>
          </tr>
        </table>

      </div>

      </div>    

</div>   

  <div class="control-sidebar-bg"></div>
  </div>
            </div>
            </div>
          </div>
        
  </section>
</div>
<!-- ./wrapper -->
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>

