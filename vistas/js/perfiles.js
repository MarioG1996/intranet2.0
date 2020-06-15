$(".tablas").on("click", ".btnActivar", function(){

	var IdPerfil = $(this).attr("IdPerfil");
	var estadoPerfil = $(this).attr("estadoPerfil");

	var datos = new FormData();
 	datos.append("activarId", IdPerfil);
  	datos.append("activarPerfil", estadoPerfil);

  	$.ajax({

	  url:"ajax/perfiles.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El perfil ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "perfiles";

			        }


				});

	      	}

      }

  	})

  		if(estadoPerfil == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoPerfil',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoPerfil',0);

  	}

})




$(".tablas").on("click", ".btnEliminarPerfil", function(){

  var IdPerfil = $(this).attr("IdPerfil");

  swal({
    title: '¿Está seguro que desea borrar el Perfil?',
    text: "¡Si no lo está puede presionar cancela!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Perfil!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=perfiles&IdPerfil="+IdPerfil;

    }

  })

})




$(".tablas").on("click", ".btnEliminarAplicacionPerfil", function(){

  var IdAplicacion = $(this).attr("IdAplicacion");

  swal({
    title: '¿Está seguro que desea borrar esta Aplicacion para el Perfil seleccionado?',
    text: "¡Si no lo está puede presionar cancela!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Aplicacion!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=aplicacionPerfil&IdAplicacion="+IdAplicacion;

    }

  })

})





$(".tablas").on("click", ".btnActivarFuncion", function(){

  var IdFuncion = $(this).attr("IdFuncion");
  var estadoFuncion = $(this).attr("estadoFuncion");

  var datos = new FormData();
  datos.append("activarIdfuncion", IdFuncion);
    datos.append("activarFuncion", estadoFuncion);

    $.ajax({

    url:"ajax/perfiles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

          if(window.matchMedia("(max-width:767px)").matches){

             swal({
            title: "La funcion ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
              if (result.value) {

                window.location = "agregarFuncion";

              }


        });

          }

      }

    })

      if(estadoFuncion == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoFuncion',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoFuncion',0);

    }

})






$(".tablas").on("click", ".btnActivarAplicacion", function(){

  var IdAplicacion = $(this).attr("IdAplicacion");
  var estadoAplicacion = $(this).attr("estadoAplicacion");

  var datos = new FormData();
  datos.append("activarIdAplicacion", IdAplicacion);
    datos.append("activarAplicacion", estadoAplicacion);

    $.ajax({

    url:"ajax/perfiles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

          if(window.matchMedia("(max-width:767px)").matches){

             swal({
            title: "La Aplicacion ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
              if (result.value) {

                window.location = "aplicacionPerfil";

              }


        });

          }

      }

    })

      if(estadoAplicacion == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoAplicacion',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoAplicacion',0);

    }

})



$("#asigPerfil").change(function() {

  $(".alert").remove();

  var perfil = $(this).val();
  var Aplicacion = $(this).val();


  var datos = new FormData();
  datos.append("validarPerfil", perfil);
  

   $.ajax({
      url:"ajax/perfiles.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){
        
        if(respuesta){

          $("#asigPerfil","#asigAplicaciones").parent().after('<div class="alert alert-warning">Esta relacion ya existe.</div>');

          $("#asigPerfil","#asigAplicaciones").val("");

        }

      }

  })
})