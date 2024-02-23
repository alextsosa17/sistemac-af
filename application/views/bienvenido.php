<style type="text/css">
#columna {
    overflow: auto;
    height: 320px;
    /*establece la altura máxima, lo que no entre quedará por debajo y saldra la barra de scroll*/
}


.cartel-bienvenida h2 {
  position: absolute;
  top: 20 ;
  right : 0;
  display: flex;
  justify-content:end;
  align-items: end;
  margin: 20px;
  padding: 1em;
  opacity: 0;
  animation-name: aparecer;
  animation-duration: 1s;
  animation-fill-mode: forwards;
}

@keyframes aparecer {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

#saludo {
  display: inline-block;
  padding: 10px;
  /* border: 1px solid grey; */


}

#infor {
    color: black;
}

#chartdiv {
    width: 100%;
    height: 250px;
}
</style>

<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/breadcrumbs.css');?>">

<div class="content-wrapper position-relative">
    <br>
    <div class="cartel-bienvenida position-absolute top-0 end-0 m-3">
        <h2 id = "saludo" class="text-primary"><?= "$saludo <br>"?></h2>
    </div>
    <br>

</div>
