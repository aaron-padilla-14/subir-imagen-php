$(document).ready(function(){
	$('#formulario').submit(function(e){
		e.preventDefault();

		$("input[name='file']").on("change", function(){

			//variables
			var imagen = new FormData($("#formulario")[0]);
			$.ajax({
				url:"subir.php",
				type:"POST",
				data:{
					"imagen":imagen
				},
				contentType:false,
				processData:false,
				succes: function(datos){
					$("#respuesta").html(datos);
				},
				error:function(error){
					$("#respuesta").html(error);
				}
			});
		});
	});
});