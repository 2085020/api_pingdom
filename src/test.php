<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Emagister;
require_once '../vendor/autoload.php';

use Emagister\PingdomAPI;

$pingdom = new PingdomAPI();
$status = $pingdom->getPingdomState();

foreach($status as $st) {
    echo $st->getNombre()."\t-->\t".$st->getStatus()."\n";
}

?>
