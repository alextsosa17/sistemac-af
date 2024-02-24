<?php


?>


<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
    <li style="width: 100%;">
  <a href="<?=  base_url('dashboard')?>" target="_blank">
    <i class="fa fa-home text-primary"></i> <span>   Home   </span>
  </a>
</li>

      <form action="<?= base_url('');?>" method="POST" class="sidebar-form">
        <div class="input-group">
        <input type="text" name="protocolo" class="form-control" placeholder="Buscar Protocolo" maxlength="6" autocomplete="off">
        <span class="input-group-btn">
          <button type="submit" name="search" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>


     
        <li class="header">Productos</li>
        <li><a href="<?= base_url("productos/agregar");?>"><i class="fa fa-plus"></i> Agregar Producto</a></li>
        <li><a href="<?= base_url("productos/buscar");?>"><i class="fa fa-search"></i> Buscar Producto</a></li>
        <li><a href="<?= base_url("productos/eliminar");?>"><i class="fa fa-trash"></i> Eliminar Producto</a></li>

        <li class="header">Ventas</li>
        <li><a href="<?= base_url("ventas/crear");?>"><i class="fa fa-plus"></i> Crear Venta</a></li>
        <li><a href="<?= base_url("ventas/buscar");?>"><i class="fa fa-search"></i> Buscar Venta</a></li>

        <li class="header">Proveedores</li>
        <li><a href="<?= base_url("proveedores/agregar");?>"><i class="fa fa-plus"></i> Agregar Proveedor</a></li>
        <li><a href="<?= base_url("proveedores/buscar");?>"><i class="fa fa-search"></i> Buscar Proveedor</a></li>

        <li class="header">Facturación</li>
        <li><a href="<?= base_url("facturacion/generar");?>"><i class="fa fa-file"></i> Generar Factura</a></li>
        <li><a href="<?= base_url("facturacion/buscar");?>"><i class="fa fa-search"></i> Buscar Factura</a></li>
    </ul>
  </section>
</aside>
