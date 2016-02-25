<?php
include ('header.php');

include ('nav.php');
$contenido=<<<FIN
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
                                <i class="fa fa-book fa-fw"></i> Movimiento de Documentos
                            </li>
                            <li class="active">
                                <i class="fa fa-arrow-circle-left fa-fw"></i> Salida de Documentos
                            </li>
                        </ol>
                    </div>
                </div>
                                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                     <form role="form">

                            <div class="form-group">
                                <label>Responsable</label>								 
								<input  class="form-control" placeholder="Juan Perez" disabled>
							</div>	
                               <label>Solicitante</label>                                 
								<div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Usuario que solicita.." id="nom_solicita" disabled>
								     <input type="hidden" id="solicita">
                                     <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalUsuario"><i class="fa fa-search"></i></button>
                                     </span>
                             </div>
							
								<div class="form-group">
               					 <label>Hora</label>
                				<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                				</div>
								<input type="hidden" id="dtp_input3" value="" />
            					</div>
			


								 <div class="form-group">
								<label>Tipo de Solicitud</label>
                                <select id="tipo-solicitud" class="form-control">
								                    <option value="00">Seleccione ...</option>
                                                    <option value="0">Lectura</option>
													<option value="1">Descripción</option>
													<option value="2">Conservación</option>
													<option value="3">Exposición</option>
													<option value="4">Visita Guiada</option>
                               </select>
							   </div>
                            <div id="lectura" style="display:none;">
							 <label>Investigador</label>
							 <div class="form-group input-group">
								
                                <select id="investigador" class="form-control">
								                    <option value="00">Seleccione ...</option>
                                                    <option value="0">Juana Caceres</option>
													<option value="1">Rocio Ramirez</option>
													<option value="2">Aldofo Perez</option>
													<option value="3">Ramon Gonzalez</option>
													<option value="4">Victor Rodas</option>
                                </select>
								 <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalInvestigador"><i class="fa fa-plus"></i></button>
                                     </span>
							   </div>
							   <label>Documento</label>
							 <div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Seleccione Documento.." id="documento" disabled>
								     <input type="hidden" id="id_documento">
                                     <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumento"><i class="fa fa-search"></i></button>
                                  
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoAdd"><i class="fa fa-plus"></i></button>
                                     </span>
                                </div>
								<label>Formato</label>
							 <div class="form-group">
								
                                <select id="formato" class="form-control" required>
								                    <option value="00">Seleccione ...</option>
                                                    <option value="Digital">Digital</option>
													<option value="Impreso">Impreso</option>
                                </select>
								 
							   </div>
							 
							    <div class="form-group ">
               					 <label>Fecha de Entrega</label>
                				<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input31" data-link-format="yyyy-mm-dd" >
                    			<input class="form-control" size="16" type="text" value="" readonly id="fec_entrega_lectura1" >
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_entrega_lectura"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_input31" value=""  />
            					</div>
								<div class="form-group">
                					<label for="dtp_input31h" >Hora de Entrega</label>
               						<div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input31h" data-link-format="hh:ii" >
                    				<input class="form-control" size="16" type="text" value="" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon" id="hora_entrega_lectura" ><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_input31h" value="" /><br/>
            				</div>
							   	<div class="form-group">
               					 <label>Fecha de Devolucion</label>
                				<div class="input-group">
                    			<input class="form-control" size="16" type="text" value="" id="fec_devol_lectura1" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_devol_lectura"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="fec_devol_lectura_hidden" value="" />
            					</div>
								<div class="form-group">
                					<label for="dtp_input32h" >Hora de Devolucion</label>
               						<div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input32h" data-link-format="hh:ii">
                    				<input class="form-control" size="16" type="text" value="" id="hora_devol_lectura" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_input32h" value="" /><br/>
            				</div>
							</div>
						    
                          
                            <div id="descripcion" style="display:none;">
								<div class="form-group">
               					 <label>Fecha y Hora Entrega</label>
                				<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input311">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_input311" value="" />
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha y Hora Devolucion</label>
                				<div class="input-group date form_datetime " data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input322" >
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_input322" value="" />
            					</div>
							</div>
                            <div id="conservacion" style="display:none;">
							 	<div class="form-group">
               					 <label>Fecha y Hora Entrega</label>
                				<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_conserva1">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_conserva1" value="" />
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha y Hora Devolucion</label>
                				<div class="input-group date form_datetime " data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_conserva2">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_conserva2" value="" />
            					</div>
							</div>
                            <div id="exposicion" style="display:none;">
							<div class="form-group">
               					 <label>Fecha Inicio</label>
                				<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_expo1" data-link-format="yyyy-mm-dd">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_expo1" value="" />
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha Fin</label>
                				<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_expo2" data-link-format="yyyy-mm-dd">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_expo2" value="" />
            					</div>
								<div class="form-group">
                                <label>Lugar</label>								 
								<input  class="form-control" id="lugarexpo" required>
							    </div>
								<div class="form-group">
                                <label>Motivo</label>								 
								<input  class="form-control" id="motivoexpo" required>
							    </div>	
							</div>
							
                            <div id="visitaguiada" style="display:none;">
														 	<div class="form-group">
               					 <label>Fecha y Hora Entrega</label>
                				<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_visita1">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_visita1" value="" />
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha y Hora Devolucion</label>
                				<div class="input-group date form_datetime " data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_visita2">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_visita2" value="" />
            					</div>
								 <label>Documento</label>
							 <div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Seleccione Documento.." id="documentovisi" disabled>
								     <input type="hidden" id="id_documentovisi">
                                     <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoVisita"><i class="fa fa-search"></i></button>
                                  
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoAdd"><i class="fa fa-plus"></i></button>
                                     </span>
                                </div>
								<div class="form-group">
                                <label>Institucion</label>								 
								<input  class="form-control" id="institucion" required>
							    </div>
								<div class="form-group">
                                <label>Cantidad de Alumnos</label>								 
								<input  type="number" class="form-control" id="alumnos" required>
							    </div>	
							</div>

							
                            <div class="form-group">

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn btn-warning">Limpiar</button>
							</div>
                        </form>
	<!-- Modal -->
