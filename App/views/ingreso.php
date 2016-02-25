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
                                <i class="fa fa-book fa-fw"></i>  Movimiento de Documentos
                            </li>
                            <li class="active">
                                <i class="fa fa-archive fa-fw"></i> Ingreso de Documentos
                            </li>
                        </ol>
                    </div>
                </div>
                                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
						<div id="mensaje">
                     <?php 
                     echo $mensaje;
                     ?>
                     </div>
                        <form class="form-horizontal" id="form_registro" name="form_registro"  action="addingreso" method="post">

                            <div class="form-group">
                             <label>Documento</label>
							 <div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Seleccione Documento.." id="documento"  name="documento"  readonly>
								     <input type="hidden" id="id_documento" name="id_documento" required>
                                     <span class="input-group-btn">
                                           <button id="mymodaldoc" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumento"><i class="fa fa-search"></i></button>
                                         
                                           <button id="mymodaldocadd" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoAdd"><i class="fa fa-plus"></i></button>
                                     </span>
                                </div>
                                
                                <label>Registro</label>
                                <input  type="number" class="form-control" id="registro" name="registro" placeholder="(Sólo números)" required>
                                <label>Año</label>
                                <input class="form-control" id="anio" name="anio" placeholder="Ingrese el año" required>
                                <label>Página</label>
                                <input class="form-control" id="pagina" name="pagina" placeholder="Ingrese página" required>
                            </div>
                            <div class="form-group"></div>

                            <button type="submit" class="btn btn-primary"  id="btn_guardar_ingreso" name="btn_guardar_ingreso">Guardar</button>
                            <button type="reset" class="btn btn-warning" >Limpiar</button>

                        </form>
	<!-- Modal myModaDocumento -->
<div class="modal fade" id="myModalDocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione un Documento</h4>
      </div>
      <div class="modal-body">
                               <!-- /.panel-heading -->
  <div class="dataTable_wrapper" id="area_tabla2">
                                <table class="table table-striped table-bordered table-hover" id="documentos">
                                    <thead>
                                        <tr>
                                            <th>Seccion</th>
                                            <th>Volumen</th>
                                            <th>Numero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                    
                						foreach ($docs as $doc){ 
                							
                						?>
                					<tr class="gradeA2" id="<?php echo $doc["id_documento"]; ?>" data-valor="<?php echo $doc["seccion"]."-".$doc["volumen"]."-".$doc["numero"]; ?>" data-dismiss="modal">
                    				<td><?php echo $doc["seccion"] ?></td>
                    				<td><?php echo $doc["volumen"] ?></td>
                    				<td><?php echo $doc["numero"] ?></td>
                					</tr>
				
               						 <?php				
                						}

                					?>
                                    </tbody>
                                </table>
                    </div>
                                    <!-- /.table-responsive -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <!-- <button type="button" class="btn btn-primary">OK</button>-->
      </div>
    </div>
  </div>
</div>

<!--Fin MyModalDocumento-->
<!--Modal MyModalDocumentoAdd-->
<div class="modal fade" id="myModalDocumentoAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Documento</h4>
      </div>
      <div class="modal-body">
                               <!-- /.panel-heading -->
                  
                     <form role="form" id="form-documentoadd" name="form-documentoadd"  action="adddocumento" method="post" data-toggle="validator">

                            <div class="form-group">
                                <label>Seccion</label>								 
								<input  class="form-control" id="seccion" name="seccion" >
							
								<label>Volumen</label>
								<input type="number" class="form-control" id="volumen"  name="volumen" required>
							    <div class="help-block with-errors"></div>
					
								<label>Numero</label>
								<input type="number" class="form-control" id="numero" name="numero" >
												
								
							</div>	
							<div class="modal-footer">
        						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        						<button type="submit" class="btn btn-primary" id="btn_guardar_doc">Guardar</button>
      							<input type="hidden" id="ingresodoc" name="ingresodoc" value="ingresodoc" />
      						</div>
					 </form>
		</div>
		
  </div>
 </div>
</div>
<!--Fin My Modal Documento Add-->
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