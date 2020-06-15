<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/perfil.controlador.php";
require_once "controladores/menu.controlador.php";
require_once "controladores/personal.controlador.php";
require_once "controladores/ordenes.controlador.php";
require_once "controladores/status.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/perfil.modelo.php";
require_once "modelos/menu.modelo.php";
require_once "modelos/personal.modelo.php";
require_once "modelos/ordenes.modelo.php";
require_once "modelos/status.modelo.php";





$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();