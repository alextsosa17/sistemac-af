<style type="text/css">
#columna {
    overflow: auto;
    height: 320px;
}

.content-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.cartel-bienvenida h2 {
    display: flex;
    justify-content: center;
    align-items: center;
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
<div class="content-wrapper">
    <div class="cartel-bienvenida">
        <h2 id="saludo" class="text-primary"><?= $saludo ?><br></h2>
    </div>
    <div class="img-logo_af-bienvenido">
        <img src="<?= base_url('assets/images/logo_af.png'); ?>" alt="Logo AF" style="max-height: 60%;">
    </div>
</div>
