<?php
class Transaccion{
    public $idTransaccion;
    public $tipo;
    public $monto;
    public $numCuenta;
    public $numCuentaRecep;
    public $fecha;

    public function __construct($idTransaccion,$tipo,$monto,$numCuenta,$numCuentaRecep,$fecha){
        if(!empty($idTransaccion))
            $this->idTransaccion = $idTransaccion;
        else
            throw new Exception('Error. Id de transacción Vacio');
        if(!empty($tipo))
            $this->tipo = $tipo;
        else
            throw new Exception('Error. Tipo Vacio');
        if(!empty($monto))
            $this->monto = $monto;
        else
            throw new Exception('Error. Monto Vacio');
        if(!empty($numCuenta))
            $this->numCuenta = $numCuenta;
        else
            throw new Exception('Error. Número de cuenta Vacio');
        if(!empty($numCuentaRecep))
            $this->numCuentaRecep = $numCuentaRecep;
        else
            throw new Exception('Error. Cuenta receptora Vacio');
        if(!empty($fecha))
            $this->fecha = $fecha;
        else
            throw new Exception('Error. Fecha vacia');
        
    }
}
?>