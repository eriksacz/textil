
function btn_guardar_dato()
{
	 var trabajador = $("#trabajador").val();
	 var dibujo = $("#dibujo").val();
    var hilo = $("#hilo").val();
    var composicion = $("#composicion").val();
    var maquina = $("#maquina").val();
    var turno = $("#turno").val();
    var lote = $("#lote").val();
    var fecha = $("#fecha").val();
    var rollo = $("#rollo").val();
    var kilos = $("#kilos").val();

   alert(trabajador+" - "+dibujo+" - "+hilo+" - "+composicion+" - "+maquina+" - "+turno+" - "+lote+" - "+fecha
   +" - "+rollo+" - "+kilos);

    var ob = {trabajador:trabajador, dibujo:dibujo, hilo:hilo, composicion:composicion, maquina:maquina,
      turno:turno, lote:lote, fecha:fecha, rollo:rollo, kilos:kilos};

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

function btn_editar(ID_usuario)
{
	 var ob = {ID_usuario:ID_usuario};

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
     var ID_usuario = $("#ID_usuario").val();
	 var trabajador = $("#trabajador_ed").val();
	 var dibujo = $("#dibujo_ed").val();
	 var hilo = $("#hilo_ed").val();
	 var composicion = $("#composicion_ed").val();
	 var maquina = $("#maquina_ed").val();
	 var turno = $("#turno_ed").val();
	 var lote = $("#lote_ed").val();
	 var fecha = $("#fecha_ed").val();
	 var rollo = $("#rollo_ed").val();
	 var kilos = $("#kilos_ed").val();

	 //alert(trabajador+" - "+dibujo+" - "+hilo);

    var ob = {trabajador:trabajador, dibujo:dibujo, hilo:hilo,composicion:composicion,maquina:maquina,
      turno:turno,lote:lote,fecha:fecha,rollo:rollo,kilos:kilos,ID_usuario:ID_usuario};

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


function btn_eliminar(ID_usuario)
{
	 var ob = {ID_usuario:ID_usuario};

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
     var ID_usuario = $("#ID_usuario").val();

	 var ob = {ID_usuario:ID_usuario};

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