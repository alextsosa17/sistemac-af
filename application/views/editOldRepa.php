<?php

$repaId = '';

$municipioId     = '';
$idsupervisor   = '';
$iddominio      = '';
$conductor      = '';
$tecnico        = '';
$idequipo       = '';
$fecha_visita   = '';
$creadopor      = '';
$fecha_alta     = '';
$equipoSerie    = '';
$activo         = '';
$diagnostico_previo        = '';
$tipo ='';
$ord_tipo ='';
$descripProyecto    = '';

if(!empty($repaInfo))
{
    foreach ($repaInfo as $ef)
    {
        $repaId                     = $ef->id;
        $municipioId                = $ef->idproyecto;
        $idsupervisor               = $ef->idsupervisor;
        $iddominio                  = $ef->iddominio;
        $conductor                  = $ef->conductor;
        $tecnico                    = $ef->tecnico;
        $idequipo                   = $ef->idequipo;
        $fecha_visita               = $ef->fecha_visita;
        $fecha_alta                 = $ef->fecha_alta;
        $equipoSerie                = $ef->equipoSerie;
        $activo                     = $ef->activo;
        $diagnostico_previo         = $ef->diagnostico_previo;
        $tipo                       = $ef->tipo;
        $ord_tipo                   = $ef->ord_tipo;
        $descripProyecto            = $ef->descripProyecto;
    }
} 

