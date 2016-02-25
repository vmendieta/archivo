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
                     <div id="mensaje-de-info" class="alert alert-info" role="alert" style="display:none;">
                        <strong>Atenci髇!</strong> Debe ingresar los datos solicitados.
                     </div>
                     <div id="mensaje-de-cuidado" class="alert alert-warning" role="alert" style="display:none;">
                        <strong>Cuidado!</strong>Los datos son obligatorios.
                     </div>                       
                     <div id="mensaje">
                     <?php 
                     echo $mensaje;
                     ?>
                     </div>
                      <!--<form role="form" action="http://localhost/archivo/app/views/addsolicitud.php" method="post" id="form-salida" name="form-salida"  novalidate>-->
                         <form role="form" action="addsolicitud" method="post" id="form-salida" name="form-salida"  >

                            <div class="form-group">
                                <label>Responsable</label>								 
								<input id="responsable" value="<?php echo $_SESSION["nombre_apellido"]; ?>" class="form-control" placeholde="Usuario" disabled>
								
							</div>	
                               <label>Solicitante</label>                                 
								<div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Usuario que solicita.." id="nom_solicita" name="nom_solicita" readonly>
								     <input type="hidden" id="solicita" name="solicita" required>
                                     <span class="input-group-btn">
                                           <button id="btn_solicita" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalUsuario"><i class="fa fa-search"></i></button>
                                     </span>
                             </div>
							
								<div class="form-group">
               					 <label>Hora</label>
                				<div id="hora_solicitud" class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    			<input id="hora_solicitud_view" class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                				</div>
								<input type="hidden" id="dtp_input3" name="dtp_input3" value="" required/>
            					</div>
								
								  <label>Documento</label>
							 <div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Seleccione Documento.." id="documento"  name="documento"  readonly>
								     <input type="hidden" id="id_documento" name="id_documento" required>
                                     <span class="input-group-btn">
                                           <button id="mymodaldoc" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumento"><i class="fa fa-search"></i></button>
                                         
                                           <button id="mymodaldocadd" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoAdd"><i class="fa fa-plus"></i></button>
                                     </span>
                                </div>


								 <div class="form-group">
								<label>Tipo de Solicitud</label>
                                <select id="tipo_solicitud" name="tipo_solicitud" class="form-control" required>
								                    <option value="00">Seleccione ...</option>
                                                    <option value="0">Lectura</option>
													<option value="1">Descripci贸n</option>
													<option value="2">Conservaci贸n</option>
													<option value="3">Exposici贸n</option>
													<option value="4">Visita Guiada</option>
                               </select>
							   </div>
                            <div id="lectura" style="display:none;">
							 <label>Investigador</label>
							 <div class="form-group input-group">
								
                                <select id="investigador" name="investigador" class="form-control" required>
                                	<option value="00">Seleccione ...</option>
                                       <?php                                
                						foreach ($invs as $inv){                 
                						?>         
                                           <option value="<?php echo $inv["id_investigador"]; ?>"><?php echo $inv["nombres"]." ".$inv["apellidos"]; ?></option>
										<?php
				
                						}
				
                						?>			
                                </select>                    

								 <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalInvestigador"><i class="fa fa-plus"></i></button>
                                     </span>
							   </div>
							 
								<label>Formato</label>
							 <div class="form-group">
								
                                <select id="formato" name="formato" class="form-control" required>
								                    <option value="00">Seleccione ...</option>
                                                    <option value="Digital">Digital</option>
													<option value="Impreso">Impreso</option>
                                </select>
								 
							   </div>
							 
							    <div class="form-group ">
               					 <label>Fecha de Entrega</label>
                				<div id="fec_entrega1" class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input31" data-link-format="yyyy-mm-dd" >
                    			<input class="form-control" size="16" type="text" value="" readonly id="fec_entrega_lectura1" >
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_entrega_lectura"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_input31" name="dtp_input31" value="" required />
            					</div>
								<div class="form-group">
                					<label for="dtp_input31h" >Hora de Entrega</label>
               						<div id="hora_enterga1" class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input31h" data-link-format="hh:ii" >
                    				<input class="form-control" size="16" type="text" value="" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon" id="hora_entrega_lectura" ><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_input31h" name="dtp_input31h" value="" required /><br/>
            				</div>
							   	<div class="form-group">
               					 <label>Fecha de Devolucion</label>
                				<div class="input-group">
                    			<input  class="form-control" size="16" type="text" value="" id="fec_devol_lectura1" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_devol_lectura"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="fec_devol_lectura_hidden" name="fec_devol_lectura_hidden"  value="" required/>
            					</div>
								<div class="form-group">
                					<label for="dtp_input32h" >Hora de Devolucion</label>
               						<div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input32h" data-link-format="hh:ii">
                    				<input class="form-control" size="16" type="text" value="" id="hora_devol_lectura" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_input32h" name="dtp_input32h" value="" required /><br/>
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
								<input type="hidden" id="dtp_input311"  name="dtp_input311" value="" required />
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha y Hora Devolucion</label>
                				<div class="input-group date form_datetime " data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input322" >
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_input322" name="dtp_input322" value="" required/>
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
								<input type="hidden" id="dtp_conserva1" name="dtp_conserva1" value="" required/>
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha y Hora Devolucion</label>
                				<div class="input-group date form_datetime " data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_conserva2">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                				</div>
								<input type="hidden" id="dtp_conserva2" name="dtp_conserva2"  value="" required/>
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
								<input type="hidden" id="dtp_expo1" name="dtp_expo1" value="" required/>
            					</div>
								
							   	<div class="form-group">
               					 <label>Fecha Fin</label>
                				<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_expo2" data-link-format="yyyy-mm-dd">
                    			<input class="form-control" size="16" type="text" value="" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_expo2" name="dtp_expo2" value="" required/>
            					</div>
								<div class="form-group">
                                <label>Lugar</label>								 
								<input  class="form-control" id="lugarexpo"  name="lugarexpo" required>
							    </div>
								<div class="form-group">
                                <label>Motivo</label>								 
								<input  class="form-control" id="motivoexpo" name="motivoexpo" required>
							    </div>	
							</div>
							
                            <div id="visitaguiada" style="display:none;">
								<div class="form-group ">
               					 <label>Fecha de Entrega</label>
                				<div id="fec_entregav1" class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_visita_fec1" data-link-format="yyyy-mm-dd" >
                    			<input class="form-control" size="16" type="text" value="" readonly id="fec_entrega_visita1" >
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_entrega_visita"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_visita_fec1" name="dtp_visita_fec1" value="" required />
            					</div>
								<div class="form-group">
                					<label for="dtp_visita1h" >Hora de Entrega</label>
               						<div id="hora_entregav1" class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_visita_hora1" data-link-format="hh:ii" >
                    				<input class="form-control" size="16" type="text" value="" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon" id="hora_entrega_visita" ><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_visita_hora1" name="dtp_visita_hora1" value="" required /><br/>
            				</div>
							   	<div class="form-group">
               					 <label>Fecha de Devolucion</label>
                				<div class="input-group">
                    			<input  class="form-control" size="16" type="text" value="" id="fec_devol_visita2" readonly>
                    			<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon" id="fec_devol_visita"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								<input type="hidden" id="dtp_visita_fec2" name="dtp_visita_fec2"  value="" required/>
            					</div>
								<div class="form-group">
                					<label for="dtp_visita_hora2" >Hora de Devolucion</label>
               						<div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_visita_hora2" data-link-format="hh:ii">
                    				<input class="form-control" size="16" type="text" value="" readonly>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon" id="hora_devol_visita"><span class="glyphicon glyphicon-time"></span></span>
               					 </div>
								<input type="hidden" id="dtp_visita_hora2" name="dtp_visita_hora2" value="" required /><br/>
            				   </div>
							
								<!--<label>Documento</label>
							 <div class="form-group input-group">
                                     <input type="text" class="form-control" placeholder="Seleccione Documento.." id="documentovisi" readonly>
								     <input type="hidden" id="id_documentovisi">
                                     <span class="input-group-btn">
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoVisita"><i class="fa fa-search"></i></button>
                                  
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModalDocumentoAdd"><i class="fa fa-plus"></i></button>
                                     </span>
                                </div>  --> 
								<div class="form-group">
                                <label>Institucion</label>								 
								<input  class="form-control" id="institucion"  name="institucion" required>
							    </div>
								<div class="form-group">
                                <label>Cantidad de Alumnos</label>								 
								<input  type="number" class="form-control" id="alumnos" name="alumnos" required>
							    </div>	
							</div>

							
                            <div class="form-group">

                            <button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
                            <button id="btn_enviar" type="reset" class="btn btn-warning">Limpiar</button>
                            <input type="hidden" id="ok" value="ok" name="ok">						</div>
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
                                     <?php
				
                						foreach ($users as $user){                 
                						?>
                					<tr class="gradeA" id="<?php echo $user["id_usuario"] ?>" data-valor="<?php echo $user["nombres"]." ".$user["apellidos"] ?>" data-dismiss="modal">
                    				<td><?php echo $user["username"] ?></td>
                    				<td><?php echo $user["nombres"] ?></td>
                    				<td><?php echo $user["apellidos"] ?></td>
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
                     <form role="form" id="form-investigador" name="form-investigador" action="addinvestigador" method="post" data-toggle="validator">

                            <div class="form-group">
                                <label>Nombres</label>								 
								<input  class="form-control" id="nombre" name="nombre" required>
				
							    
								<label>Apellidos</label>
								<input  class="form-control" id="apellido" name="apellido" required>
							
					
								<label>CI/Pasaporte</label>
								<input  class="form-control" id="ci" name="ci" required>
							
								<label>Nacionalidad</label>
								<input  class="form-control" id="nacionalidad" name="nacionalidad" required>
							
					
								<label>Direcci贸n</label>
								<input  class="form-control" id="direccion" name="direccion" required>
								 
						
								<label>Email</label>
								<input type="email" class="form-control" id="email"   name="email" required>
								 <div class="help-block with-errors"></div>
								 
								<label>Tel茅fono</label>
								<input  type="tel"  class="form-control" id="telefono" name="telefono" required>
								
								<label>Tema</label>
								<input  class="form-control" id="tema" name="tema" required>
								
							</div>	
							<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn_guardar_inv" >Guardar</button>
      </div>
					 </form>
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
      							<input type="hidden" id="salidadoc" name="salidadoc" value="salidadoc" />
      						</div>
					 </form>
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
                                         <?php
                                    
                						foreach ($docs as $doc){ 
                							
                						?>
                					<tr class="gradeA3" id="<?php echo $doc["id_documento"]; ?>" data-valor="<?php echo $doc["seccion"]."-".$doc["volumen"]."-".$doc["numero"]; ?>" data-dismiss="modal">
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


<?php
include ('footer.php');


?>