<?php
class Venta{
    private $nro;
    private $fecha;
    private $colClientes;
    private $colVehiculo;
    private $precioFinal;

	public function __construct($nro, $fecha, $colClientes, $colVehiculo, $precioFinal) {

		$this->nro = $nro;
		$this->fecha = $fecha;
		$this->colClientes = $colClientes;
		$this->colVehiculo = $colVehiculo;
		$this->precioFinal = $precioFinal;
	}

	public function getNro() {
		return $this->nro;
	}

	public function setNro($num) {
		$this->nro = $num;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function setFecha($date) {
		$this->fecha = $date;
	}

	public function getColClientes() {
		return $this->colClientes;
	}

	public function setColClientes($colecClientes) {
		$this->colClientes = $colecClientes;
	}

	public function getColVehiculo() {
		return $this->colVehiculo;
	}

	public function setColVehiculo($colecVehic) {
		$this->colVehiculo = $colecVehic;
	}

	public function getPrecioFinal() {
		return $this->precioFinal;
	}

	public function setPrecioFinal($finalPrice) {
		$this->precioFinal = $finalPrice;
	}

    public function incorporarVehiculo($objVehiculo){
        if($objVehiculo->getActiva()){
            $coleccionVehiculos = $this->getColVehiculo();
            array_push($coleccionVehiculos,$objVehiculo);
            $this->setColVehiculo($coleccionVehiculos);
            $this->setPrecioFinal($this->getPrecioFinal() + $objVehiculo->darPrecioVenta());
        }

    }

    public function __toString(){
        $msj = "Número de venta: " . $this->getNro() . "\n";
        $msj .= "Fecha: " . $this->getFecha() . "\n";
        $msj .= "Clientes: " . $this->getColClientes() . "\n";
        $msj .= "Precio Final: " . $this->getPrecioFinal() . "\n";

        return $msj;
    }

}