//var_dump($ord_tipo);
//die();



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orden Reparacion
        <small>Modificar Orden Reparación</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <div class="form-group">
                            <a class="btn btn-default" href="javascript:history.go(-1);">Volver</a>
                        </div>
                    </div>
                </div>
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles Orden Reparación</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editRepa" method="post" id="editRepa" role="form">
                    <input type="hidden" class="form-control" id="ord_tipo" name="ord_tipo" value="<?php echo $ord_tipo ?>" >

                        <div class="box-body">
                            <div class="row">                       
                            <!-- Fecha Visita -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_visita">Fecha de Visita</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            <?php if ($ord_tipo == 0 and $fecha_visita == '00-00-0000') { ?>
                                            <input id="fecha_visita" name="fecha_visita" type="text" class="form-control" aria-describedby="fecha" placeholder="Elija fecha para la visita" ">

                                            <?php } else { ?>
                                            <input id="fecha_visita" name="fecha_visita" type="text" class="form-control" aria-describedby="fecha" value="<?php echo $fecha_visita ?>">

                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- Fecha Alta -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha de Alta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="fecha_alta"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input id="fecha_alta" name="fecha_alta" type="text" class="form-control" aria-describedby="fecha" value="<?php echo $fecha_alta; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id">Nº Orden de Servicio</label>
                                    <input type="text" class="form-control" id="repaId" name="repaId" value="<?php echo $repaId ?>" size="10" readonly>
                                </div>
                            </div>
                        </div>
                        </div><!-- /.box-body 'Reparación - Supervisión' -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
	                                    
	                                    <label for="idproyecto">Proyecto</label>
										<?php switch ($ord_tipo):
					                      case 0:?>
										<input type="text" class="form-control" id="proyecto" name="proyecto" value="<?php echo $descripProyecto?>"  readonly>
                                        <input type="hidden" value="<?php echo $municipioId; ?>" name="idproyecto" id="idproyecto"/>					                    <?php break;
					                      case 1:?>
					                       <select class="form-control" id="idproyecto" name="idproyecto">
                                                    <option value="0">Seleccionar</option>
                                                    <?php
                                                    if(!empty($municipios))
                                                    {
                                                        foreach ($municipios as $municipio)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $municipio->id; ?>" <?php if($municipio->id == $municipioId) {echo "selected=selected";} ?>><?php echo $municipio->descrip ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                       	   </select>
					                    <?php break;            
					                      endswitch;?> 
										                             
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="idequipo"><i class="fa fa-video-camera" aria-hidden="true"></i> Equipo serie</label>
                                        <?php if ($ord_tipo == 0) { ?>
                                                                                                                          
                                            <input type="text" class="form-control" id="equipoSerie" name="equipoSerie" value="<?php echo $equipoSerie ?>"  readonly>
                                            <input type="hidden" value="<?php echo $idequipo; ?>" name="idequipo" id="idequipo"/> 

                                        <?php } else { ?>
                                            <input type="text" id="search_data" class="form-control search-input" name="search-term" value="<?php echo $equipoSerie ?>" onkeyup="liveSearch()" autocomplete="off">
                                            <div id="suggestions">
                                                <div id="autoSuggestionsList">
                                                </div>
                                            </div>
                                            <input type="hidden" name="idequipo" id="idequipo" value="<?php echo $idequipo ?>" />

                                        <?php }
                                        ?>                                       

                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idsupervisor"><i class="fa fa-user" aria-hidden="true"></i> Supervisor</label>
                                         <select class="form-control" id="idsupervisor" name="idsupervisor">
                                            <option value="0">Seleccionar</option>
                                            <?php
                                            if(!empty($supervisores))
                                            {
                                                foreach ($supervisores as $supervisor)
                                                {
                                                    ?>
                                                    <option value="<?php echo $supervisor->userId ?>" <?php if($supervisor->userId == $idsupervisor) {echo "selected=selected";} ?>><?php echo $supervisor->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>          
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="iddominio"><i class="fa fa-car" aria-hidden="true"></i> Dominio del vehículo</label>
                                        <select class="form-control" id="iddominio" name="iddominio">
                                            <option value="0">Seleccionar</option>
                                            <?php
                                            if(!empty($vehiculos))
                                                {
                                                    foreach ($vehiculos as $vehiculo)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $vehiculo->id ?>" <?php if($vehiculo->id == $iddominio) {echo "selected=selected";} ?>><?php echo $vehiculo->dominio . " - " .  $vehiculo->marca. ", " .  $vehiculo->modelo ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>  

                            </div>
                        </div><!-- /.box-body -->
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conductor"><i class="fa fa-users" aria-hidden="true"></i> Conductor</label>
                                        <select class="form-control" id="conductor" name="conductor">
                                            <option value="0">Seleccionar</option>
                                            <?php
                                            if(!empty($empleados))
                                            {
                                                foreach ($empleados as $empleado)
                                                {
                                                    ?>
                                                    <option value="<?php echo $empleado->userId ?>" <?php if($empleado->userId == $conductor) {echo "selected=selected";} ?>><?php echo $empleado->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-male" aria-hidden="true"></i> Técnico</label>
                                        <select class="form-control" id="tecnico" name="tecnico">
                                            <option value="0">Seleccionar</option>
                                            <?php
                                            if(!empty($empleados))
                                            {
                                                foreach ($empleados as $empleado)
                                                {
                                                    ?>
                                                    <option data-mobile="<?php echo $empleado->mobile ?>" data-imei="<?php echo $empleado->imei ?>" value="<?php echo $empleado->userId ?>" <?php if($empleado->userId == $tecnico) {echo "selected=selected";} ?>><?php echo $empleado->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="celular"><i class="fa fa-phone-square" aria-hidden="true"></i> Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" placeholder="000-0000000" readonly>
                                        <input type="hidden" name="imei" id="imei" value="" />
                                    </div>
                                </div>                      
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="diagnostico_previo">Diagnostico Previo</label>
                                        <?php switch ($ord_tipo) {
                                            case 1:?>
                                            <textarea name="diagnostico_previo" id="diagnostico_previo" class="form-control" rows="5" cols="50" style="resize:none"><?php echo $diagnostico_previo; ?></textarea>
                                                
                                          <?php break;
                                            
                                            case 0:?>
                                            <textarea name="diagnostico_previoView" id="diagnostico_previoView" class="form-control" rows="5" cols="50" style="resize:none" disabled><?php echo $diagnostico_previo; ?></textarea>
                                            <input type="hidden" name="diagnostico_previo" id="diagnostico_previo" value="<?php echo $diagnostico_previo ?>" />
                                          <?php break;
                                        }?>                                     
                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body --> 
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="observaciones_repa">Observaciones:</label>
                                        <?php switch ($ord_tipo) {
                                            case 1:?>
                                            <textarea name="observaciones_repa" id="observaciones_repa" class="form-control" rows="5" cols="50" style="resize:none" disabled><?php echo $observaciones_repa; ?></textarea>
                                                
                                          <?php break;
                                            
                                            case 0:?>
                                            <textarea name="observaciones_repaView" id="observaciones_repaView" class="form-control" rows="5" cols="50" style="resize:none" ><?php echo $observaciones_repa; ?></textarea>
                                            <input type="hidden" name="observaciones_repa" id="observaciones_repa" value="<?php echo $observaciones_repa ?>" />
                                          <?php break;
                                        }?>                                     
                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body --> 
                                                
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"> 
                                    &nbsp;                               
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="activo">Activo</label>
                                            <p style="text-align: center;"> <input type="checkbox" id="activo" name="activo" value="1" <?php if($activo == 1) {echo 'checked="checked"';} ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                            <input type="reset" class="btn btn-default" value="Limpiar" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script>
    $(function() {
$("#tecnico option:selected").each(function () {
                mobile = $(this).data('mobile');
                imei = $(this).data('imei');
                $("#celular").val(mobile);
                $("#imei").val(imei);
            });
        $('#fecha_visita').datepicker({
            format: 'dd-mm-yyyy',
            language: 'es'
        });

        $("#tecnico").change(function () {
           $("#tecnico option:selected").each(function () {
                mobile = $(this).data('mobile');
                imei = $(this).data('imei');
                $("#celular").val(mobile);
                $("#imei").val(imei);
            });
        });


        

    });

    function liveSearch() {

                var input_data = $('#search_data').val();
                if (input_data.length === 0) {
                    $('#suggestions').hide();
                } else {


                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/livesearch/search",
                        data: {search_data: input_data},
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });
                }
            }


            function cargar(param1, param2) {  
                //$('#div_dinamico_anim').html("Hola " + param1); 
                $("#idequipo").val(param1);
                $("#search_data").val(param2);
            }
            
            $('body').on('click', '.solTitle', function() {
                cargar( $(this).attr('rel'), $(this).text() );
                $('#suggestions').hide();

            });
</script>