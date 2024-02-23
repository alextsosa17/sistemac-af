<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$total_imagenes = sizeof($fotos);

$image_a_mostrar = ($total_imagenes < 15) ? $total_imagenes : 15;

// Estos valores los recibo por GET
if (isset($_GET['pag'])) {
    if ($image_a_mostrar > 14) {
        $imagen_a_empezar = ($_GET['pag'] - 1) * $image_a_mostrar;
    } else {
        $imagen_a_empezar = 0;
    }

    $imagen_a_terminar = $imagen_a_empezar + $image_a_mostrar;
    $pag_act = $_GET['pag'];
} else {
    $imagen_a_empezar = 0;
    $imagen_a_terminar = $imagen_a_empezar + $image_a_mostrar;
    $pag_act = 1;
}

//Determino el numero de paginas
$pag_ant = $pag_act - 1;
$pag_sig = $pag_act + 1;
$pag_ult = $total_imagenes / $image_a_mostrar;
$residuo = $total_imagenes % $image_a_mostrar;
if ($residuo > 0) {
    $pag_ult = floor($pag_ult) + 1;
}

?>

<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/breadcrumbs.css');?>">

<style media="screen">
.border {
    border: 4px solid;
}

.full {
    border-image: linear-gradient(45deg, #c0c5ce, #a7adba) 1;
}

.hoverEffect img {
    opacity: 1;
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.hoverEffect img:hover {
    opacity: .5;
}

:checked+img[class="full border"] {
    border-image: linear-gradient(45deg, lightcoral, red) 1;
}

:not(:checked)+img[class="full border"] {
    border-image: linear-gradient(45deg, #c0c5ce, #a7adba) 1;
}

input[type="checkbox"] {
    display: none;
}

#s {
    display: none;
}
#loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.loading-container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  text-align: center;
  z-index: 10000;
}

.spinner-border {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  border: 0.25em solid currentColor;
  border-right-color: transparent;
  border-radius: 50%;
  animation: spinner-border 0.75s linear infinite;
}

@keyframes spinner-border {
  to {
    transform: rotate(360deg);
  }
}


</style>

<div class="content-wrapper">
  

    <div id="cabecera">
        Verificacion - Ver editadas
        <span class="pull-right">
            <a href="<?=base_url();?>" class="fa fa-home"> Inicio</a> /
            <a href="<?=base_url("protocolos_asignados")?>"> Protocolos Asignados</a> /
            <span class="text-muted"><?="$titulo - Protocolo Nº $protocolo->id"?></span>
        </span>
    </div>

    <div id="loading-overlay"></div>
    <div id="loading" class="loading-container">
        <div class="loading-content">
            <span class="spinner-border" role="status" aria-hidden="true"></span>
            <span>Cargando...</span>
        </div>
    </div>



    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h1 class="box-title">
                            <?="Equipo: <a href=" . base_url("verEquipo/{$protocolo->id_equipo}") . ">" . $protocolo->equipo_serie . "</a> - " . $protocolo->proyecto?>
                        </h1>
                    </div><!-- /.box -->
                </div>
            </div>

            <div class="col-xs-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h1 class="box-title">
                            <?php echo "Pagina<strong><span class='text-primary'> " . $pag_act . "</span></strong> de <strong>" . $pag_ult . "</strong>"; ?>

                        </h1>
                    </div><!-- /.box -->
                </div>
            </div>

            <!-- este es el div de el paginado  -->
            <div class="col-xs-4 text-right">
                <div class="form-group">
                    <?php
$pag_inicio = max(1, $pag_act - 1);
$pag_fin = min($pag_inicio + 2, $pag_ult);
$pag_inicio = max(1, $pag_fin - 2);
?>

                    <?php if ($pag_act != 1): ?>
                    <a class="btn btn-primary" href="./<?=$id_protocolo?>" onclick="1">Primero</a>
                    <a class="btn btn-primary ml-1" href="?pag=<?=$pag_ant?>" onclick="<?=$pag_ant?>">
                        < </a>
                            <?php endif;?>

                            <?php for ($i = $pag_inicio; $i <= $pag_fin; $i++): ?>
                            <a id="paginas" class="btn btn-primary<?=($i == $pag_act) ? ' active' : '';?>"
                                href="?pag=<?=$i;?>" onclick="$pag_ult"><?=$i;?></a>
                            <?php endfor;?>

                            <?php if ($pag_act < $pag_ult): ?>
                            <a id="adelante" class="btn btn-primary " href="?pag=<?=$pag_sig?>"
                                onclick="<?=$pag_sig?>">></a>
                            <a class="btn btn-primary" href="?pag=<?=$pag_ult?>" onclick="<?=$pag_ult?>">Último</a>
                            <?php else: ?>
                            <button class="btn btn-success confirmar">Confirmar
                                Fotos</button>
                            <?php endif;?>
                </div>
            </div><!-- /.box -->

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <input type="hidden" name="pag_act" id="pag_act" value="<?=$pag_act?>">
                    <input type="hidden" name="pag_ult" id="pag_ult" value="<?=$pag_ult?>">
                    <div class="box-body">
                        <div class="row" style="margin-left:30px;">
                            <?php for ($imagen_a_empezar; $imagen_a_empezar < $imagen_a_terminar; $imagen_a_empezar++): ?>
                            <?php if ($fotos[$imagen_a_empezar]->imagen1): ?>
                            <div class="col-lg-2 hoverEffect"
                                style="margin-bottom:10px; margin-left:-20px; margin-right: 50px">
                                <figure>
                                    <label>
                                        <input type="checkbox" id="identrada" name="identrada[]"
                                            value="<?=$fotos[$imagen_a_empezar]->identrada?>">
                                        <img class="full border"
                                            src="<?=base_url("ver_fotos_ssti") . "/?p=" . $id_protocolo . '&f=' . $fotos[$imagen_a_empezar]->imagen1 . '&c=50&t=1&w=192&h=108'?>"
                                            width="235px" height="154px">
                                    </label>


                                    <button type="button" class="btn btn-primary btn-sm ampliar" data-toggle="modal"
                                        data-target="#imagemodal" id="ampliar1"
                                        value="<?=$fotos[$imagen_a_empezar]->imagen1?>">1</button>

                                    <?php if ($fotos[$imagen_a_empezar]->imagen2): ?>
                                    <button type="button" class="btn btn-primary btn-sm ampliar" data-toggle="modal"
                                        data-target="#imagemodal" id="ampliar2"
                                        value="<?=$fotos[$imagen_a_empezar]->imagen2?>">2</button>
                                    <?php endif;?>

                                    <?php if ($fotos[$imagen_a_empezar]->imagen3): ?>
                                    <button type="button" class="btn btn-primary btn-sm ampliar" data-toggle="modal"
                                        data-target="#imagemodal" id="ampliar3"
                                        value="<?=$fotos[$imagen_a_empezar]->imagen3?>">3</button>
                                    <?php endif;?>

                                    <?php if ($fotos[$imagen_a_empezar]->imagen4): ?>
                                    <button type="button" class="btn btn-primary btn-sm ampliar" data-toggle="modal"
                                        data-target="#imagemodal" id="ampliar4"
                                        value="<?=$fotos[$imagen_a_empezar]->imagen4?>">4</button>
                                    <?php endif;?>

                                </figure>
                            </div>
                            <?php endif;?>
                            <?php endfor;?>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div id="imagemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Imagen ampliada</h4>
                    </div>

                    <div class="modal-body">
                        <img class="imagepreview" style="width: 100%; height:400px">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
<script>
$(document).ready(function() {
    var checkboxesSeleccionados = [];
    $("#loading-overlay").hide();
    $("#loading").hide();
    // Recuperar los valores almacenados previamente en el sessionStorage
    var valoresGuardados = sessionStorage.getItem('checkboxesSeleccionados');
    if (valoresGuardados) {
        checkboxesSeleccionados = JSON.parse(valoresGuardados);
    }

    // Iterar sobre los checkboxes y marcar los seleccionados
    $('input[type="checkbox"]').each(function() {
        var valorCheckbox = $(this).val();
        if (checkboxesSeleccionados.includes(valorCheckbox)) {
            $(this).prop('checked', true);
        }
    });

    // Manejar el evento de cambio de los checkboxes
    $('input[type="checkbox"]').on('change', function() {
        var valorCheckbox = $(this).val();
        
        if ($(this).is(':checked')) {
            checkboxesSeleccionados.push(valorCheckbox);
        } else {
            var index = checkboxesSeleccionados.indexOf(valorCheckbox);
            if (index !== -1) {
                checkboxesSeleccionados.splice(index, 1);
            }
        }

        // Guardar los valores actualizados en el sessionStorage
        sessionStorage.setItem('checkboxesSeleccionados', JSON.stringify(checkboxesSeleccionados));
    });

    $('.confirmar').click(function(e) { //accion del boton para confimar las fotos en la ultima pagina
        e.preventDefault();
        // Mostrar el loader antes de la redirección
        $('#loader').show();
        let cantidadDescartadas = checkboxesSeleccionados.length;
        var confirmacion = confirm("¿Seguro que desea descartar " + cantidadDescartadas + " de " +<?=$total_imagenes?> + " fotos?");
        if (confirmacion) {
            $("#loading-overlay").show();
            $("#loading").show();
            $.ajax({
                url: "<?= base_url('estado_entrada');?>",
                method: "POST",
                dataType: 'json',
                data: {
                    checkbox_names: checkboxesSeleccionados,
                    id_protocolo: <?=$protocolo->id?>
                }
            }).done(function(data) {
                window.location.replace('<?= base_url('protocolos_asignados');?>');
            });
        }
    });


    $(".ampliar").on("click", function(e) {
        e.preventDefault();
        var imgSRC = $(this).val();
        $(".imagepreview").attr("src",
            "<?= base_url('ver_fotos_ssti'); ?>/?p=<?=$id_protocolo?>&c=50&t=1&w=192&h=108&f=" +
            imgSRC);
    });
});
</script>