<div class="modal fade" id="myModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione un Usuario</h4>
      </div>
      <div class="modal-body">
                               <!-- /.panel-heading -->
  <div class="dataTable_wrapper" id="area_tabla">
                                <table class="table table-striped table-bordered table-hover" id="usuarios">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeA" id="user1" data-valor="Laura Gonzalez" data-dismiss="modal">
                                            <td>lgonzalez</td>
                                            <td >Laura</td>
                                            <td>Gonzalez</td>
                                        </tr>
                                     
                                        <tr class="gradeA"  id="user2"  data-valor="Pedro Peña" data-dismiss="modal">
                                            <td>ppena</td>
                                            <td>Pedro</td>
                                            <td>Peña</td>
                                        </tr>
                                        <tr class="gradeA"  id="user3" data-valor="Andres Arce" data-dismiss="modal">
                                            <td >aarce</td>
                                            <td>Andres</td>
                                            <td>Arce</td>
                                        </tr>
                                        <tr class="gradeA"  id="user4" data-valor="Lucia Zalazar" data-dismiss="modal">
                                            <td >lzalazar</td>
                                            <td >Lucia</td>
                                            <td>Zalazar</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                    </div>
                                    <!-- /.table-responsive -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">OK</button>-->
      </div>
    </div>
  </div>
</div>

