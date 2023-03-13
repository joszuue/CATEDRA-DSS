<?php
class cuentaBanco{
    public $numCuenta;
    public $dui;
    public $titular;
    public $estado;

    public function __construct($numCuenta,$dui,$titular,$estado){
        if(!empty($numCuenta))
            $this->numCuenta = $numCuenta;
        else
            throw new Exception('Error. Número de cuenta Vacio');
        if(!empty($dui))
            $this->dui = $dui;
        else
            throw new Exception('Error. DUI Vacio');
        if(!empty($titular))
            $this->titular = $titular;
        else
            throw new Exception('Error. titular Vacio');
        if(!empty($estado))
            $this->estado = $estado;
        else
            throw new Exception('Error. Estado Vacio');
    }

}

?>