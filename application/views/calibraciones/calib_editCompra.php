<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/breadcrumbs.css'); ?>">

<div class="content-wrapper">
    <div id="cabecera">
      Calibraciones - Orden de compra
      <span class="pull-right">
        <a href="<?= base_url(); ?>" class="fa fa-home"> Inicio</a> /
        <a href="<?=base_url('calibraciones_parciales')?>">Calibraciones Parciales</a> /
        <span class="text-muted">Orden de Compra</span>
      </span>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detalles</h3>
            </div>
            <form role="form" action="<?= base_url('agregar_compra') ?>" method="post">
              <input type="hidden" name="id_pedido" value="<?= $id_pedido?>">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="num_compra_label">Nº Orden Compra</label>
                        <input type="text" class="form-control" id="num_compra" name="num_compra">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="fecha_ot_label">Fecha Solicitud OT</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input id="fecha_ot" name="fecha_ot" type="text" class="form-control" aria-describedby="fecha" value="<?php echo $fecha_desde; ?>">
                        </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="presupuesto_label">Presupuesto</label>
                        <input type="text" class="form-control" id="presupuesto" name="presupuesto">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="num_ot_label">Nº OT</label>
                        <input id="num_ot" name="num_ot" type="text" class="form-control" aria-describedby="fecha" value="<?php echo $fecha_desde; ?>">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="observacion_compra_label">Observaciones</label>
                          <textarea name="observacion_compra" id="observacion_compra" class="form-control" rows="3" cols="20" style="resize:none"><?=$this->session->flashdata('info')?></textarea>
                      </div>
                  </div>
              </div><!-- /.row -->
            </div>

            <div class="box-footer">
               <input type="submit" class="btn btn-primary" value="Guardar" />
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
</div>

<script>
    $(function() {
      $('#fecha_ot').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es'
      });
    });
</script>
