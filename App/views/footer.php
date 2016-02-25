<!-- /#wrapper -->
    <footer class="footer text-center spacer ">
   <br>
	  <p class="text-muted text-center text-foot p1"><a href="index.php" > Dashboard</a> | <a href="ingreso.php"> Ingreso</a> | <a href="salida.php"> Salida</a> |<a href="informe-consultas.php"> Informes </a>|<a href="../../index.php"> Salir</a>
	  </p>
	        &copy; Archivo Nacional 2015 - Todos los derechos reservados
		

    </footer>
<a href="#wrapper" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
<script type="text/javascript" src="http://localhost/archivo/app/views/modules/datetimepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://localhost/archivo/app/views/modules/datetimepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/archivo/app/views/modules/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://localhost/archivo/app/views/modules/datetimepicker/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

<script>
    $(document).ready(function() {
		
		$('#lectura').hide(); 
		$('#descripcion').hide();
		$('#conservacion').hide();
		$('#exposicion').hide();
		$('#visitaguiada').hide();
		
        $('#usuarios').DataTable({
                responsive: true
        });
		$('#documentos').DataTable({
                responsive: true
        });
		$('.gradeA').click(function(event) {
			event.preventDefault();
        	var data = $(this).attr("data-valor");
        	document.getElementById('nom_solicita').value = data;
			var iduser = $(this).attr("id");
			document.getElementById('solicita').value = iduser;
			
		});
		$('.gradeA2').click(function(event) {
			event.preventDefault();
        	var data2 = $(this).attr("data-valor");
        	document.getElementById('documento').value = data2;
			var iddoc = $(this).attr("id");
			document.getElementById('id_documento').value = iddoc;
			
		});
		
		$('.gradeA3').click(function(event) {
			event.preventDefault();
        	var data3 = $(this).attr("data-valor");
        	document.getElementById('documentovisi').value = data3;
			var iddoc2 = $(this).attr("id");
			document.getElementById('id_documentovisi').value = iddoc2;
			
		});
		$('#tipo_solicitud').click(function(event) {	
		 event.preventDefault();
		 $('#lectura').hide(); 
		 $('#descripcion').hide();
		 $('#conservacion').hide();
		 $('#exposicion').hide();
		 $('#visitaguiada').hide();
		 var opcion=$(this).val();
		 if (opcion=="0"){
			$('#lectura').show(); 

			$('#dtp_input322').prop("required", false);
			$('#dtp_input311').prop("required", false);
			$('#dtp_conserva1').prop("required", false);
			$('#dtp_conserva2').prop("required", false);
			$('#dtp_expo1').prop("required", false);
			$('#dtp_expo2').prop("required", false);
			$('#dtp_visita_fec1').prop("required", false);
			$('#dtp_visita_fec2').prop("required", false);
			$('#dtp_visita_hora1').prop("required", false);
			$('#dtp_visita_hora2').prop("required", false);			
			$('#formato').prop("required", false);
			$('#lugarexpo').prop("required", false);
			$('#motivoexpo').prop("required", false);
			$('#institucion').prop("required", false);
			$('#alumnos').prop("required", false);
			$('#nombre').prop("required", false);
			$('#apellido').prop("required", false);
			$('#ci').prop("required", false);
			$('#nacionalidad').prop("required", false);
			$('#direccion').prop("required", false);
			$('#email').prop("required", false);
			$('#telefono').prop("required", false);
			$('#tema').prop("required", false);
			$('#volumen').prop("required", false);
		 }
		 if (opcion=="1"){
			$('#descripcion').show();

			$('#investigador').prop("required", false);
			$('#dtp_input31').prop("required", false);
			$('#dtp_input31h').prop("required", false);
			$('#fec_devol_lectura_hidden').prop("required", false);
			$('#dtp_input32h').prop("required", false);
			$('#dtp_conserva1').prop("required", false);
			$('#dtp_conserva2').prop("required", false);
			$('#dtp_expo1').prop("required", false);
			$('#dtp_expo2').prop("required", false);
			$('#dtp_visita_fec1').prop("required", false);
			$('#dtp_visita_fec2').prop("required", false);
			$('#dtp_visita_hora1').prop("required", false);
			$('#dtp_visita_hora2').prop("required", false);			
			$('#formato').prop("required", false);
			$('#lugarexpo').prop("required", false);
			$('#motivoexpo').prop("required", false);
			$('#institucion').prop("required", false);
			$('#alumnos').prop("required", false);
			$('#nombre').prop("required", false);
			$('#apellido').prop("required", false);
			$('#ci').prop("required", false);
			$('#nacionalidad').prop("required", false);
			$('#direccion').prop("required", false);
			$('#email').prop("required", false);
			$('#telefono').prop("required", false);
			$('#tema').prop("required", false);
			$('#volumen').prop("required", false);
			

		 }
		 if (opcion=="2"){
			$('#conservacion').show(); 

			$('#investigador').prop("required", false);
			$('#dtp_input31').prop("required", false);
			$('#dtp_input31h').prop("required", false);
			$('#fec_devol_lectura_hidden').prop("required", false);
			$('#dtp_input32h').prop("required", false);
			$('#dtp_input322').prop("required", false);
			$('#dtp_input311').prop("required", false);
			$('#dtp_expo1').prop("required", false);
			$('#dtp_expo2').prop("required", false);
			$('#dtp_visita_fec1').prop("required", false);
			$('#dtp_visita_fec2').prop("required", false);
			$('#dtp_visita_hora1').prop("required", false);
			$('#dtp_visita_hora2').prop("required", false);			
			$('#formato').prop("required", false);
			$('#lugarexpo').prop("required", false);
			$('#motivoexpo').prop("required", false);
			$('#institucion').prop("required", false);
			$('#alumnos').prop("required", false);
			$('#nombre').prop("required", false);
			$('#apellido').prop("required", false);
			$('#ci').prop("required", false);
			$('#nacionalidad').prop("required", false);
			$('#direccion').prop("required", false);
			$('#email').prop("required", false);
			$('#telefono').prop("required", false);
			$('#tema').prop("required", false);
			$('#volumen').prop("required", false);
		 }
		 if (opcion=="3"){
			$('#exposicion').show(); 

			$('#investigador').prop("required", false);
			$('#dtp_input31').prop("required", false);
			$('#dtp_input31h').prop("required", false);
			$('#fec_devol_lectura_hidden').prop("required", false);
			$('#dtp_input32h').prop("required", false);
			$('#dtp_input322').prop("required", false);
			$('#dtp_input311').prop("required", false);
			$('#dtp_conserva1').prop("required", false);
			$('#dtp_conserva2').prop("required", false);
			$('#dtp_visita_fec1').prop("required", false);
			$('#dtp_visita_fec2').prop("required", false);
			$('#dtp_visita_hora1').prop("required", false);
			$('#dtp_visita_hora2').prop("required", false);			
			$('#formato').prop("required", false);
			$('#institucion').prop("required", false);
			$('#alumnos').prop("required", false);
			$('#nombre').prop("required", false);
			$('#apellido').prop("required", false);
			$('#ci').prop("required", false);
			$('#nacionalidad').prop("required", false);
			$('#direccion').prop("required", false);
			$('#email').prop("required", false);
			$('#telefono').prop("required", false);
			$('#tema').prop("required", false);
			$('#volumen').prop("required", false);
		 }
		 if (opcion=="4"){
			$('#visitaguiada').show(); 

			$('#investigador').prop("required", false);
			$('#dtp_input31').prop("required", false);
			$('#dtp_input31h').prop("required", false);
			$('#fec_devol_lectura_hidden').prop("required", false);
			$('#dtp_input32h').prop("required", false);
			$('#dtp_input322').prop("required", false);
			$('#dtp_input311').prop("required", false);
			$('#dtp_conserva1').prop("required", false);
			$('#dtp_conserva2').prop("required", false);
			$('#dtp_expo1').prop("required", false);
			$('#dtp_expo2').prop("required", false);
			$('#formato').prop("required", false);
			$('#lugarexpo').prop("required", false);
			$('#motivoexpo').prop("required", false);
			$('#nombre').prop("required", false);
			$('#apellido').prop("required", false);
			$('#ci').prop("required", false);
			$('#nacionalidad').prop("required", false);
			$('#direccion').prop("required", false);
			$('#email').prop("required", false);
			$('#telefono').prop("required", false);
			$('#tema').prop("required", false);
			$('#volumen').prop("required", false);
		 }
		});	
		$('#consulta-informe').click(function(event) {
			//event.preventDefault();
        	//$('#area_tabla_consulta').show(); 
			
		});
		$('#fec_devol_lectura').click(function(event) {
        	var fecha=document.getElementById('fec_entrega_lectura1').value; 			
			document.getElementById('fec_devol_lectura1').value = fecha;			
			var fecha2=document.getElementById('dtp_input31').value; 
			document.getElementById('fec_devol_lectura_hidden').value = fecha2;
			
		});
		$('#fec_devol_lectura').click(function(event) {
		  	var fecha=document.getElementById('fec_entrega_lectura1').value; 			
			document.getElementById('fec_devol_lectura1').value = fecha;			
			var fecha2=document.getElementById('dtp_input31').value; 
			document.getElementById('fec_devol_lectura_hidden').value = fecha2;
			
		});
		
		$('#fec_entrega_lectura').click(function(event) {
        	var fecha=document.getElementById('fec_entrega_lectura1').value; 			
			document.getElementById('fec_devol_lectura1').value = fecha;			
			var fecha2=document.getElementById('dtp_input31').value; 
			document.getElementById('fec_devol_lectura_hidden').value = fecha2;
			
		});
		$('#hora_entrega_lectura').click(function(event) {
        	var fecha=document.getElementById('fec_entrega_lectura1').value; 			
			document.getElementById('fec_devol_lectura1').value = fecha;			
			var fecha2=document.getElementById('dtp_input31').value; 
			document.getElementById('fec_devol_lectura_hidden').value = fecha2;
			
		});/***/
		$('#fec_entrega_visita').click(function(event) {
        	var fechav=document.getElementById('fec_entrega_visita1').value; 			
			document.getElementById('fec_devol_visita2').value = fechav;			
			var fechav2=document.getElementById('dtp_visita_fec1').value; 
			document.getElementById('dtp_visita_fec2').value = fecha2v;
			
		});
		$('#fec_devol_visita').click(function(event) {
		  	var fechav=document.getElementById('fec_entrega_visita1').value; 			
			document.getElementById('fec_devol_visita2').value = fechav;			
			var fecha2v=document.getElementById('dtp_visita_fec1').value; 
			document.getElementById('dtp_visita_fec2').value = fecha2v;
			
		});
		
		$('#hora_entrega_visita').click(function(event) {
        	var fechav=document.getElementById('fec_entrega_visita1').value; 			
			document.getElementById('fec_devol_visita2').value = fechav;			
			var fecha2v=document.getElementById('dtp_visita_fec1').value; 
			document.getElementById('dtp_visita_fec2').value = fecha2v;
			
		});
		$('#hora_devol_visita').click(function(event) {
        	var fechav=document.getElementById('fec_entrega_visita1').value; 			
			document.getElementById('fec_devol_visita2').value = fechav;			
			var fecha2v=document.getElementById('dtp_visita_fec1').value; 
			document.getElementById('dtp_visita_fec2').value = fecha2v;
			
		});
		$('#guardarsalida').click(function(event) {
			
        	var fecha=document.getElementById('fec_entrega_lectura1').value; 			
			document.getElementById('fec_devol_lectura1').value = fecha;			
			var fecha2=document.getElementById('dtp_input31').value; 
			document.getElementById('fec_devol_lectura_hidden').value = fecha2;
			
		});
			$('#guardarsalida').click(function(event) {
			
        	var fechav=document.getElementById('fec_entrega_visita1').value; 			
			document.getElementById('fec_devol_visita2').value = fechav;			
			var fecha2v=document.getElementById('dtp_visita_fec1').value; 
			document.getElementById('dtp_visita_fec2').value = fecha2v;
			
		});

		
		
    });
	
	
</script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

    <!-- jQuery -->

<script src="http://localhost/archivo/app/views/modules/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->

<script src="http://localhost/archivo/app/views/modules/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/archivo/app/views/modules/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/archivo/app/views/modules/dist/js/sb-admin-2.js"></script>
	
	<!-- DataTables JavaScript -->
   <script src="http://localhost/archivo/app/views/modules/js/validator.min.js"></script>
     <script src="http://platform.twitter.com/widgets.js"></script>
     <script src="http://localhost/archivo/app/views/modules/js/application.js"></script>
    <script src="http://localhost/archivo/app/views/modules/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/archivo/app/views/modules/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

 
</body>

</html>
