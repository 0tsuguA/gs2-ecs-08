<?php

header('Content-Type: application/json');

require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';
require_once '../../modelo/direccion.php';
require_once '../../modelo/titular.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$r = new NuevoResponse();

$t = new Titular();
$t->NroDocumento = $req->Titular->NroDocumento;
$t->ApellidoNombre = $req->Titular->ApellidoNombre;

$d = new Direccion();
$d->Calle = $req->Titular->Direccion->Calle;
$t->Direccion = $d;
$respuestaValidar = $t->ValidarDatos();

if ($respuestaValidar == null) {
    $r->IsOK = true;
    $r->Mensaje = 'Titular agregado correctamente';
} else {
    $r->IsOK = false;
    $r->Mensaje = $respuestaValidar;
}

echo json_encode($r);