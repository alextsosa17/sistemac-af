<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$total_imagenes = sizeof($fotos);
$image_a_mostrar = ($total_imagenes < 15) ? $total_imagenes : 15;
// Estos valores los recibo por GET
if (isset($_GET['pag'])) {
    $imagen_a_empezar = ($_GET['pag'] - 1) * $image_a_mostrar;
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
</style>

<div class="content-wrapper">
    <div id="cabecera">
        Verificacion - <?=$titulo?>
        <span class="pull-right">
            <a href="<?=base_url();?>" class="fa fa-home"> Inicio</a> /
            <a href="<?=base_url("verificar_protocolos")?>"> Verificar Protocolos</a> /
            <span class="text-muted"><?="$titulo - Protocolo Nº $protocolo->id"?></span>
        </span>
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


            <div class="col-xs-4 text-right">
                <div class="form-group">
                    <?php if ($pag_act > 1) {
    echo "<a class='btn btn-primary' href=\"?pag=" . $pag_ant . "\" onclick=\"$pag_ant\">Anterior</a>";
}
?>

                    <?php if ($pag_act < $pag_ult): ?>
                    <?=" <a class='btn btn-primary guardar' id='s' href=\"?pag=" . $pag_sig . "\" onclick=\"$pag_sig\">Siguiente</a>"?>
                    <?php endif;?>


                </div>
            </div><!-- /.box -->



        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="margin-left:30px;">
                            <?php
for ($imagen_a_empezar; $imagen_a_empezar < $imagen_a_terminar; $imagen_a_empezar++): ?>
                            <?php if ($fotos[$imagen_a_empezar]->imagen1): ?>
                            <div class="col-lg-2" style="margin-bottom:10px; margin-left:-20px; margin-right: 50px">
                                <figure>
                                    <label>
                                        <img class="full border"
                                            src="<?=base_url("ver_fotos_ssti") . "/?p=" . $id_protocolo . '&f=' . $fotos[$imagen_a_empezar]->imagen1 . '&c=50&t=1&w=192&h=108'?>"
                                            width="235px" height="154px">

                                    </label>
                                    <button type="button" class="btn btn-primary btn-sm ampliar" data-toggle="modal"
                                        data-target="#imagemodal" id="ampliar1"
                                        value="<?=$fotos[$imagen_a_empezar]->imagen1?>" onclick="">1</button>

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

                    <div class="modal-footer" id="footer-img">
                        <label for="footer-img" id="label-footer-img" style="float: left; text-align: left;"></label>
                        <div id="loading-message" style="display: none;"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

</div>

<script>
$(document).ready(function() {
    $(".ampliar").on("click", function(e) {
        $('#loading-message').hide();
        e.preventDefault();
        var imgSRC = $(this).val(); //imagen a ampliar 
        console.log(imgSRC);
        $(".imagepreview").attr("src",
            "<?=base_url('ver_fotos_ssti');?>/?p=<?=$id_protocolo?>&c=50&t=1&w=192&h=108&f=" +
            imgSRC);

        $.ajax({
            url: "<?=base_url('verificacion/obtenerDatosEditor');?>", //en la base de datos esta como verificacion, ya que sino la funcion getAcceso de menu_model retorna 0 consultar si esta
            type: "POST",
            ajax: true,
            data: {
                imgSRC
            },
            beforeSend: function() {
                $('#loading-message').show();
                mostrarCarga();
            }
        }).done(function(data) {
            var datosEditor = JSON.parse(
                data); // No es necesario JSON.parse(data) si 'data' ya es un objeto JSON
            // console.log(datosEditor.error);
            if (datosEditor.error == null) {
                $('#loading-message').hide();
                var texto = "Fecha de Edicion: " + datosEditor.fresultado + " | Nombre: " +
                    datosEditor
                    .nombre + " | Apellido: " + datosEditor.apellido;
                $('#label-footer-img').html(texto);

            } else {
                $('#label-footer-img').html(datosEditor
                    .error
                    ); //imprimo un error en la foto para que no quede a la espera de una respuesta que el web service no puede dar por la consulta a base de datos
            }
            console.log(datosEditor.error);
            // // Accede a las propiedades del objeto 'datosEditor'

        });

        function mostrarCarga() { //funcion para la animacion de la carga de los datos|
            var divCargando = $("#label-footer-img");
            var puntos = "";
            var intervalo = setInterval(function() {
                divCargando.text("Cargando" + puntos);
                puntos += ".";
                if (puntos.length > 3) {
                    puntos = "";
                }
            }, 500);

            // Simula una llamada AJAX (aquí debes reemplazarlo con tu propia lógica AJAX)
            setTimeout(function() {
                clearInterval(intervalo); // Detiene el intervalo cuando la respuesta AJAX llega

            }, 3000); // Tiempo de espera simulado de 3 segundos (reemplaza con tu lógica AJAX)
        }


    });
});
</script>