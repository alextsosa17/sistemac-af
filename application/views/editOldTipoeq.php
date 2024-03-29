<?php

$tipoeqId               = '';
$descrip                = '';
$activo                 = '';
$observaciones          = '';

if(!empty($tipoeqInfo))
{
    foreach ($tipoeqInfo as $ef)
    {
        $tipoeqId               = $ef->id;
        $descrip                = $ef->descrip;
        $activo                 = $ef->activo;
        $observaciones          = $ef->observaciones;
    }
} 

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tipo de Equipo
        <small>Modificar Tipo de Equipo</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="row">
                 	<div class="col-xs-12">
                         <div class="text-right"  >
                              <ol class="breadcrumb" style="background-color: transparent">
                                <li><a href="<?php echo base_url(); ?>" class="fa fa-home"> Inicio</a></li>
                                <li><a href="<?=base_url('tiposeqListing')?>">Tipos de equipo</a></li>
                                <li class="active">Modificar tipo de Equipo </li>
                              </ol>          
                         </div>
                     </div>
                </div>
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles Tipo Equipo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editTipoeq" method="post" id="editTipoeq" role="form">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="descrip">Nombre</label>
                                        <input type="text" class="form-control required" id="descrip" name="descrip" value="<?php echo $descrip; ?>" maxlength="100">
                                        <input type="hidden" value="<?php echo $tipoeqId; ?>" name="tipoeqId" />
                                    </div>                               
                                </div>
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
                                        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" cols="20" style="resize:none"><?php echo $observaciones; ?></textarea>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    &nbsp;
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