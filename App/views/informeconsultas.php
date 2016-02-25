<?php
include ('header.php');

include ('nav.php');
?>
<article>
	<section>
    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Movimiento
                           de Documentos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-book fa-table"></i>  Informes
                            </li>

                        </ol>
                    </div>
                </div>
                                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                     <form role="form" id="form-consulta-informe" name="form-consulta-informe" action="informeconsultasshow" method="post" class="form-inline">

                            <div class="form-group">
               					 <label>Mes</label>
                				<select id="mes" name="mes" class="form-control">
								                    <option value="00">Seleccione ...</option>
                                                   	<option value="1">Enero</option>
													<option value="2">Febrero</option>
													<option value="3">Marzo</option>
													<option value="4">Abril</option>
													<option value="5">Mayo</option>
													<option value="6">Junio</option>
													<option value="7">Julio</option>
													<option value="8">Agosto</option>
													<option value="9">Setiembre</option>
													<option value="10">Octubre</option>
													<option value="11">Noviembre</option>
													<option value="12">Diciembre</option>
                               </select>
							   </div>
								<div class="form-group">
               					 <label>Año</label>
                				 <select id="anio" name="anio" class="form-control">
								                    <option value="00">Seleccione ...</option>
								                     <?php
                                    				$anio=date('Y');
								                     for ($i = 2015; $i <= $anio; $i++) {                							
                									 ?>
										             <option value="<?php echo $i; ?>"><?php echo $i; ?> </option>
										             <?php 
								                     }
										             ?>													
                                 </select>
                                
            				    </div>
								<div class="form-group">
								<br>
                           		<button type="submit" class="btn btn-primary" id="consulta-informe">Consultar</button>
                            	
								</div>
                            
                    </form>
					<br><br>
					 <div class="dataTable_wrapper" id="area_tabla_consulta" <?php echo $mostrar;?>>
                                <table class="table table-striped table-bordered table-hover" id="consulta-informe-table">
                                    <thead>
                                        <tr>
                                            <th>Descripción (<?php echo $periodo;?>)</th>
                                            <th>Cantidad</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeA3"  data-dismiss="modal">
                                            <td >Consultas realizadas en el periodo</td>
                                            <td><?php echo $consultas;?></td>
                                        </tr>
                                        <tr class="gradeA3"  data-dismiss="modal">
                                            <td >Materiales consultados</td>
                                            <td><?php echo $materiales;?></td>
                                        </tr>
										<tr class="gradeA3"  data-dismiss="modal">
                                            <td >Visitas guiadas realizadas</td>
                                            <td><?php echo $visitas;?></td>
                                        </tr>
										<tr class="gradeA3"  data-dismiss="modal">
                                            <td >Documentos digitalizados solicitados</td>
                                            <td><?php echo $digitalizados;?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                    </div>
                                    <!-- /.table-responsive -->
 </div>
                    <div class="col-lg-6">
                        <h1>&nbsp;</h1>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </section>
</article>

<?php
include ('footer.php');


?>