<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ORDEN REPARACION 
        <small>Agregar Nueva Orden Reparación</small>
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
                        <h3 class="box-title">Detalle Orden Reparación</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addRepa" action="<?php echo base_url() ?>addNewReparacion" method="post" role="form">

                        <div class="box-body">
                            <div class="row">                       
                            <!-- Fecha de visita -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_visita">Fecha de Visita</label>
                                    <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input id="fecha_visita" name="fecha_visita" type="text" class="form-control" aria-describedby="fecha" value="<?=date('d-m-Y')?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha de Alta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="fecha_alta"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input id="fecha_alta" name="fecha_alta" type="text" class="form-control" aria-describedby="fecha" value="<?=date('d/m/Y')?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id">Nº Orden de Servicio</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $ordenNro ?>" size="10" readonly>
                                    </div>
                                </div>
                        	</div>
                        </div><!-- /.box-body -->

                        <div class="box-body">
                            <div class="row">                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idproyecto">Proyecto</label>
                                        <select class="form-control" id="idproyecto" name="idproyecto" autofocus="">
                                                <option value="0">Seleccionar</option>
                                                <?php foreach ($municipios as $municipio): ?>
                                                        <option value="<?=$municipio->id?>"><?=$municipio->descrip?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="idequipo"><i class="fa fa-video-camera" aria-hidden="true"></i> * Equipo serie</label>
                                        <select id="idequipo" name="idequipo[]" class="form-control selectpicker" multiple data-live-search="true" multiple data-max-options="1" title="Seleccione los equipos..." data-size="6" required>
                                        </select>
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
                                            <?php foreach ($supervisores as $supervisor): ?>
                                                    <option value="<?=$supervisor->userId?>"><?=$supervisor->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>          
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="iddominio"><i class="fa fa-car" aria-hidden="true"></i> Dominio del vehículo</label>
                                        <select class="form-control" id="iddominio" name="iddominio">
                                            <option value="0">Seleccionar</option>
                                            <?php foreach ($vehiculos as $vehiculo): ?>
                                                    <option value="<?=$vehiculo->id?>"><?=$vehiculo->dominio . " - " .  $vehiculo->marca. ", " .  $vehiculo->modelo ?></option>
                                            <?php endforeach; ?>
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
                                            <?php foreach ($empleados as $empleado): ?>
                                                    <option value="<?=$empleado->userId?>"><?=$empleado->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tecnico"><i class="fa fa-male" aria-hidden="true"></i> Técnico</label>
                                        <select class="form-control" id="tecnico" name="tecnico">
                                            <option value="0">Seleccionar</option>
                                            <?php foreach ($empleados as $empleado): ?>
                                                    <option data-mobile="<?=$empleado->mobile?>" data-imei="<?=$empleado->imei?>" value="<?=$empleado->userId?>"><?=$empleado->name?></option>
                                            <?php endforeach; ?>
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
                            <div class ="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="diagnostico_previo">Diagnostico Previo</label>
                                        <textarea name="diagnostico_previo" id="diagnostico_previo" class="form-control" rows="5" cols="50" style="resize:none"></textarea>
                                    </div>
                                </div>                                
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
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


<script>
    $(function() {

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

    $("#idproyecto").change(function () {
        valor = $(this).val();
        $.post("<?=base_url('ordenesb/equiposajax')?>", {proyecto: valor})
        .done(function(data) {
            var result = JSON.parse(data);
            var option = '';
            $("#idequipo").html("");
            var previo = ""; var i = 0;
            result.forEach(function(equipo) {
                if (previo != equipo['descrip']) {
                    previo = equipo['descrip'];
                    option = option + '<optgroup label="'+equipo['descrip']+'">';
                }
                option = option + "<option ";
                if ((equipo['evento_actual'] == 60 && equipo['estado'] == 2) || (equipo['evento_actual'] == 110 && equipo['estado'] == 5 ) ) {
                    option = option + 'style="color:DodgerBlue;" ';
                } else {
                    option = option + 'disabled style="color:red;" ';

                }
                option = option + 'value="'+equipo['id']+'">'+equipo['serie']+'</option>';
                if (i+1 >= result.length) {
                    option = option + "</optgroup>";
                } else {
                    if (result[i+1]['descrip'] != equipo['descrip']) {
                        option = option + "</optgroup>";
                    }
                }
                i++;
            });
            $("#idequipo").append(option);
            $('.selectpicker').selectpicker('refresh');
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