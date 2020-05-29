function salir(){
   var respuesta=confirm("¿Desea usted realmente salir?");
   if(respuesta==true)
       window.location="../../../logout.php";
  else
       return 0;
}



function btn_guardar_dato()
{
	 var nofacatura = $("#nofacatura").val();
	 var proveedor = $("#proveedor").val();
	 var nopallets = $("#nopallets").val();
	 var composicion = $("#composicion").val();
	 var lote = $("#lote").val();
	 var kilos = $("#kilos").val();
	 var fecha = $("#fecha").val();

    alert(nofacatura+" - "+proveedor+" - "+nopallets+" - "+composicion+" - "+lote+" - "+kilos
          +" - "+fecha);

    var ob = {nofacatura:nofacatura, proveedor:proveedor, nopallets:nopallets, composicion:composicion,
              lote:lote, kilos:kilos, fecha:fecha};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_respuesta").html(data);
                 btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_respuesta").html("");
                 },2000);
                

                }
             });
}

function btn_listar_datos()
{
	 var ob = "";

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_listar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_listado").html(data);

                }
             });
}

function btn_editar(id)
{
	 var ob = {id:id};

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_editar").html(data);

                }
             });
}

function btn_guardar_edicion()
{    
     var id = $("#id").val();
	 var nofactura = $("#nofactura_ed").val();
	 var nopallets = $("#nopallets_ed").val();
	 var kilos = $("#kilos_ed").val();
	 var proveedor = $("#proveedor_ed").val();
	 var composicion = $("#composicion_ed").val();
	 var lote = $("#lote_ed").val();

	 alert(nofactura+" "+nopallets+" "+kilos+" "+proveedor+" "+composicion+" "+lote);

    var ob = {nofactura:nofactura, nopallets:nopallets, kilos:kilos,proveedor:proveedor,composicion:composicion,
               lote:lote,id:id};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_guardar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_respuesta_edicion").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_respuesta_edicion").html("");
                 },2000);

                 setTimeout(function(){
                  $("#myModal_editar").modal("hide").fadeIn("slow");
                 },2500);

                 setTimeout(function(){
                  btn_listar_datos();
                 },3000);
                

                }
             });
}


function btn_eliminar(id)
{
	 var ob = {id:id};

	 $.ajax({
                type: "POST",
                url:"../vista/vista_eliminar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_eliminar").html(data);

                }
             });
}

function btn_eliminar_dato()
{    
     var id = $("#id").val();

	 var ob = {id:id};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_eliminar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_eliminar").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar").html("");
                 },2000);

                 setTimeout(function(){
                  $("#myModal_eliminar").modal("hide").fadeIn("slow");
                 },2500);

                 setTimeout(function(){
                  btn_listar_datos();
                 },3000);
                

                }
             });
}