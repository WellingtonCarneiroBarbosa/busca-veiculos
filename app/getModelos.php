<?php 

require "../vendor/autoload.php";

use DeividFortuna\Fipe\FipeCarros;

/**
 * Pega um codigo via post
 * 
 */
$codigoMarca = $_POST['codigoMarca'];

/**
 * busca os modelos de alguma marca
 * 
 */

$modelos = FipeCarros::getModelos($codigoMarca);
$modelos = $modelos['modelos'];

/**
 * retorna para o ajax imprimir os options
 * do select
 * 
 */
foreach($modelos as $modelo) {
    echo "<option value='" . $modelo['codigo'] . "'>".$modelo['nome']."</option>";
}