<!--Modal-->
<!--Modal MyModalInvestigadoor-->
<div class="modal fade" id="myModalInvestigador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Investigador</h4>
      </div>
      <div class="modal-body">
                               <!-- /.panel-heading -->
                     <form role="form" id="form-investigador" data-toggle="validator">

                            <div class="form-group">
                                <label>Nombres</label>								 
								<input  class="form-control" id="nombre" required>
							
								<label>Apellidos</label>
								<input  class="form-control" id="apellido" required>
							
					
								<label>CI/Pasaporte</label>
								<input  class="form-control" id="ci" required>
							
							
								<label>Nacionalidad</label>
								<input  class="form-control" id="nacionalidad" required>
							
					
								<label>Dirección</label>
								<input  class="form-control" id="direccion" required>
							
						
								<label>Email</label>
								<input type="email" class="form-control" id="email" required>
			
								<label>Teléfono</label>
								<input  type="tel"  class="form-control" id="telefono" required>
						
								<label>Tema</label>
								<input  class="form-control" id="tema" required>
						
								<div class="help-block with-errors"></div>
							</div>	
					 </form>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
  </div>
 </div>
</div>
<!--Fin My Modal Investigador-->
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
                                        <tr class="gradeA2" id="doc1" data-valor="01115415" data-dismiss="modal">
                                            <td>12</td>
                                            <td >2</td>
                                            <td>01115415</td>
                                        </tr>
                                     
                                        <tr class="gradeA2"  id="doc2"  data-valor="32165461" data-dismiss="modal">
                                            <td>12</td>
                                            <td>3</td>
                                            <td>32165461</td>
                                        </tr>
                                        <tr class="gradeA2"  id="doc3" data-valor="12654891650" data-dismiss="modal">
                                            <td >23</td>
                                            <td>2</td>
                                            <td>12654891650</td>
                                        </tr>
                                        <tr class="gradeA2"  id="doc4" data-valor="065496541" data-dismiss="modal">
                                            <td >5</td>
                                            <td >1</td>
                                            <td>065496541</td>
                                        </tr>
                                       
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
                     <form role="form" id="form-documentoadd" data-toggle="validator">

                            <div class="form-group">
                                <label>Seccion</label>								 
								<input  class="form-control" id="seccion" required>
							
								<label>Volumen</label>
								<input  class="form-control" id="volumen" required>
							
					
								<label>Numero</label>
								<input type="number" class="form-control" id="numero" required>
												
								<div class="help-block with-errors"></div>
							</div>	
					 </form>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="guardarsalida">Guardar</button>
      </div>
  </div>
 </div>
</div>
<!--Fin My Modal Documento Add-->
	<!-- Modal myModaDocumentoVisita -->
<div class="modal fade" id="myModalDocumentoVisita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione un Documento</h4>
      </div>
      <div class="modal-body">
                               <!-- /.panel-heading -->
  <div class="dataTable_wrapper" id="area_tabla3">
                                <table class="table table-striped table-bordered table-hover" id="documentosvisita">
                                    <thead>
                                        <tr>
                                            <th>Seccion</th>
                                            <th>Volumen</th>
                                            <th>Numero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeA3" id="doc1" data-valor="01115415" data-dismiss="modal">
                                            <td>12</td>
                                            <td >2</td>
                                            <td>01115415</td>
                                        </tr>
                                     
                                        <tr class="gradeA3"  id="doc2"  data-valor="32165461" data-dismiss="modal">
                                            <td>12</td>
                                            <td>3</td>
                                            <td>32165461</td>
                                        </tr>
                                        <tr class="gradeA3"  id="doc3" data-valor="12654891650" data-dismiss="modal">
                                            <td >23</td>
                                            <td>2</td>
                                            <td>12654891650</td>
                                        </tr>
                                        <tr class="gradeA3"  id="doc4" data-valor="065496541" data-dismiss="modal">
                                            <td >5</td>
                                            <td >1</td>
                                            <td>065496541</td>
                                        </tr>
                                       
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

<!--Fin MyModalDocumentoVisita-->

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
FIN;
echo $contenido;

include ('footer.php');


?>