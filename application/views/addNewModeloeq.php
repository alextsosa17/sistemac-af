<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row bg-title" style="position: relative; bottom: 15px; ">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Modelos de Equipos</h4> 
            </div>
            <div class="text-right">
                <ol class="breadcrumb" style="background-color: white">
                    <li><a href="<?php echo base_url(); ?>" class="fa fa-home"> Inicio</a></li>
                    <li><a href="<?=base_url('equiposListing')?>">Equipos listado</a></li> 
                    <li class="active">Agregar Nuevo Modelo de Equipo</li>
                </ol>
            </div>
        </div>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles del Modelo de Equipo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addModeloeq" action="<?php echo base_url() ?>addNewModeloequipo" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="descrip">Nombre</label>
                                        <input type="text" class="form-control required" id="descrip" name="descrip" maxlength="100" autofocus="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sigla">Sigla</label>
                                        <input type="text" class="form-control required" id="sigla" name="sigla" maxlength="100">
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="descrip_alt">Descripción Alternativa</label>
                                        <input type="text" class="form-control required" id="descrip_alt" name="descrip_alt" maxlength="100">
                                    </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                    <label for="asociado">Asociado</label>
                                    <select class="form-control" id="asociado" name="asociado">
                                            <option value="0">Seleccionar Asociado</option>
                                            <?php
                                            if(!empty($asociados))
                                            {
                                                foreach ($asociados as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->descrip ?>"><?php echo $rl->descrip ?></option>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="activo">Activo</label>
                                         <p style="text-align: center;"> <input type="checkbox" id="activo" name="activo" value="1" <?php if($activo == 1) {echo 'checked="checked"';} ?>>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" cols="20" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    &nbsp;
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
