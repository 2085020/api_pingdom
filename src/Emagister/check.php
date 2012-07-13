<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of check
 *
 * @author jcruz
 */
namespace Emagister;

class check {
    //put your code here

    private $_nombre;
    private $_status;

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function setNombre($tmpName)
    {
        $this->_nombre = $tmpName;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function setStatus($tmpStatus)
    {
        $this->_status = $tmpStatus;
    }
}
?>
